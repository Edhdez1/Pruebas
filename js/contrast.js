// js/contrast.js
// Lógica del Comprobador de Accesibilidad WCAG (Simplificado)
        // ==========================================
        const contrastTextColor = document.getElementById('contrastTextColor');
        const contrastTextHex = document.getElementById('contrastTextHex');
        const contrastBgColor = document.getElementById('contrastBgColor');
        const contrastBgHex = document.getElementById('contrastBgHex');
        const btnSwapContrast = document.getElementById('btnSwapContrast');
        const btnSyncWithPicker = document.getElementById('btnSyncWithPicker');
        const contrastPreviewBox = document.getElementById('contrastPreviewBox');

        function updateContrastChecker() {
            let textHex = contrastTextHex.value.trim();
            let bgHex = contrastBgHex.value.trim();

            if (!textHex.startsWith('#')) textHex = '#' + textHex;
            if (!bgHex.startsWith('#')) bgHex = '#' + bgHex;

            if (/^#[0-9A-Fa-f]{6}$/.test(textHex)) {
                contrastTextColor.value = textHex;
            }
            if (/^#[0-9A-Fa-f]{6}$/.test(bgHex)) {
                contrastBgColor.value = bgHex;
            }

            // Aplicar colores directamente a la muestra de previsualización
            contrastPreviewBox.style.color = textHex;
            contrastPreviewBox.style.backgroundColor = bgHex;
        }

        contrastTextColor.addEventListener('input', () => {
            contrastTextHex.value = contrastTextColor.value;
            updateContrastChecker();
        });

        contrastTextHex.addEventListener('input', updateContrastChecker);

        contrastBgColor.addEventListener('input', () => {
            contrastBgHex.value = contrastBgColor.value;
            updateContrastChecker();
        });

        contrastBgHex.addEventListener('input', updateContrastChecker);

        // Intercambiar colores texto y fondo
        btnSwapContrast.addEventListener('click', () => {
            const temp = contrastTextHex.value;
            contrastTextHex.value = contrastBgHex.value;
            contrastBgHex.value = temp;
            updateContrastChecker();
        });

        // Sincronizar con el Selector de Color de al lado
        btnSyncWithPicker.addEventListener('click', () => {
            if (typeof hexCode !== 'undefined' && hexCode.value) {
                contrastTextColor.value = hexCode.value;
                contrastTextHex.value = hexCode.value;
                updateContrastChecker();
                showToolsToast(`Color sincronizado: ${hexCode.value}`);
            }
        });

        // Inicializar
        updateContrastChecker();
