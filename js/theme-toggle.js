// js/theme-toggle.js - Gestión global del modo oscuro / claro
// Se carga en el <head> para aplicar el tema antes de pintar la página (evita el "parpadeo").
(function () {
    const THEME_KEY = 'csshelper_theme';

    function readSaved() {
        try { return localStorage.getItem(THEME_KEY); } catch (e) { return null; }
    }

    // Si la persona no ha elegido tema, se sigue la preferencia del sistema
    function getPreferredTheme() {
        const saved = readSaved();
        if (saved === 'light' || saved === 'dark') return saved;
        return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }

    function updateButton(theme) {
        const btn = document.getElementById('themeToggleBtn');
        if (!btn) return;
        const label = theme === 'dark' ? 'Cambiar a modo claro' : 'Cambiar a modo oscuro';
        btn.setAttribute('aria-label', label);
        btn.setAttribute('title', label);
    }

    function applyTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        updateButton(theme);
    }

    applyTheme(getPreferredTheme());

    document.addEventListener('DOMContentLoaded', () => {
        const toggleBtn = document.getElementById('themeToggleBtn');
        if (!toggleBtn) return;
        updateButton(document.documentElement.getAttribute('data-theme'));

        toggleBtn.addEventListener('click', () => {
            const current = document.documentElement.getAttribute('data-theme') || 'light';
            const next = current === 'dark' ? 'light' : 'dark';
            applyTheme(next);
            // Solo se guarda cuando la persona elige un tema a propósito
            try { localStorage.setItem(THEME_KEY, next); } catch (e) { /* almacenamiento no disponible */ }
        });
    });
})();
