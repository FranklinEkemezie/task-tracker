function initDropdowns() {
    const dropdowns = document.querySelectorAll('[data-dropdown]');

    dropdowns.forEach((dropdown) => {
        const trigger = dropdown.querySelector('[data-dropdown-trigger]');
        const menu = dropdown.querySelector('[data-dropdown-menu]');

        if (!trigger || !menu) {
            return;
        }

        const close = () => {
            menu.classList.add('hidden');
        };

        const toggle = (event) => {
            event.stopPropagation();
            menu.classList.toggle('hidden');
        };

        trigger.addEventListener('click', toggle);

        document.addEventListener('click', (event) => {
            if (!dropdown.contains(event.target)) {
                close();
            }
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                close();
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', initDropdowns);
