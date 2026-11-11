// js/color-picker.js
// Lógica del Selector de Color
        // ==========================================
        const colorMap = document.getElementById('colorMap');
        const colorMapPointer = document.getElementById('colorMapPointer');
        const hueSlider = document.getElementById('hueSlider');
        const hueSliderThumb = document.getElementById('hueSliderThumb');
        const colorPreview = document.getElementById('colorPreview');
        const hexCode = document.getElementById('hexCode');
        const rgbCode = document.getElementById('rgbCode');
        const hslCode = document.getElementById('hslCode');

        let currentHue = 0;    
        let currentSat = 1;    
        let currentVal = 1;    

        let isDraggingMap = false;
        let isDraggingHue = false;

        function updateVisuals() {
            colorMap.style.backgroundColor = `hsl(${currentHue}, 100%, 50%)`;

            const mapRect = colorMap.getBoundingClientRect();
            let pointerX = currentSat * mapRect.width;
            let pointerY = (1 - currentVal) * mapRect.height;
            colorMapPointer.style.left = `${pointerX}px`;
            colorMapPointer.style.top = `${pointerY}px`;

            const hueRect = hueSlider.getBoundingClientRect();
            let thumbX = (currentHue / 360) * hueRect.width;
            hueSliderThumb.style.left = `${thumbX}px`;

            const rgb = hsvToRgb(currentHue, currentSat, currentVal);
            const hex = rgbToHex(rgb[0], rgb[1], rgb[2]);
            const hsl = rgbToHsl(rgb[0], rgb[1], rgb[2]);

            colorPreview.style.backgroundColor = hex;
            // Neón Glow dinámico sobre la muestra de color
            colorPreview.style.boxShadow = `0 0 28px ${hex}80, 0 4px 15px rgba(0,0,0,0.15)`;
            colorPreview.style.border = `3px solid #ffffff`;

            hexCode.value = hex;
            rgbCode.value = `rgb(${rgb[0]}, ${rgb[1]}, ${rgb[2]})`;
            hslCode.value = `hsl(${hsl[0]}, ${hsl[1]}%, ${hsl[2]}%)`;
            
            colorMapPointer.style.backgroundColor = hex;
            colorMapPointer.style.boxShadow = `0 0 8px ${hex}, 0 0 4px rgba(0,0,0,0.6)`;
            
            // Pintar texto de la previsualización de fuentes con el color seleccionado
            if (typeof previewNormal !== 'undefined' && previewNormal) previewNormal.style.color = hex;
            if (typeof previewBold !== 'undefined' && previewBold) previewBold.style.color = hex;
            if (typeof previewItalic !== 'undefined' && previewItalic) previewItalic.style.color = hex;
        }

        function handleMapMove(e) {
            if (!isDraggingMap) return;
            const rect = colorMap.getBoundingClientRect();
            let x = e.clientX - rect.left;
            let y = e.clientY - rect.top;

            x = Math.max(0, Math.min(x, rect.width));
            y = Math.max(0, Math.min(y, rect.height));

            currentSat = x / rect.width;
            currentVal = 1 - (y / rect.height);

            updateVisuals();
        }

        function handleHueMove(e) {
            if (!isDraggingHue) return;
            const rect = hueSlider.getBoundingClientRect();
            let x = e.clientX - rect.left;

            x = Math.max(0, Math.min(x, rect.width));
            currentHue = (x / rect.width) * 360;

            updateVisuals();
        }

        colorMap.addEventListener('mousedown', (e) => {
            isDraggingMap = true;
            handleMapMove(e);
        });

        hueSlider.addEventListener('mousedown', (e) => {
            isDraggingHue = true;
            handleHueMove(e);
        });

        window.addEventListener('mousemove', (e) => {
            if (isDraggingMap) handleMapMove(e);
            if (isDraggingHue) handleHueMove(e);
        });

        window.addEventListener('mouseup', () => {
            isDraggingMap = false;
            isDraggingHue = false;
        });

        // Botones de copiar (Color)
        document.querySelectorAll('.copy-btn[data-target]').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const targetId = e.target.getAttribute('data-target');
                const input = document.getElementById(targetId);
                input.select();
                document.execCommand('copy');
                
                const originalText = e.target.textContent;
                e.target.textContent = '¡Copiado!';
                showToolsToast(`Copiado: ${input.value}`);
                setTimeout(() => e.target.textContent = originalText, 1500);
            });
        });

        function hsvToRgb(h, s, v) {
            let r, g, b;
            let i = Math.floor(h / 60);
            let f = h / 60 - i;
            let p = v * (1 - s);
            let q = v * (1 - f * s);
            let t = v * (1 - (1 - f) * s);
            switch (i % 6) {
                case 0: r = v, g = t, b = p; break;
                case 1: r = q, g = v, b = p; break;
                case 2: r = p, g = v, b = t; break;
                case 3: r = p, g = q, b = v; break;
                case 4: r = t, g = p, b = v; break;
                case 5: r = v, g = p, b = q; break;
            }
            return [Math.round(r * 255), Math.round(g * 255), Math.round(b * 255)];
        }

        function rgbToHex(r, g, b) {
            return "#" + (1 << 24 | r << 16 | g << 8 | b).toString(16).slice(1).toUpperCase();
        }

        function rgbToHsl(r, g, b) {
            r /= 255; g /= 255; b /= 255;
            let max = Math.max(r, g, b), min = Math.min(r, g, b);
            let h, s, l = (max + min) / 2;
            if (max == min) { h = s = 0; } 
            else {
                let d = max - min;
                s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
                switch (max) {
                    case r: h = (g - b) / d + (g < b ? 6 : 0); break;
                    case g: h = (b - r) / d + 2; break;
                    case b: h = (r - g) / d + 4; break;
                }
                h /= 6;
            }
            return [Math.round(h * 360), Math.round(s * 100), Math.round(l * 100)];
        }

        setTimeout(updateVisuals, 50);
        window.addEventListener('resize', updateVisuals);


        // ==========================================
