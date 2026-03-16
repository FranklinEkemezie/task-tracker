function initCategoryModal() {
    const modal = document.querySelector('[data-category-modal]');
    if (!modal) return;

    const overlay = modal.querySelector('[data-category-modal-overlay]');
    const panel = modal.querySelector('[data-category-modal-panel]');
    const closeButtons = modal.querySelectorAll('[data-category-modal-close]');

    const openButtons = document.querySelectorAll('[data-category-modal-open]');

    const openModal = () => {
        modal.classList.remove('hidden');
        requestAnimationFrame(() => {
            overlay.classList.remove('opacity-0');
            panel.classList.remove('opacity-0', 'translate-y-4', 'scale-95');
        });
    };

    const closeModal = () => {
        overlay.classList.add('opacity-0');
        panel.classList.add('opacity-0', 'translate-y-4', 'scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 200);
    };

    openButtons.forEach((button) => button.addEventListener('click', openModal));
    closeButtons.forEach((button) => button.addEventListener('click', closeModal));
    overlay?.addEventListener('click', closeModal);

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
}

document.addEventListener('DOMContentLoaded', initCategoryModal);
