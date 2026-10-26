import './bootstrap';

document.addEventListener('submit', (event) => {
    const form = event.target.closest('[data-contact-form]');

    if (!form) return;

    const button = form.querySelector('[data-contact-submit]');
    const label = button?.querySelector('[data-submit-label]');
    const loading = button?.querySelector('[data-submit-loading]');

    if (!button || !label || !loading) return;

    button.disabled = true;
    button.setAttribute('aria-busy', 'true');
    label.hidden = true;
    loading.hidden = false;
});

document.addEventListener('click', (event) => {
    const link = event.target.closest('a[href="#booking"][data-vehicle-type]');
    if (!link) return;

    const vehicleType = document.querySelector('[data-booking-vehicle-type]');
    if (vehicleType) vehicleType.value = link.dataset.vehicleType;
});

document.addEventListener('submit', async (event) => {
    const form = event.target.closest('[data-booking-form]');
    if (!form || !window.fetch) return;

    event.preventDefault();

    const button = form.querySelector('[data-booking-submit]');
    const label = form.querySelector('[data-booking-submit-label]');
    const loading = form.querySelector('[data-booking-submit-loading]');
    const success = form.querySelector('[data-booking-success]');
    const error = form.querySelector('[data-booking-error]');
    const errorMessage = form.querySelector('[data-booking-error-message]');
    const token = form.querySelector('input[name="_token"]')?.value;

    if (!button || !label || !loading || !success || !error || !errorMessage || !token) return;

    const clearErrors = () => {
        form.querySelectorAll('[data-booking-error-for]').forEach((fieldError) => {
            fieldError.textContent = '';
            fieldError.hidden = true;
            form.querySelector(`[name="${fieldError.dataset.bookingErrorFor}"]`)?.removeAttribute('aria-invalid');
        });
        error.hidden = true;
        success.hidden = true;
    };

    clearErrors();
    button.disabled = true;
    button.setAttribute('aria-busy', 'true');
    label.hidden = true;
    loading.hidden = false;

    try {
        const response = await fetch(form.action, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': token,
            },
            body: new FormData(form),
            credentials: 'same-origin',
        });
        const result = await response.json();

        if (!response.ok) {
            Object.entries(result.errors || {}).forEach(([field, messages]) => {
                const fieldError = form.querySelector(`[data-booking-error-for="${field}"]`);
                const input = form.querySelector(`[name="${field}"]`);
                if (!fieldError || !input) return;

                fieldError.textContent = messages[0];
                fieldError.hidden = false;
                input.setAttribute('aria-invalid', 'true');
            });
            errorMessage.textContent = result.message || 'Please review the details and try again.';
            error.hidden = false;
            error.focus();
            return;
        }

        form.reset();
        success.querySelector('[data-booking-success-message]').textContent = result.message;
        success.hidden = false;
        success.focus();
    } catch (submissionError) {
        console.error('Booking enquiry submission failed:', submissionError);
        errorMessage.textContent = 'We could not send your enquiry right now. Please try again.';
        error.hidden = false;
        error.focus();
    } finally {
        button.disabled = false;
        button.removeAttribute('aria-busy');
        label.hidden = false;
        loading.hidden = true;
    }
});
