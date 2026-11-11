// js/color-picker.js
// Lógica del Selector de Color (ratón, pantalla táctil y teclado)
(function () {
    const colorMap = document.getElementById('colorMap');
    const colorMapPointer = document.getElementById('colorMapPointer');
    const hueSlider = document.getElementById('hueSlider');
    const hueSliderThumb = document.getElementById('hueSliderThumb');
    const colorPreview = document.getElementById('colorPreview');
    const hexCode = document.getElementById('hexCode');
    const rgbCode = document.getElementById('rgbCode');
    const hslCode = document.getElementById('hslCode');
    if (!colorMap || !hueSlider) return;

    // Color inicial: el azul de marca (#1976D2) en lugar de rojo puro
    let currentHue = 210;
    let currentSat = 0.88;
    let currentVal = 0.82;

    function updateVisuals() {
        colorMap.style.backgroundColor = `hsl(${currentHue}, 100%, 50%)`;

        // Posiciones en porcentaje: no dependen del tamaño medido de la caja
        colorMapPointer.style.left = `${currentSat * 100}%`;
        colorMapPointer.style.top = `${(1 - currentVal) * 100}%`;
        hueSliderThumb.style.left = `${(currentHue / 360) * 100}%`;

        const rgb = hsvToRgb(currentHue, currentSat, currentVal);
        const hex = rgbToHex(rgb[0], rgb[1], rgb[2]);
        const hsl = rgbToHsl(rgb[0], rgb[1], rgb[2]);

        colorPreview.style.backgroundColor = hex;
        colorPreview.style.boxShadow = `0 0 28px ${hex}80, 0 4px 15px rgba(0,0,0,0.15)`;

        hexCode.value = hex;
        rgbCode.value = `rgb(${rgb[0]}, ${rgb[1]}, ${rgb[2]})`;
        hslCode.value = `hsl(${hsl[0]}, ${hsl[1]}%, ${hsl[2]}%)`;

        colorMapPointer.style.backgroundColor = hex;

        // Información para lectores de pantalla
        colorMap.setAttribute('aria-valuetext', `${hex}, saturación ${Math.round(currentSat * 100)}%, brillo ${Math.round(currentVal * 100)}%`);
        hueSlider.setAttribute('aria-valuenow', Math.round(currentHue));
        hueSlider.setAttribute('aria-valuetext', `Tono ${Math.round(currentHue)} grados`);
    }

    function setFromMap(e) {
        const rect = colorMap.getBoundingClientRect();
        const x = Math.max(0, Math.min(e.clientX - rect.left, rect.width));
        const y = Math.max(0, Math.min(e.clientY - rect.top, rect.height));
        currentSat = x / rect.width;
        currentVal = 1 - (y / rect.height);
        updateVisuals();
    }

    function setFromHue(e) {
        const rect = hueSlider.getBoundingClientRect();
        const x = Math.max(0, Math.min(e.clientX - rect.left, rect.width));
        currentHue = Math.min(359, (x / rect.width) * 360);
        updateVisuals();
    }

    // Pointer Events: un solo código para ratón, dedo y lápiz
    function makeDraggable(el, onMove) {
        el.addEventListener('pointerdown', (e) => {
            e.preventDefault();
            el.setPointerCapture(e.pointerId);
            el.focus({ preventScroll: true });
            onMove(e);
        });
        el.addEventListener('pointermove', (e) => {
            if (el.hasPointerCapture(e.pointerId)) onMove(e);
        });
    }
    makeDraggable(colorMap, setFromMap);
    makeDraggable(hueSlider, setFromHue);

    // Teclado: flechas mueven en pasos de 1% (Shift = 10%)
    colorMap.addEventListener('keydown', (e) => {
        const step = e.shiftKey ? 0.1 : 0.01;
        const clamp = v => Math.max(0, Math.min(1, v));
        if (e.key === 'ArrowLeft') currentSat = clamp(currentSat - step);
        else if (e.key === 'ArrowRight') currentSat = clamp(currentSat + step);
        else if (e.key === 'ArrowUp') currentVal = clamp(currentVal + step);
        else if (e.key === 'ArrowDown') currentVal = clamp(currentVal - step);
        else return;
        e.preventDefault();
        updateVisuals();
    });

    hueSlider.addEventListener('keydown', (e) => {
        const step = e.shiftKey ? 10 : 1;
        if (e.key === 'ArrowLeft' || e.key === 'ArrowDown') currentHue = Math.max(0, currentHue - step);
        else if (e.key === 'ArrowRight' || e.key === 'ArrowUp') currentHue = Math.min(359, currentHue + step);
        else if (e.key === 'Home') currentHue = 0;
        else if (e.key === 'End') currentHue = 359;
        else return;
        e.preventDefault();
        updateVisuals();
    });

    // Botones de copiar (HEX / RGB / HSL)
    document.querySelectorAll('.copy-btn[data-target]').forEach(btn => {
        const input = document.getElementById(btn.getAttribute('data-target'));
        bindCopyButton(btn, () => input.value, text => `Copiado: ${text}`);
    });

    function hsvToRgb(h, s, v) {
        let r, g, b;
        const i = Math.floor(h / 60);
        const f = h / 60 - i;
        const p = v * (1 - s);
        const q = v * (1 - f * s);
        const t = v * (1 - (1 - f) * s);
        switch (i % 6) {
            case 0: r = v; g = t; b = p; break;
            case 1: r = q; g = v; b = p; break;
            case 2: r = p; g = v; b = t; break;
            case 3: r = p; g = q; b = v; break;
            case 4: r = t; g = p; b = v; break;
            case 5: r = v; g = p; b = q; break;
        }
        return [Math.round(r * 255), Math.round(g * 255), Math.round(b * 255)];
    }

    function rgbToHex(r, g, b) {
        return '#' + (1 << 24 | r << 16 | g << 8 | b).toString(16).slice(1).toUpperCase();
    }

    function rgbToHsl(r, g, b) {
        r /= 255; g /= 255; b /= 255;
        const max = Math.max(r, g, b), min = Math.min(r, g, b);
        let h, s;
        const l = (max + min) / 2;
        if (max === min) { h = s = 0; }
        else {
            const d = max - min;
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

    updateVisuals();
})();
