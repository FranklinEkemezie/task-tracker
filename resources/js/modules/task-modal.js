function wireModal(modal, openSelector) {
    if (!modal) return null;

    const overlay = modal.querySelector('[data-task-modal-overlay]');
    const panel = modal.querySelector('[data-task-modal-panel]');
    const closeButtons = modal.querySelectorAll('[data-task-modal-close]');
    const openButtons = document.querySelectorAll(openSelector);

    const openModal = () => {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
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
            modal.classList.remove('flex');
        }, 200);
    };

    openButtons.forEach((button) => button.addEventListener('click', openModal));
    closeButtons.forEach((button) => button.addEventListener('click', closeModal));
    overlay?.addEventListener('click', closeModal);
    panel?.addEventListener('click', (event) => event.stopPropagation());

    return { openButtons, openModal, closeModal };
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
    const edit = wireModal(editModal, '[data-task-edit-open]');
    wireModal(deleteModal, '[data-task-delete-open]');

    wireCategorySelect(createModal);
    wireCategorySelect(editModal);

    edit?.openButtons.forEach((button) => {
        button.addEventListener('click', () => {
            if (!editModal) return;
            const title = button.dataset.taskTitle || '';
            const category = button.dataset.taskCategory || '__none__';
            const due = button.dataset.taskDue || '';
            const desc = button.dataset.taskDesc || '';
            const recurring = button.dataset.taskRecurring === '1';
            const taskId = button.dataset.taskId;

            const titleInput = editModal.querySelector('[data-task-title-input]');
            const dueInput = editModal.querySelector('[data-task-due-input]');
            const descInput = editModal.querySelector('[data-task-desc-input]');
            const categorySelect = editModal.querySelector('[data-task-category-select]');
            const recurringInput = editModal.querySelector('[data-task-recurring-input]');
            const editForm = editModal.querySelector('[data-task-edit-form]');

            if (titleInput) titleInput.value = title;
            if (dueInput) dueInput.value = due;
            if (descInput) descInput.value = desc;
            if (categorySelect) {
                categorySelect.value = category;
                if (categorySelect.value !== category) {
                    categorySelect.value = '__none__';
                }
                categorySelect.dispatchEvent(new Event('change'));
            }
            if (recurringInput) recurringInput.checked = recurring;

            const categoryNew = editModal.querySelector('[data-task-category-new]');
            if (categoryNew) categoryNew.classList.add('hidden');

            if (editForm && taskId) {
                const template = decodeURI(editForm.getAttribute('data-task-edit-action'));
                if (template) {
                    editForm.action = template.replace('[id]', taskId);
                }
            }
        });
    });

    const deleteButtons = document.querySelectorAll('[data-task-delete-open]');
    deleteButtons.forEach((button) => {
        button.addEventListener('click', () => {
            if (!deleteModal) return;
            const taskId = button.dataset.taskId;
            const deleteForm = deleteModal.querySelector('[data-task-delete-form]');
            if (deleteForm && taskId) {
                const template = decodeURI(deleteForm.getAttribute('data-task-delete-action') || '');
                if (template) {
                    deleteForm.action = template.replace('[id]', taskId);
                }
            }
        });
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            [createModal, editModal, deleteModal].forEach((modal) => {
                if (!modal || modal.classList.contains('hidden')) return;
                const overlay = modal.querySelector('[data-task-modal-overlay]');
                const panel = modal.querySelector('[data-task-modal-panel]');
                overlay?.classList.add('opacity-0');
                panel?.classList.add('opacity-0', 'translate-y-4', 'scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }, 200);
            });
        }
    });
}

document.addEventListener('DOMContentLoaded', initTaskModal);
