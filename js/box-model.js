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
            // Colores opacos: con transparencia el texto perdía contraste en modo oscuro
            margin:  '#f9cb9c',
            border:  '#fde68a',
            padding: '#b6dcb8'
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
                            cell.addEventListener('pointerdown', bmStartDrag);
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

        // Pointer Events: funciona con ratón, dedo y lápiz
        function bmStartDrag(e) {
            e.preventDefault();
            const cell = e.currentTarget;
            const layer = cell.dataset.layer;
            const side = cell.dataset.side;
            bmDragState = {
                layer, side,
                startX: e.clientX,
                startY: e.clientY,
                startValue: boxModel[layer][side]
            };
            document.body.style.userSelect = 'none';
            document.addEventListener('pointermove', bmOnDrag);
            document.addEventListener('pointerup', bmEndDrag);
            document.addEventListener('pointercancel', bmEndDrag);
        }

        function bmOnDrag(e) {
            if (!bmDragState) return;
            const { layer, side, startX, startY, startValue } = bmDragState;
            const limits = bmLayerLimits[layer];

            // Arrastrar hacia fuera agranda el lado; hacia dentro lo reduce
            let delta;
            if (side === 'top') delta = startY - e.clientY;
            else if (side === 'bottom') delta = e.clientY - startY;
            else if (side === 'left') delta = startX - e.clientX;
            else delta = e.clientX - startX;

            let val = Math.round(startValue + delta);
            val = Math.max(limits.min, Math.min(limits.max, val));
            boxModel[layer][side] = val;
            bmRender();
        }

        function bmEndDrag() {
            bmDragState = null;
            document.body.style.userSelect = '';
            document.removeEventListener('pointermove', bmOnDrag);
            document.removeEventListener('pointerup', bmEndDrag);
            document.removeEventListener('pointercancel', bmEndDrag);
        }

        bindCopyButton(
            document.getElementById('copyBoxModelCss'),
            () => document.getElementById('boxModelCssOutput').value,
            'Código del modelo de caja copiado'
        );

        document.getElementById('resetBoxModel').addEventListener('click', () => {
            Object.keys(bmDefaults).forEach(key => {
                if (typeof bmDefaults[key] === 'object') {
                    Object.assign(boxModel[key], bmDefaults[key]);
                }
            });
            bmRender();
            showToast('Valores iniciales restablecidos');
        });

        bmBuild();


        // ==========================================
