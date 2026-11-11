// js/theme-toggle.js - Gestión Global del Modo Oscuro / Claro
(function() {
    const THEME_KEY = 'csshelper_theme';

    // Determina el tema inicial (localStorage o preferencia del sistema)
    function getPreferredTheme() {
        const saved = localStorage.getItem(THEME_KEY);
        if (saved) return saved;
        return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }

    function applyTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem(THEME_KEY, theme);
    }

    // Aplicar de inmediato
    applyTheme(getPreferredTheme());

    document.addEventListener('DOMContentLoaded', () => {
        const toggleBtn = document.getElementById('themeToggleBtn');
        if (!toggleBtn) return;

        toggleBtn.addEventListener('click', () => {
            const current = document.documentElement.getAttribute('data-theme') || 'light';
            const next = current === 'dark' ? 'light' : 'dark';
            applyTheme(next);
        });
    });
})();
