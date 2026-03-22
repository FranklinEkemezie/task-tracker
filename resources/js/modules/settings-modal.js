function initSettingsPhotoModal() {
    const modal = document.querySelector('[data-settings-photo-modal]');
    if (!modal) return;

    const overlay = modal.querySelector('[data-settings-photo-overlay]');
    const panel = modal.querySelector('[data-settings-photo-panel]');
    const openButtons = document.querySelectorAll('[data-settings-photo-open]');
    const closeButtons = modal.querySelectorAll('[data-settings-photo-close]');

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

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
}

document.addEventListener('DOMContentLoaded', initSettingsPhotoModal);
