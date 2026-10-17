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
