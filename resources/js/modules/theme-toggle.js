const THEME_KEY = 'theme';

function applyTheme(theme) {
    const isDark = theme === 'dark';
    document.documentElement.classList.toggle('dark', isDark);
}

function resolveTheme() {
    const stored = localStorage.getItem(THEME_KEY);
    if (stored === 'dark' || stored === 'light') {
        return stored;
    }

    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
}

function updateToggles(theme) {
    const isDark = theme === 'dark';

    document.querySelectorAll('[data-theme-toggle]').forEach((toggle) => {
        toggle.setAttribute('aria-pressed', isDark ? 'true' : 'false');
        toggle.dataset.themeState = theme;

        const label = toggle.querySelector('[data-theme-label]');
        if (label) {
            label.textContent = isDark ? 'Dark' : 'Light';
        }

        const dot = toggle.querySelector('[data-theme-dot]');
        if (dot) {
            dot.classList.toggle('translate-x-4', isDark);
        }
    });
}

function setTheme(theme) {
    localStorage.setItem(THEME_KEY, theme);
    applyTheme(theme);
    updateToggles(theme);
}

function initThemeToggle() {
    const currentTheme = resolveTheme();
    applyTheme(currentTheme);
    updateToggles(currentTheme);

    document.querySelectorAll('[data-theme-toggle]').forEach((toggle) => {
        toggle.addEventListener('click', () => {
            const nextTheme = resolveTheme() === 'dark' ? 'light' : 'dark';
            setTheme(nextTheme);
        });
    });
}

document.addEventListener('DOMContentLoaded', initThemeToggle);
