// js/toast.js - Sistema de Notificación Toast Global
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

// Alias para compatibilidad
window.showToolsToast = showToast;
