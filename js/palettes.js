// js/palettes.js - Lógica del Catálogo de Paletas y Modal de Exportación
document.addEventListener('DOMContentLoaded', () => {
    // Copiado de Badges individuales (HEX, RGB, HSL)
    document.querySelectorAll('.copy-badge').forEach(badge => {
        badge.addEventListener('click', () => {
            const textToCopy = badge.getAttribute('data-copy');
            if (!textToCopy) return;

            navigator.clipboard.writeText(textToCopy).then(() => {
                if (typeof showToast === 'function') {
                    showToast(`Copiado: ${textToCopy}`);
                }
            }).catch(() => {
                const textarea = document.createElement('textarea');
                textarea.value = textToCopy;
                textarea.style.position = 'fixed';
                textarea.style.opacity = '0';
                document.body.appendChild(textarea);
                textarea.select();
                try {
                    document.execCommand('copy');
                    if (typeof showToast === 'function') showToast(`Copiado: ${textToCopy}`);
                } catch (err) {
                    if (typeof showToast === 'function') showToast('Error al copiar');
                }
                document.body.removeChild(textarea);
            });

            badge.classList.add('copied');
            setTimeout(() => badge.classList.remove('copied'), 800);
        });
    });

    // Expandir / Contraer todas las paletas
    const btnExpandAll = document.getElementById('btnExpandAll');
    const btnCollapseAll = document.getElementById('btnCollapseAll');

    if (btnExpandAll && btnCollapseAll) {
        btnExpandAll.addEventListener('click', () => {
            document.querySelectorAll('.palettes-list details').forEach(d => d.open = true);
        });

        btnCollapseAll.addEventListener('click', () => {
            document.querySelectorAll('.palettes-list details').forEach(d => d.open = false);
        });
    }

    // Modal de Exportación de Paletas
    const exportModal = document.getElementById('exportModal');
    const btnCloseModal = document.getElementById('btnCloseModal');
    const exportPaletteHeading = document.getElementById('exportPaletteHeading');
    const exportColorCount = document.getElementById('exportColorCount');
    const exportModalTitle = document.getElementById('exportModalTitle');
    const exportFormatTabs = document.querySelectorAll('.export-tab-btn');
    const exportCodeTextarea = document.getElementById('exportCodeTextarea');
    const exportCodeLabel = document.getElementById('exportCodeLabel');
    const btnCopyExportCode = document.getElementById('btnCopyExportCode');
    const btnCopyExportText = document.getElementById('btnCopyExportText');

    let currentExportData = { name: '', colors: [] };
    let currentFormat = 'css';

    function slugify(text) {
        return text.toString().toLowerCase()
            .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
            .replace(/\s+/g, '-')
            .replace(/[^\w\-]+/g, '')
            .replace(/\-\-+/g, '-')
            .replace(/^-+/, '')
            .replace(/-+$/, '');
    }

    function generateExportCode(format, name, colors) {
        const slug = slugify(name);
        if (format === 'css') {
            if (exportModalTitle) exportModalTitle.textContent = `${slug}.css`;
            if (exportCodeLabel) exportCodeLabel.textContent = 'Variables nativas :root';
            let css = `/* Paleta: ${name} */\n:root {\n`;
            colors.forEach(c => {
                css += `  --color-${slugify(c.name)}: ${c.hex};\n`;
            });
            css += `}`;
            return css;
        } else if (format === 'tailwind') {
            if (exportModalTitle) exportModalTitle.textContent = 'tailwind.config.js';
            if (exportCodeLabel) exportCodeLabel.textContent = 'Configuración de tema Tailwind';
            let tw = `// tailwind.config.js\nmodule.exports = {\n  theme: {\n    extend: {\n      colors: {\n`;
            colors.forEach(c => {
                tw += `        '${slugify(c.name)}': '${c.hex}',\n`;
            });
            tw += `      }\n    }\n  }\n};`;
            return tw;
        } else if (format === 'json') {
            if (exportModalTitle) exportModalTitle.textContent = `${slug}.json`;
            if (exportCodeLabel) exportCodeLabel.textContent = 'Objeto JSON estructurado';
            const obj = {};
            colors.forEach(c => {
                obj[slugify(c.name)] = c.hex;
            });
            return JSON.stringify(obj, null, 2);
        } else if (format === 'scss') {
            if (exportModalTitle) exportModalTitle.textContent = `${slug}.scss`;
            if (exportCodeLabel) exportCodeLabel.textContent = 'Mapa de variables SCSS ($colors)';
            let scss = `// SCSS Map: ${name}\n$palette-${slug}: (\n`;
            colors.forEach((c, idx) => {
                const isLast = idx === colors.length - 1;
                scss += `  "${slugify(c.name)}": ${c.hex}${isLast ? '' : ','}\n`;
            });
            scss += `);`;
            return scss;
        }
        return '';
    }

    function updateExportModalContent() {
        if (!exportCodeTextarea) return;
        exportCodeTextarea.value = generateExportCode(
            currentFormat, 
            currentExportData.name, 
            currentExportData.colors
        );
    }

    document.querySelectorAll('.export-palette-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            const name = btn.getAttribute('data-palette-name');
            const colorsRaw = btn.getAttribute('data-palette-colors');
            try {
                const colors = JSON.parse(colorsRaw);
                currentExportData = { name, colors };
                if (exportPaletteHeading) exportPaletteHeading.textContent = `Exportar: ${name}`;
                if (exportColorCount) exportColorCount.textContent = `${colors.length} colores`;
                updateExportModalContent();
                if (exportModal) {
                    exportModal.classList.add('open');
                    exportModal.setAttribute('aria-hidden', 'false');
                }
            } catch (err) {
                console.error('Error parsing colors:', err);
            }
        });
    });

    if (exportFormatTabs) {
        exportFormatTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                exportFormatTabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                currentFormat = tab.getAttribute('data-format');
                updateExportModalContent();
            });
        });
    }

    function closeModal() {
        if (!exportModal) return;
        exportModal.classList.remove('open');
        exportModal.setAttribute('aria-hidden', 'true');
    }

    if (btnCloseModal) {
        btnCloseModal.addEventListener('click', closeModal);
    }

    if (exportModal) {
        exportModal.addEventListener('click', (e) => {
            if (e.target === exportModal) closeModal();
        });
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && exportModal && exportModal.classList.contains('open')) {
            closeModal();
        }
    });

    if (btnCopyExportCode) {
        btnCopyExportCode.addEventListener('click', () => {
            const text = exportCodeTextarea ? exportCodeTextarea.value : '';
            navigator.clipboard.writeText(text).then(() => {
                if (btnCopyExportText) btnCopyExportText.textContent = '¡Copiado!';
                btnCopyExportCode.classList.add('copied');
                if (typeof showToast === 'function') {
                    showToast('¡Código de exportación copiado!');
                }
                setTimeout(() => {
                    if (btnCopyExportText) btnCopyExportText.textContent = 'Copiar';
                    btnCopyExportCode.classList.remove('copied');
                }, 1800);
            });
        });
    }
});
