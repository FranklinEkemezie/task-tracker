function wireModal(modal, openSelector) {
    if (!modal) return null;

    const overlay = modal.querySelector('[data-task-modal-overlay]');
    const panel = modal.querySelector('[data-task-modal-panel]');
    const closeButtons = modal.querySelectorAll('[data-task-modal-close]');
    const openButtons = document.querySelectorAll(openSelector);

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

    return { closeModal };
}

function wireCategorySelect(modal) {
    const categorySelect = modal?.querySelector('[data-task-category-select]');
    const categoryNew = modal?.querySelector('[data-task-category-new]');
    if (!categorySelect || !categoryNew) return;

    const syncCategoryState = () => {
        const showNew = categorySelect.value === '__new__';
        categoryNew.classList.toggle('hidden', !showNew);
    };

    categorySelect.addEventListener('change', syncCategoryState);
    syncCategoryState();
}

function initTaskModal() {
    const createModal = document.querySelector('[data-task-modal]');
    const editModal = document.querySelector('[data-task-edit-modal]');
    const deleteModal = document.querySelector('[data-task-delete-modal]');

    wireModal(createModal, '[data-task-modal-open]');
    wireModal(editModal, '[data-task-edit-open]');
    wireModal(deleteModal, '[data-task-delete-open]');

    wireCategorySelect(createModal);
    wireCategorySelect(editModal);

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            [createModal, editModal, deleteModal].forEach((modal) => {
                if (!modal || modal.classList.contains('hidden')) return;
                const overlay = modal.querySelector('[data-task-modal-overlay]');
                const panel = modal.querySelector('[data-task-modal-panel]');
                overlay?.classList.add('opacity-0');
                panel?.classList.add('opacity-0', 'translate-y-4', 'scale-95');
                setTimeout(() => modal.classList.add('hidden'), 200);
            });
        }
    });
}

document.addEventListener('DOMContentLoaded', initTaskModal);
