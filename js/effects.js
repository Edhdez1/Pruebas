// js/effects.js - Demostrativo de Efectos CSS
document.addEventListener('DOMContentLoaded', () => {
    const toolsDemoBox = document.getElementById('toolsDemoBox');
    const toolsDemoIcon = document.getElementById('toolsDemoIcon');
    const toolsDemoTitle = document.getElementById('toolsDemoTitle');
    const toolsDemoSub = document.getElementById('toolsDemoSub');
    const toolsCodeSnippet = document.getElementById('toolsCodeSnippet');
    const toolsEffectButtons = document.querySelectorAll('#toolsEffectPills .pill-btn[data-effect]');
    const copyToolsBtn = document.getElementById('copyToolsSnippet');
    
    const toolsEffectsData = {
        glow: {
            title: 'Neón Glow',
            icon: '✨',
            sub: 'Resplandor exterior suave',
            cssClass: 'demo-effect-glow',
            code: `/* Efecto Neón Glow */\nbox-shadow: 0 0 25px rgba(33, 150, 243, 0.45);\nborder: 2px solid #2196f3;\nbackground: #ffffff;`
        },
        glass: {
            title: 'Glassmorphism',
            icon: '🧊',
            sub: 'Efecto cristal translúcido',
            cssClass: 'demo-effect-glass',
            code: `/* Efecto Glassmorphism */\nbackground: rgba(255, 255, 255, 0.65);\nbackdrop-filter: blur(12px);\nborder: 1px solid rgba(255, 255, 255, 0.8);\nbox-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);`
        },
        gradient: {
            title: 'Degradado Moderno',
            icon: '🎨',
            sub: 'Transición angular viva',
            cssClass: 'demo-effect-gradient',
            code: `/* Gradiente Moderno */\nbackground: linear-gradient(135deg, #2196f3 0%, #9c27b0 100%);\ncolor: #ffffff;\nbox-shadow: 0 10px 24px rgba(33, 150, 243, 0.35);`
        },
        float: {
            title: 'Elevación Flotante',
            icon: '🚀',
            sub: 'Profundidad con sombra suave',
            cssClass: 'demo-effect-float',
            code: `/* Elevación Suave */\ntransform: translateY(-6px);\nbox-shadow: 0 20px 30px -10px rgba(15, 23, 42, 0.22);\nborder: 1px solid #e2e8f0;`
        }
    };

    if (toolsEffectButtons) {
        toolsEffectButtons.forEach(button => {
            button.addEventListener('click', () => {
                const effect = button.getAttribute('data-effect');
                const data = toolsEffectsData[effect];
                if (!data) return;

                toolsEffectButtons.forEach(b => { b.classList.remove('active'); b.setAttribute('aria-pressed', 'false'); });
                button.classList.add('active');
                button.setAttribute('aria-pressed', 'true');

                if (toolsDemoBox) toolsDemoBox.className = 'demo-box ' + data.cssClass;
                if (toolsDemoIcon) toolsDemoIcon.textContent = data.icon;
                if (toolsDemoTitle) toolsDemoTitle.textContent = data.title;
                if (toolsDemoSub) toolsDemoSub.textContent = data.sub;

                if (toolsCodeSnippet) toolsCodeSnippet.textContent = data.code;
            });
        });
    }

    bindCopyButton(copyToolsBtn, () => toolsCodeSnippet ? toolsCodeSnippet.textContent : '', 'Código CSS copiado');
});
