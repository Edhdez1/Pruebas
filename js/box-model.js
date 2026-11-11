// js/box-model.js
// Lógica del Modelo de Caja CSS Interactivo
        // ==========================================
        const boxModel = {
            margin:  { top: 20, right: 20, bottom: 20, left: 20 },
            border:  { top: 5,  right: 5,  bottom: 5,  left: 5  },
            padding: { top: 15, right: 15, bottom: 15, left: 15 },
            content: { width: 150, height: 80 }
        };

        const bmDefaults = JSON.parse(JSON.stringify(boxModel));

        const bmLayerColors = {
            margin:  'rgba(246, 178, 107, 0.65)',
            border:  'rgba(253, 216, 53, 0.65)',
            padding: 'rgba(129, 199, 132, 0.65)'
        };

        const bmLayerLimits = {
            margin:  { min: 0, max: 80 },
            border:  { min: 0, max: 30 },
            padding: { min: 0, max: 80 }
        };

        const bmLayerEls = {};
        const bmValEls = {};
        let bmDragState = null;

        function bmBuild() {
            const container = document.getElementById('boxModelVisual');
            container.innerHTML = '';
            const layers = ['margin', 'border', 'padding'];
            let parent = container;

            layers.forEach(name => {
                const grid = document.createElement('div');
                grid.className = `bm-layer bm-${name}-layer`;
                grid.style.display = 'grid';

                const label = document.createElement('span');
                label.className = 'bm-layer-name';
                label.textContent = name;
                grid.appendChild(label);

                let center = null;
                const positions = [
                    [null, 'top', null],
                    ['left', 'center', 'right'],
                    [null, 'bottom', null]
                ];

                positions.forEach(row => {
                    row.forEach(side => {
                        const cell = document.createElement('div');
                        if (side === 'center') {
                            cell.className = 'bm-center';
                            center = cell;
                        } else if (side) {
                            cell.className = `bm-edge bm-edge-${side}`;
                            cell.dataset.layer = name;
                            cell.dataset.side = side;
                            cell.style.backgroundColor = bmLayerColors[name];
                            cell.style.cursor = (side === 'top' || side === 'bottom') ? 'ns-resize' : 'ew-resize';
                            const val = document.createElement('span');
                            val.className = 'bm-val';
                            cell.appendChild(val);
                            bmValEls[`${name}_${side}`] = val;
                            cell.addEventListener('mousedown', bmStartDrag);
                        } else {
                            cell.className = 'bm-corner';
                            cell.style.backgroundColor = bmLayerColors[name];
                        }
                        grid.appendChild(cell);
                    });
                });

                bmLayerEls[name] = grid;
                parent.appendChild(grid);
                parent = center;
            });

            const content = document.createElement('div');
            content.className = 'bm-content-layer';
            content.innerHTML = `<span id="bmContentSize">${boxModel.content.width} &times; ${boxModel.content.height}</span>`;
            parent.appendChild(content);

            bmRender();
        }

        function bmRender() {
            ['margin', 'border', 'padding'].forEach(name => {
                const v = boxModel[name];
                const g = bmLayerEls[name];
                g.style.gridTemplateColumns = `${v.left}px auto ${v.right}px`;
                g.style.gridTemplateRows = `${v.top}px auto ${v.bottom}px`;
                ['top', 'right', 'bottom', 'left'].forEach(s => {
                    bmValEls[`${name}_${s}`].textContent = v[s];
                });
            });

            const ce = document.querySelector('.bm-content-layer');
            ce.style.width = boxModel.content.width + 'px';
            ce.style.height = boxModel.content.height + 'px';
            document.getElementById('bmContentSize').textContent =
                `${boxModel.content.width} \u00D7 ${boxModel.content.height}`;

            bmUpdateCSS();
        }

        function bmUpdateCSS() {
            const m = boxModel.margin, b = boxModel.border;
            const p = boxModel.padding, c = boxModel.content;
            const css =
                `/* Modelo de Caja Generado */\n` +
                `margin: ${m.top}px ${m.right}px ${m.bottom}px ${m.left}px;\n` +
                `border-width: ${b.top}px ${b.right}px ${b.bottom}px ${b.left}px;\n` +
                `border-style: solid;\n` +
                `padding: ${p.top}px ${p.right}px ${p.bottom}px ${p.left}px;\n` +
                `width: ${c.width}px;\n` +
                `height: ${c.height}px;`;
            document.getElementById('boxModelCssOutput').value = css;
        }

        function bmStartDrag(e) {
            e.preventDefault();
            const layer = e.currentTarget.dataset.layer;
            const side = e.currentTarget.dataset.side;
            bmDragState = {
                layer, side,
                startX: e.clientX,
                startY: e.clientY,
                startValue: boxModel[layer][side]
            };
            document.body.style.userSelect = 'none';
            document.addEventListener('mousemove', bmOnDrag);
            document.addEventListener('mouseup', bmEndDrag);
        }

        function bmOnDrag(e) {
            if (!bmDragState) return;
            const { layer, side, startX, startY, startValue } = bmDragState;
            const limits = bmLayerLimits[layer];

            const delta = (side === 'top' || side === 'bottom')
                ? (e.clientY - startY)
                : (e.clientX - startX);

            let val = Math.round(startValue + delta);
            val = Math.max(limits.min, Math.min(limits.max, val));
            boxModel[layer][side] = val;
            bmRender();
        }

        function bmEndDrag() {
            bmDragState = null;
            document.body.style.userSelect = '';
            document.removeEventListener('mousemove', bmOnDrag);
            document.removeEventListener('mouseup', bmEndDrag);
        }

        document.getElementById('copyBoxModelCss').addEventListener('click', () => {
            const textarea = document.getElementById('boxModelCssOutput');
            textarea.select();
            document.execCommand('copy');
            const btnText = document.getElementById('copyBoxModelCssText');
            const orig = btnText.textContent;
            btnText.textContent = '¡Copiado!';
            showToolsToast('¡Código del Box Model copiado al portapapeles!');
            setTimeout(() => btnText.textContent = orig, 1500);
        });

        document.getElementById('resetBoxModel').addEventListener('click', () => {
            Object.keys(bmDefaults).forEach(key => {
                if (typeof bmDefaults[key] === 'object') {
                    Object.assign(boxModel[key], bmDefaults[key]);
                }
            });
            bmRender();
            showToolsToast('Box Model reseteado a valores iniciales');
        });

        bmBuild();


        // ==========================================
