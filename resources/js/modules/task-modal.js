function initTaskModal() {
    const modal = document.querySelector('[data-task-modal]');
    if (!modal) return;

    const overlay = modal.querySelector('[data-task-modal-overlay]');
    const panel = modal.querySelector('[data-task-modal-panel]');
    const closeButtons = modal.querySelectorAll('[data-task-modal-close]');
    const openButtons = document.querySelectorAll('[data-task-modal-open]');

    const categorySelect = modal.querySelector('[data-task-category-select]');
    const categoryNew = modal.querySelector('[data-task-category-new]');

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

    const syncCategoryState = () => {
        if (!categorySelect || !categoryNew) return;
        const showNew = categorySelect.value === '__new__';
        categoryNew.classList.toggle('hidden', !showNew);
    };

    openButtons.forEach((button) => button.addEventListener('click', openModal));
    closeButtons.forEach((button) => button.addEventListener('click', closeModal));
    overlay?.addEventListener('click', closeModal);

    categorySelect?.addEventListener('change', syncCategoryState);
    syncCategoryState();

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
}

document.addEventListener('DOMContentLoaded', initTaskModal);
