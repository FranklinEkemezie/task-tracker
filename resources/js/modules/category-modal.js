function wireModal(modal, openSelector) {
    if (!modal) return null;

    const overlay = modal.querySelector('[data-category-modal-overlay]');
    const panel = modal.querySelector('[data-category-modal-panel]');
    const closeButtons = modal.querySelectorAll('[data-category-modal-close]');
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

    return { openButtons, openModal, closeModal };
}

function updateCategoryPreview(modal, colorClass, title) {
    const previewTitle = modal.querySelector('[data-category-preview-title]');
    const previewColor = modal.querySelector('[data-category-preview-color]');
    const swatches = modal.querySelectorAll('[data-category-color]');

    if (previewTitle && title) {
        previewTitle.textContent = title;
    }

    if (previewColor && colorClass) {
        swatches.forEach((swatch) => swatch.classList.remove('ring-brand-500'));
        const activeSwatch = Array.from(swatches).find((swatch) => swatch.dataset.categoryColor === colorClass);
        if (activeSwatch) {
            activeSwatch.classList.add('ring-brand-500');
        }
        previewColor.className = `flex h-10 w-10 items-center justify-center rounded-xl text-white ${colorClass}`;
        previewColor.innerHTML = previewColor.innerHTML;
    }
}

function initCategoryModal() {
    const editModal = document.querySelector('[data-category-modal]');
    const createModal = document.querySelector('[data-category-create-modal]');
    const deleteModal = document.querySelector('[data-category-delete-modal]');

    const edit = wireModal(editModal, '[data-category-modal-open]');
    wireModal(createModal, '[data-category-create-open]');
    wireModal(deleteModal, '[data-category-delete-open]');

    edit?.openButtons.forEach((button) => {
        button.addEventListener('click', () => {
            if (!editModal) return;
            const name = button.dataset.categoryName || 'Category';
            const desc = button.dataset.categoryDesc || '';
            const color = button.dataset.categoryColor || 'bg-brand-500';

            const nameInput = editModal.querySelector('[data-category-name-input]');
            const descInput = editModal.querySelector('[data-category-desc-input]');

            if (nameInput) nameInput.value = name;
            if (descInput) descInput.value = desc;

            updateCategoryPreview(editModal, color, name);
        });
    });

    const swatches = editModal?.querySelectorAll('[data-category-color]') || [];
    swatches.forEach((swatch) => {
        swatch.addEventListener('click', () => {
            if (!editModal) return;
            updateCategoryPreview(editModal, swatch.dataset.categoryColor, null);
        });
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            [editModal, createModal, deleteModal].forEach((modal) => {
                if (!modal || modal.classList.contains('hidden')) return;
                const overlay = modal.querySelector('[data-category-modal-overlay]');
                const panel = modal.querySelector('[data-category-modal-panel]');
                overlay?.classList.add('opacity-0');
                panel?.classList.add('opacity-0', 'translate-y-4', 'scale-95');
                setTimeout(() => modal.classList.add('hidden'), 200);
            });
        }
    });
}

document.addEventListener('DOMContentLoaded', initCategoryModal);
