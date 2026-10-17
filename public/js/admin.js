document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-theme-toggle]').forEach((button) => {
        button.addEventListener('click', () => {
            const theme = document.documentElement.dataset.theme === 'dark' ? 'light' : 'dark';
            document.documentElement.dataset.theme = theme;
            localStorage.setItem('admin-theme', theme);
        });
    });

    document.querySelectorAll('[data-password-toggle]').forEach((button) => {
        button.addEventListener('click', () => {
            const input = document.getElementById(button.dataset.passwordToggle);
            const visible = input.type === 'password';
            input.type = visible ? 'text' : 'password';
            button.textContent = visible ? 'Hide' : 'Show';
            button.setAttribute('aria-label', `${visible ? 'Hide' : 'Show'} password`);
        });
    });

    document.querySelectorAll('[data-select-all]').forEach((selectAll) => {
        selectAll.addEventListener('change', () => {
            const table = selectAll.closest('table');
            table?.querySelectorAll('tbody input[type="checkbox"][form]').forEach((checkbox) => {
                checkbox.checked = selectAll.checked;
            });
        });
    });

    document.querySelectorAll('.button-primary[type="submit"]').forEach((button) => {
        button.closest('form')?.addEventListener('submit', () => {
            if (button.disabled) return;
            button.disabled = true;
            button.querySelector('span').textContent = 'Please wait…';
        });
    });
});
