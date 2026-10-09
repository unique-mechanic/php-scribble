import Alpine from 'alpinejs';

const systemTheme = window.matchMedia('(prefers-color-scheme: dark)');

Alpine.store('theme', {
    dark: document.documentElement.dataset.theme === 'dark',

    apply(theme) {
        this.dark = theme === 'dark';
        document.documentElement.dataset.theme = theme;
        document.documentElement.style.colorScheme = theme;
    },

    toggle() {
        const theme = this.dark ? 'light' : 'dark';
        window.scribbleThemePreference = theme;
        this.apply(theme);
        try {
            localStorage.setItem('scribble-theme', theme);
        } catch (_) {
            // The toggle still works when browser storage is unavailable.
        }
    },
});

systemTheme.addEventListener('change', (event) => {
    if (window.scribbleThemePreference === null) {
        Alpine.store('theme').apply(event.matches ? 'dark' : 'light');
    }
});

window.addEventListener('storage', (event) => {
    if (event.key !== 'scribble-theme' && event.key !== null) return;
    const preference = event.newValue === 'light' || event.newValue === 'dark' ? event.newValue : null;
    window.scribbleThemePreference = preference;
    Alpine.store('theme').apply(preference ?? (systemTheme.matches ? 'dark' : 'light'));
});

window.Alpine = Alpine;
Alpine.start();
