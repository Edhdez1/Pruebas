// js/contrast.js
// Comprobador de contraste WCAG 2.1: vista previa + ratio + resultado AA/AAA
(function () {
    const contrastTextColor = document.getElementById('contrastTextColor');
    const contrastTextHex = document.getElementById('contrastTextHex');
    const contrastBgColor = document.getElementById('contrastBgColor');
    const contrastBgHex = document.getElementById('contrastBgHex');
    const btnSwapContrast = document.getElementById('btnSwapContrast');
    const btnSyncWithPicker = document.getElementById('btnSyncWithPicker');
    const contrastPreviewBox = document.getElementById('contrastPreviewBox');
    const ratioValue = document.getElementById('contrastRatioValue');
    const ratioVerdict = document.getElementById('contrastRatioVerdict');
    const checks = {
        aaNormal: document.getElementById('checkAaNormal'),
        aaLarge: document.getElementById('checkAaLarge'),
        aaaNormal: document.getElementById('checkAaaNormal'),
        aaaLarge: document.getElementById('checkAaaLarge')
    };
    if (!contrastTextHex || !contrastBgHex) return;

    // Acepta "#abc", "abc", "#aabbcc" o "aabbcc"; devuelve "#aabbcc" o null
    function normalizeHex(value) {
        let v = value.trim().replace(/^#/, '');
        if (/^[0-9a-f]{3}$/i.test(v)) v = v.split('').map(c => c + c).join('');
        return /^[0-9a-f]{6}$/i.test(v) ? '#' + v.toLowerCase() : null;
    }

    function luminance(hex) {
        const rgb = [1, 3, 5].map(i => parseInt(hex.slice(i, i + 2), 16) / 255);
        const lin = rgb.map(c => (c <= 0.03928 ? c / 12.92 : Math.pow((c + 0.055) / 1.055, 2.4)));
        return 0.2126 * lin[0] + 0.7152 * lin[1] + 0.0722 * lin[2];
    }

    function contrastRatio(hexA, hexB) {
        const [hi, lo] = [luminance(hexA), luminance(hexB)].sort((a, b) => b - a);
        return (hi + 0.05) / (lo + 0.05);
    }

    function setCheck(el, pass) {
        if (!el) return;
        el.classList.toggle('pass', pass);
        el.classList.toggle('fail', !pass);
        el.querySelector('.check-state').textContent = pass ? 'Aprueba' : 'No aprueba';
    }

    function updateContrastChecker() {
        const textHex = normalizeHex(contrastTextHex.value);
        const bgHex = normalizeHex(contrastBgHex.value);

        contrastTextHex.setAttribute('aria-invalid', textHex ? 'false' : 'true');
        contrastBgHex.setAttribute('aria-invalid', bgHex ? 'false' : 'true');

        if (textHex) contrastTextColor.value = textHex;
        if (bgHex) contrastBgColor.value = bgHex;
        if (!textHex || !bgHex) {
            if (ratioValue) ratioValue.textContent = '—';
            if (ratioVerdict) ratioVerdict.textContent = 'Escribe un color HEX válido, por ejemplo #1e293b';
            return;
        }

        contrastPreviewBox.style.color = textHex;
        contrastPreviewBox.style.backgroundColor = bgHex;

        const ratio = contrastRatio(textHex, bgHex);
        // Se trunca (no se redondea) para no aprobar algo que está justo por debajo
        const shown = Math.floor(ratio * 100) / 100;
        if (ratioValue) ratioValue.textContent = `${shown.toFixed(2)}:1`;

        setCheck(checks.aaNormal, ratio >= 4.5);
        setCheck(checks.aaLarge, ratio >= 3);
        setCheck(checks.aaaNormal, ratio >= 7);
        setCheck(checks.aaaLarge, ratio >= 4.5);

        if (ratioVerdict) {
            ratioVerdict.textContent =
                ratio >= 7 ? 'Excelente: legible para casi cualquier persona.' :
                ratio >= 4.5 ? 'Bueno: cumple el mínimo recomendado para texto normal.' :
                ratio >= 3 ? 'Solo apto para títulos grandes (24px, o 19px en negrita).' :
                'Contraste insuficiente: el texto será difícil de leer.';
        }
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

    btnSwapContrast.addEventListener('click', () => {
        const temp = contrastTextHex.value;
        contrastTextHex.value = contrastBgHex.value;
        contrastBgHex.value = temp;
        updateContrastChecker();
    });

    // Usa el color actual del Selector de Color como color de texto
    btnSyncWithPicker.addEventListener('click', () => {
        const pickerHex = document.getElementById('hexCode');
        if (pickerHex && pickerHex.value) {
            contrastTextHex.value = pickerHex.value;
            updateContrastChecker();
            showToast(`Color de texto: ${pickerHex.value}`);
        }
    });

    updateContrastChecker();
})();
