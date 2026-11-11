// js/glassmorphism.js
// Lógica del Generador de Glassmorphism
        // ==========================================
        const glassBlurRange = document.getElementById('glassBlurRange');
        const glassOpacityRange = document.getElementById('glassOpacityRange');
        const glassBorderRange = document.getElementById('glassBorderRange');
        const glassShadowRange = document.getElementById('glassShadowRange');

        const glassBlurVal = document.getElementById('glassBlurVal');
        const glassOpacityVal = document.getElementById('glassOpacityVal');
        const glassBorderVal = document.getElementById('glassBorderVal');
        const glassShadowVal = document.getElementById('glassShadowVal');

        const glassStageCard = document.getElementById('glassStageCard');
        const glassPreviewStage = document.getElementById('glassPreviewStage');
        const glassCssOutput = document.getElementById('glassCssOutput');
        const copyGlassCssBtn = document.getElementById('copyGlassCssBtn');
        const copyGlassCssText = document.getElementById('copyGlassCssText');
        const glassBgButtons = document.querySelectorAll('.glass-bg-btn');

        function updateGlassmorphism() {
            const blur = parseInt(glassBlurRange.value, 10);
            const opacity = (parseInt(glassOpacityRange.value, 10) / 100).toFixed(2);
            const borderOpacity = (parseInt(glassBorderRange.value, 10) / 100).toFixed(2);
            const shadow = parseInt(glassShadowRange.value, 10);

            glassBlurVal.textContent = `${blur}px`;
            glassOpacityVal.textContent = `${glassOpacityRange.value}%`;
            glassBorderVal.textContent = `${glassBorderRange.value}%`;
            glassShadowVal.textContent = `${shadow}px`;

            // Aplicar estilos a la tarjeta interactiva
            glassStageCard.style.background = `rgba(255, 255, 255, ${opacity})`;
            glassStageCard.style.backdropFilter = `blur(${blur}px)`;
            glassStageCard.style.webkitBackdropFilter = `blur(${blur}px)`;
            glassStageCard.style.borderColor = `rgba(255, 255, 255, ${borderOpacity})`;
            glassStageCard.style.boxShadow = `0 ${Math.round(shadow / 2)}px ${shadow}px rgba(0, 0, 0, 0.18)`;

            // Generar código CSS
            glassCssOutput.value = `.glass-element {
  background: rgba(255, 255, 255, ${opacity});
  backdrop-filter: blur(${blur}px);
  -webkit-backdrop-filter: blur(${blur}px);
  border: 1px solid rgba(255, 255, 255, ${borderOpacity});
  box-shadow: 0 ${Math.round(shadow / 2)}px ${shadow}px rgba(0, 0, 0, 0.18);
  border-radius: 16px;
}`;
        }

        [glassBlurRange, glassOpacityRange, glassBorderRange, glassShadowRange].forEach(input => {
            if (input) input.addEventListener('input', updateGlassmorphism);
        });

        // Fondos de prueba
        glassBgButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                glassBgButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                const bgType = btn.getAttribute('data-stage-bg');
                glassPreviewStage.className = `glass-preview-stage ${bgType}`;
            });
        });

        if (copyGlassCssBtn) {
            copyGlassCssBtn.addEventListener('click', () => {
                const code = glassCssOutput.value;
                navigator.clipboard.writeText(code).then(() => {
                    copyGlassCssText.textContent = '¡Copiado!';
                    copyGlassCssBtn.classList.add('copied');
                    showToolsToast('¡CSS de Glassmorphism copiado al portapapeles!');
                    setTimeout(() => {
                        copyGlassCssText.textContent = 'Copiar';
                        copyGlassCssBtn.classList.remove('copied');
                    }, 1800);
                });
            });
        }

        // Iniciar valores de Glassmorphism
        updateGlassmorphism();

        // ==========================================
