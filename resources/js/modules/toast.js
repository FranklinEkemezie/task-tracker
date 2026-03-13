function initToasts() {
    const toasts = document.querySelectorAll('[data-toast]');

    toasts.forEach((toast) => {
        const closeBtn = toast.querySelector('[data-toast-close]');

        const dismiss = () => {
            if (toast.dataset.state === 'closing') {
                return;
            }

            toast.dataset.state = 'closing';
            setTimeout(() => {
                toast.remove();
            }, 300);
        };

        closeBtn?.addEventListener('click', dismiss);
        setTimeout(dismiss, 4500);
    });
}

document.addEventListener('DOMContentLoaded', initToasts);
