
function initPasswordToggles() {

    const toggleButtons = document.querySelectorAll('[data-password-toggle]');

    toggleButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const targetId = button.getAttribute('data-password-toggle');
            const input = document.getElementById(targetId);

            if (!input) {
                return;
            }

            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';
            button.setAttribute('aria-pressed', isHidden ? 'true' : 'false');

            const showIcon = button.querySelector('[data-icon="show"]');
            const hideIcon = button.querySelector('[data-icon="hide"]');

            if (showIcon && hideIcon) {
                showIcon.classList.toggle('hidden', isHidden);
                hideIcon.classList.toggle('hidden', !isHidden);
            }
        });
    });
}

document.addEventListener("DOMContentLoaded", initPasswordToggles);
