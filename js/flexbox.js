// js/flexbox.js - Generador de Flexbox & CSS Grid
document.addEventListener('DOMContentLoaded', () => {
    const btnModeFlex = document.getElementById('btnModeFlex');
    const btnModeGrid = document.getElementById('btnModeGrid');
    const ctrlDirectionWrapper = document.getElementById('ctrlDirectionWrapper');
    const ctrlGridColsWrapper = document.getElementById('ctrlGridColsWrapper');
    const ctrlWrapWrapper = document.getElementById('ctrlWrapWrapper');
    const flexDirection = document.getElementById('flexDirection');
    const gridCols = document.getElementById('gridCols');
    const flexJustify = document.getElementById('flexJustify');
    const flexAlign = document.getElementById('flexAlign');
    const flexWrap = document.getElementById('flexWrap');
    const flexGapRange = document.getElementById('flexGapRange');
    const flexGapValue = document.getElementById('flexGapValue');
    const flexStageContainer = document.getElementById('flexStageContainer');
    const flexItemsCount = document.getElementById('flexItemsCount');
    const btnAddItem = document.getElementById('btnAddItem');
    const btnRemoveItem = document.getElementById('btnRemoveItem');
    const flexCssOutput = document.getElementById('flexCssOutput');
    const copyFlexCssBtn = document.getElementById('copyFlexCssBtn');

    let currentMode = 'flex'; // 'flex' o 'grid'
    let itemCount = 4;
    const MAX_ITEMS = 5; // Límite máximo de 5 elementos

    function updateFlexboxGenerator() {
        if (!flexGapRange || !flexStageContainer) return;
        const gap = `${flexGapRange.value}px`;
        if (flexGapValue) flexGapValue.textContent = gap;

        if (currentMode === 'flex') {
            const dir = flexDirection.value;
            const justify = flexJustify.value;
            const align = flexAlign.value;
            const wrap = flexWrap.value;

            flexStageContainer.style.display = 'flex';
            flexStageContainer.style.flexDirection = dir;
            flexStageContainer.style.justifyContent = justify;
            flexStageContainer.style.alignItems = align;
            flexStageContainer.style.flexWrap = wrap;
            flexStageContainer.style.gap = gap;
            flexStageContainer.style.gridTemplateColumns = '';

            if (flexCssOutput) {
                flexCssOutput.value = `.container {
  display: flex;
  flex-direction: ${dir};
  justify-content: ${justify};
  align-items: ${align};
  flex-wrap: ${wrap};
  gap: ${gap};
}`;
            }
        } else {
            const cols = gridCols.value;
            const justify = flexJustify.value;
            const align = flexAlign.value;

            flexStageContainer.style.display = 'grid';
            flexStageContainer.style.gridTemplateColumns = cols;
            flexStageContainer.style.justifyContent = justify;
            flexStageContainer.style.alignItems = align;
            flexStageContainer.style.flexDirection = '';
            flexStageContainer.style.flexWrap = '';
            flexStageContainer.style.gap = gap;

            if (flexCssOutput) {
                flexCssOutput.value = `.container {
  display: grid;
  grid-template-columns: ${cols};
  justify-content: ${justify};
  align-items: ${align};
  gap: ${gap};
}`;
            }
        }
    }

    if (btnModeFlex && btnModeGrid) {
        btnModeFlex.addEventListener('click', () => {
            currentMode = 'flex';
            btnModeFlex.classList.add('active');
            btnModeGrid.classList.remove('active');
            btnModeFlex.setAttribute('aria-pressed', 'true');
            btnModeGrid.setAttribute('aria-pressed', 'false');
            if (ctrlDirectionWrapper) ctrlDirectionWrapper.style.display = 'flex';
            if (ctrlWrapWrapper) ctrlWrapWrapper.style.display = 'flex';
            if (ctrlGridColsWrapper) ctrlGridColsWrapper.style.display = 'none';
            updateFlexboxGenerator();
        });

        btnModeGrid.addEventListener('click', () => {
            currentMode = 'grid';
            btnModeGrid.classList.add('active');
            btnModeFlex.classList.remove('active');
            btnModeGrid.setAttribute('aria-pressed', 'true');
            btnModeFlex.setAttribute('aria-pressed', 'false');
            if (ctrlDirectionWrapper) ctrlDirectionWrapper.style.display = 'none';
            if (ctrlWrapWrapper) ctrlWrapWrapper.style.display = 'none';
            if (ctrlGridColsWrapper) ctrlGridColsWrapper.style.display = 'flex';
            updateFlexboxGenerator();
        });
    }

    if (flexDirection) flexDirection.addEventListener('change', updateFlexboxGenerator);
    if (gridCols) gridCols.addEventListener('change', updateFlexboxGenerator);
    if (flexJustify) flexJustify.addEventListener('change', updateFlexboxGenerator);
    if (flexAlign) flexAlign.addEventListener('change', updateFlexboxGenerator);
    if (flexWrap) flexWrap.addEventListener('change', updateFlexboxGenerator);
    if (flexGapRange) flexGapRange.addEventListener('input', updateFlexboxGenerator);

    if (btnAddItem) {
        btnAddItem.addEventListener('click', () => {
            if (itemCount >= MAX_ITEMS) {
                if (typeof showToast === 'function') {
                    showToast(`Máximo ${MAX_ITEMS} elementos`);
                }
                return;
            }
            itemCount++;
            if (flexItemsCount) flexItemsCount.textContent = itemCount;
            const box = document.createElement('div');
            box.className = 'flex-item-box';
            box.innerHTML = `<span>${itemCount}</span>`;
            flexStageContainer.appendChild(box);
            updateFlexboxGenerator();
        });
    }

    if (btnRemoveItem) {
        btnRemoveItem.addEventListener('click', () => {
            if (itemCount <= 1) {
                showToast('Debe quedar al menos 1 elemento');
                return;
            }
            if (flexStageContainer.lastElementChild) {
                flexStageContainer.lastElementChild.remove();
            }
            itemCount--;
            if (flexItemsCount) flexItemsCount.textContent = itemCount;
            updateFlexboxGenerator();
        });
    }

    bindCopyButton(copyFlexCssBtn, () => flexCssOutput ? flexCssOutput.value : '', 'CSS del layout copiado');

    // Inicializar simulador
    updateFlexboxGenerator();
});
