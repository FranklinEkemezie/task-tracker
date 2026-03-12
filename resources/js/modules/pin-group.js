
function initPinGroup() {

    document.querySelectorAll('[data-pin-group]').forEach((group) => {
        const inputs = Array.from(group.querySelectorAll('[data-pin-input]'));
        const hiddenInput = group.querySelector('[data-pin-hidden]');

        if (!inputs.length) {
            return;
        }

        const updateHidden = () => {
            if (!hiddenInput) {
                return;
            }

            hiddenInput.value = inputs.map((input) => input.value).join('');
        };

        inputs.forEach((input, index) => {
            input.addEventListener('input', (event) => {
                const value = event.target.value.replace(/\D/g, '');
                event.target.value = value.slice(0, 1);

                if (value && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }

                updateHidden();
            });

            input.addEventListener('keydown', (event) => {
                if (event.key === 'Backspace' && !event.target.value && index > 0) {
                    inputs[index - 1].focus();
                }
            });

            input.addEventListener('focus', (event) => {
                event.target.select();
            });

            input.addEventListener('paste', (event) => {
                const paste = event.clipboardData?.getData('text') ?? '';
                const digits = paste.replace(/\D/g, '').slice(0, inputs.length);

                if (!digits) {
                    return;
                }

                event.preventDefault();

                digits.split('').forEach((digit, digitIndex) => {
                    if (inputs[digitIndex]) {
                        inputs[digitIndex].value = digit;
                    }
                });

                const nextIndex = Math.min(digits.length, inputs.length - 1);
                inputs[nextIndex].focus();
                updateHidden();
            });
        });

        updateHidden();
    });
}

document.addEventListener("DOMContentLoaded", initPinGroup);
