// js/toast.js - Utilidades globales compartidas: aviso (toast) y copiado al portapapeles
let toolsToastTimeout;

function showToast(msg) {
    const toast = document.getElementById('toastNotification');
    if (!toast) return;
    toast.textContent = msg;
    toast.classList.add('show');
    clearTimeout(toolsToastTimeout);
    toolsToastTimeout = setTimeout(() => {
        toast.classList.remove('show');
    }, 2000);
}

// Alias para compatibilidad con código anterior
window.showToolsToast = showToast;

/**
 * Copia texto al portapapeles. Usa la API moderna y, si no está disponible
 * (por ejemplo, en http:// fuera de localhost), recurre a un textarea oculto.
 * Devuelve una promesa que se resuelve en true si se copió.
 */
function copyToClipboard(text) {
    const fallback = () => {
        const temp = document.createElement('textarea');
        temp.value = text;
        temp.setAttribute('readonly', '');
        temp.style.position = 'fixed';
        temp.style.opacity = '0';
        document.body.appendChild(temp);
        temp.select();
        let ok = false;
        try { ok = document.execCommand('copy'); } catch (e) { ok = false; }
        document.body.removeChild(temp);
        return ok;
    };

    if (navigator.clipboard && window.isSecureContext) {
        return navigator.clipboard.writeText(text).then(() => true, () => fallback());
    }
    return Promise.resolve(fallback());
}

/**
 * Conecta un botón de copiado: copia el texto, cambia su etiqueta a "Copiado"
 * durante un momento y muestra un aviso. `getText` es una función que devuelve
 * el texto a copiar en el momento del clic.
 */
function bindCopyButton(button, getText, toastMsg) {
    if (!button) return;
    const label = button.querySelector('[data-copy-label]') || button.querySelector('span') || button;
    const original = label.textContent;

    button.addEventListener('click', () => {
        const text = getText();
        if (!text) return;
        copyToClipboard(text).then(ok => {
            if (!ok) {
                showToast('No se pudo copiar. Selecciona el texto y usa Ctrl+C.');
                return;
            }
            label.textContent = 'Copiado';
            button.classList.add('copied');
            showToast(typeof toastMsg === 'function' ? toastMsg(text) : (toastMsg || 'Copiado al portapapeles'));
            setTimeout(() => {
                label.textContent = original;
                button.classList.remove('copied');
            }, 1600);
        });
    });
}

window.copyToClipboard = copyToClipboard;
window.bindCopyButton = bindCopyButton;
