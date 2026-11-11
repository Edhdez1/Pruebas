<?php 
$currentPage = 'herramientas'; 
$pageTitle = 'Herramientas CSS | CSS Helper';
$extraHead = '<style id="dynamicFontLoader"></style>';
include 'includes/header.php';
?>

    <main class="container" id="main-content">
        <!-- Encabezado de Herramientas -->
        <header class="section-hero">
            <div class="hero-text">
                <h1>Generadores y herramientas CSS</h1>
                <p>Mueve los controles y mira el cambio al instante. Cada herramienta genera el código CSS listo para copiar.</p>
            </div>
        </header>

        <div class="two-columns">
            <!-- ========================================== -->
            <!-- COLUMNA IZQUIERDA                          -->
            <!-- ========================================== -->
            <section class="column-left">
                <!-- MÓDULO 1: Selector de Color -->
                <div class="interactive-preview-card tool-module-card" id="colorPickerCard">

                    <div class="card-module-body">
                        <div class="module-title-row">
                            <h2>Selector de color</h2>
                            <span class="module-hint">HEX, RGB, HSL</span>
                        </div>

                        <div class="color-picker-widget-inner">
                            <!-- Mapa 2D de Saturación y Luminosidad -->
                            <div class="color-map-container" id="colorMap" style="background-color: hsl(210, 100%, 50%);" tabindex="0" role="slider" aria-label="Saturación y brillo. Usa las flechas para ajustar" aria-valuemin="0" aria-valuemax="100">
                                <div class="color-map-overlay-white"></div>
                                <div class="color-map-overlay-black"></div>
                                <div class="color-map-pointer" id="colorMapPointer"></div>
                            </div>
                            
                            <!-- Barra 1D de Tonalidad (Hue) -->
                            <div class="hue-slider-container" id="hueSlider" tabindex="0" role="slider" aria-label="Tono" aria-valuemin="0" aria-valuemax="359" aria-valuenow="210">
                                <div class="hue-slider-thumb" id="hueSliderThumb"></div>
                            </div>
                        </div>

                        <!-- Caja de Información con Glassmorphism y Neón Glow -->
                        <div class="color-info-box demo-effect-glass" id="colorInfoBox" style="margin-top: 18px;">
                            <div class="color-preview" id="colorPreview" aria-hidden="true"></div>
                            <div class="color-codes">
                                <div class="code-group">
                                    <span class="code-label">HEX:</span>
                                    <input type="text" id="hexCode" readonly aria-label="Código HEX">
                                    <button type="button" class="copy-btn" data-target="hexCode" aria-label="Copiar código HEX">Copiar</button>
                                </div>
                                <div class="code-group">
                                    <span class="code-label">RGB:</span>
                                    <input type="text" id="rgbCode" readonly aria-label="Código RGB">
                                    <button type="button" class="copy-btn" data-target="rgbCode" aria-label="Copiar código RGB">Copiar</button>
                                </div>
                                <div class="code-group">
                                    <span class="code-label">HSL:</span>
                                    <input type="text" id="hslCode" readonly aria-label="Código HSL">
                                    <button type="button" class="copy-btn" data-target="hslCode" aria-label="Copiar código HSL">Copiar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MÓDULO 2: Modelo de Caja CSS (Box Model) -->
                <div class="interactive-preview-card tool-module-card" id="boxModelCard" style="margin-top: 28px;">

                    <div class="card-module-body">
                        <div class="module-title-row">
                            <h2>Modelo de caja</h2>
                            <span class="module-hint">Arrastra cada borde de color</span>
                        </div>

                        <div class="bm-legend">
                            <span><span class="bm-legend-swatch" style="background:#f9cb9c"></span> margin</span>
                            <span><span class="bm-legend-swatch" style="background:#fde68a"></span> border</span>
                            <span><span class="bm-legend-swatch" style="background:#b6dcb8"></span> padding</span>
                            <span><span class="bm-legend-swatch" style="background:#b3d9f8"></span> content</span>
                        </div>

                        <div class="box-model-visual-wrapper demo-effect-glass">
                            <div id="boxModelVisual"></div>
                        </div>

                        <!-- Valores exactos: siempre visibles aunque una franja sea muy delgada -->
                        <div class="bm-values" id="boxModelInputs" role="group" aria-label="Valores del modelo de caja en píxeles"></div>

                        <!-- Salida CSS con tema oscuro de editor -->
                        <div class="card-code-snippet code-output-panel">
                            <div class="code-output-header">
                                <span class="code-output-label">Código CSS generado</span>
                                <div style="display:flex; gap:8px;">
                                    <button type="button" class="copy-snippet-btn" id="resetBoxModel">Restablecer</button>
                                    <button type="button" class="copy-snippet-btn" id="copyBoxModelCss">
                                        <svg aria-hidden="true" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                        <span id="copyBoxModelCssText">Copiar</span>
                                    </button>
                                </div>
                            </div>
                            <textarea id="boxModelCssOutput" class="code-output" readonly aria-label="Código CSS generado"></textarea>
                        </div>
                    </div>
                </div>

                <!-- MÓDULO 5: Generador de Flexbox & CSS Grid -->
                <div class="interactive-preview-card tool-module-card" id="flexboxCard" style="margin-top: 28px;">

                    <div class="card-module-body">
                        <div class="module-title-row">
                            <h2>Flexbox y Grid</h2>
                            <span class="module-hint">Vista previa en vivo</span>
                        </div>

                        <!-- Selector de Modo: Flexbox o CSS Grid -->
                        <div class="flex-mode-switch" role="group" aria-label="Tipo de layout">
                            <button type="button" class="flex-mode-btn active" id="btnModeFlex" aria-pressed="true">Flexbox</button>
                            <button type="button" class="flex-mode-btn" id="btnModeGrid" aria-pressed="false">CSS Grid</button>
                        </div>

                        <!-- Panel de Controles -->
                        <div class="flex-controls-grid">
                            <!-- Fila 1: Dirección / Columnas -->
                            <div class="flex-control-item" id="ctrlDirectionWrapper">
                                <label for="flexDirection" class="flex-ctrl-label">flex-direction:</label>
                                <select id="flexDirection" class="flex-select">
                                    <option value="row" selected>row (horizontal)</option>
                                    <option value="row-reverse">row-reverse</option>
                                    <option value="column">column (vertical)</option>
                                    <option value="column-reverse">column-reverse</option>
                                </select>
                            </div>

                            <div class="flex-control-item" id="ctrlGridColsWrapper" style="display: none;">
                                <label for="gridCols" class="flex-ctrl-label">grid-template-columns:</label>
                                <select id="gridCols" class="flex-select">
                                    <option value="repeat(3, 1fr)" selected>repeat(3, 1fr)</option>
                                    <option value="repeat(2, 1fr)">repeat(2, 1fr)</option>
                                    <option value="repeat(4, 1fr)">repeat(4, 1fr)</option>
                                    <option value="repeat(5, 1fr)">repeat(5, 1fr)</option>
                                    <option value="repeat(auto-fit, minmax(80px, 1fr))">repeat(auto-fit, minmax(80px, 1fr))</option>
                                </select>
                            </div>

                            <!-- Fila 2: Justify Content -->
                            <div class="flex-control-item">
                                <label for="flexJustify" class="flex-ctrl-label">justify-content:</label>
                                <select id="flexJustify" class="flex-select">
                                    <option value="flex-start" selected>flex-start</option>
                                    <option value="center">center</option>
                                    <option value="flex-end">flex-end</option>
                                    <option value="space-between">space-between</option>
                                    <option value="space-around">space-around</option>
                                    <option value="space-evenly">space-evenly</option>
                                </select>
                            </div>

                            <!-- Fila 3: Align Items -->
                            <div class="flex-control-item">
                                <label for="flexAlign" class="flex-ctrl-label">align-items:</label>
                                <select id="flexAlign" class="flex-select">
                                    <option value="stretch" selected>stretch</option>
                                    <option value="center">center</option>
                                    <option value="flex-start">flex-start</option>
                                    <option value="flex-end">flex-end</option>
                                    <option value="baseline">baseline</option>
                                </select>
                            </div>

                            <!-- Fila 4: Flex Wrap (solo flex) -->
                            <div class="flex-control-item" id="ctrlWrapWrapper">
                                <label for="flexWrap" class="flex-ctrl-label">flex-wrap:</label>
                                <select id="flexWrap" class="flex-select">
                                    <option value="nowrap" selected>nowrap</option>
                                    <option value="wrap">wrap</option>
                                    <option value="wrap-reverse">wrap-reverse</option>
                                </select>
                            </div>

                            <!-- Slider de Gap -->
                            <div class="flex-control-item flex-control-full">
                                <div class="flex-slider-header">
                                    <label for="flexGapRange" class="flex-ctrl-label">gap (separación):</label>
                                    <span id="flexGapValue" class="flex-val-tag">12px</span>
                                </div>
                                <input type="range" id="flexGapRange" min="0" max="40" value="12" class="tool-range-slider">
                            </div>
                        </div>

                        <!-- Acciones de Items -->
                        <div class="flex-items-bar">
                            <span class="flex-items-count-text">Elementos: <span id="flexItemsCount">4</span> de 5</span>
                            <div class="flex-items-btn-group">
                                <button type="button" class="btn-item-action" id="btnRemoveItem" aria-label="Quitar un elemento">− Quitar</button>
                                <button type="button" class="btn-item-action" id="btnAddItem" aria-label="Añadir un elemento">+ Añadir</button>
                            </div>
                        </div>

                        <!-- Lienzo interactivo de previsualización -->
                        <div class="flex-stage-wrapper demo-effect-glass">
                            <div id="flexStageContainer" class="flex-stage-container">
                                <div class="flex-item-box"><span>1</span></div>
                                <div class="flex-item-box"><span>2</span></div>
                                <div class="flex-item-box"><span>3</span></div>
                                <div class="flex-item-box"><span>4</span></div>
                            </div>
                        </div>

                        <!-- Código CSS generado -->
                        <div class="card-code-snippet code-output-panel">
                            <div class="code-output-header">
                                <span class="code-output-label">Código CSS generado</span>
                                <button type="button" class="copy-snippet-btn" id="copyFlexCssBtn">
                                    <svg aria-hidden="true" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                    <span id="copyFlexCssText">Copiar</span>
                                </button>
                            </div>
                            <textarea id="flexCssOutput" class="code-output" readonly aria-label="Código CSS generado"></textarea>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ========================================== -->
            <!-- COLUMNA DERECHA                            -->
            <!-- ========================================== -->
            <section class="column-right">
                <!-- MÓDULO: Comprobador de Accesibilidad y Contraste WCAG (Simplificado) -->
                <div class="interactive-preview-card tool-module-card" id="contrastCard">

                    <div class="card-module-body">
                        <div class="module-title-row">
                            <h2>Contraste y accesibilidad</h2>
                            <span class="module-hint">Norma WCAG 2.1</span>
                        </div>

                        <!-- Selector dual de colores (Texto y Fondo) -->
                        <div class="contrast-pickers-row">
                            <div class="contrast-picker-box">
                                <label for="contrastTextHex" class="contrast-label">Color del texto</label>
                                <div class="contrast-input-wrap">
                                    <input type="color" id="contrastTextColor" value="#1b1b1e" class="contrast-color-native" aria-label="Elegir color del texto">
                                    <input type="text" id="contrastTextHex" value="#1b1b1e" class="contrast-hex-input" maxlength="7" spellcheck="false" autocomplete="off">
                                </div>
                            </div>

                            <button type="button" id="btnSwapContrast" class="btn-swap-contrast" title="Intercambiar texto y fondo" aria-label="Intercambiar color del texto y del fondo">
                                <span aria-hidden="true">⇄</span>
                            </button>

                            <div class="contrast-picker-box">
                                <label for="contrastBgHex" class="contrast-label">Color del fondo</label>
                                <div class="contrast-input-wrap">
                                    <input type="color" id="contrastBgColor" value="#ffffff" class="contrast-color-native" aria-label="Elegir color del fondo">
                                    <input type="text" id="contrastBgHex" value="#ffffff" class="contrast-hex-input" maxlength="7" spellcheck="false" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <!-- Botón para sincronizar con el selector de color de al lado -->
                        <div class="contrast-sync-row">
                            <button type="button" id="btnSyncWithPicker" class="btn-sync-picker">
                                Usar el color del selector como texto
                            </button>
                        </div>

                        <!-- Muestra de contraste (Live Preview) -->
                        <div class="contrast-preview-stage" id="contrastPreviewBox">
                            <p class="contrast-sample-heading" id="contrastSampleHeading">Título de muestra</p>
                            <p id="contrastSampleBody">Así se verá tu texto. Un buen contraste permite leerlo con facilidad, incluso con poca luz o baja visión.</p>
                        </div>

                        <!-- Resultado WCAG -->
                        <div class="contrast-result" aria-live="polite">
                            <div class="contrast-ratio-row">
                                <span class="contrast-ratio-label">Ratio de contraste</span>
                                <strong class="contrast-ratio-value" id="contrastRatioValue">—</strong>
                            </div>
                            <p class="contrast-verdict" id="contrastRatioVerdict"></p>
                            <ul class="contrast-checks">
                                <li id="checkAaNormal"><span>AA, texto normal <small>(4.5:1)</small></span><span class="check-state"></span></li>
                                <li id="checkAaLarge"><span>AA, texto grande <small>(3:1)</small></span><span class="check-state"></span></li>
                                <li id="checkAaaNormal"><span>AAA, texto normal <small>(7:1)</small></span><span class="check-state"></span></li>
                                <li id="checkAaaLarge"><span>AAA, texto grande <small>(4.5:1)</small></span><span class="check-state"></span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- MÓDULO 3: Buscador de Fuentes Google Fonts -->
                <div class="interactive-preview-card tool-module-card" id="fontSearchCard" style="margin-top: 28px;">

                    <div class="card-module-body">
                        <div class="module-title-row">
                            <h2>Fuentes de Google</h2>
                            <span class="module-hint">Elige y previsualiza</span>
                        </div>

                        <!-- Grid de chips de fuentes -->
                        <div id="fontChipsGrid" class="font-chips-grid" role="group" aria-label="Fuentes disponibles">
                            <!-- Se llena dinámicamente con JS -->
                            <span class="font-chips-loading">Cargando fuentes…</span>
                        </div>
                        <div id="searchMessage" class="font-chips-error" role="alert" style="display: none;"></div>

                        <!-- Input de texto personalizable para preview -->
                        <div class="font-preview-input-row">
                            <label for="fontPreviewCustomText" class="font-preview-input-label">Texto de prueba</label>
                            <input type="text" id="fontPreviewCustomText" class="font-preview-custom-input" placeholder="Escribe cualquier texto…" value="Hola Mundo">
                        </div>

                        <!-- Triple preview: Normal / Negrita / Cursiva -->
                        <div class="font-preview-box demo-effect-glass demo-effect-float" id="fontPreviewBox" style="margin-top: 18px;">
                            <div class="font-preview-triple">
                                <div class="preview-row">
                                    <span class="preview-style-label">Normal</span>
                                    <span class="preview-style-text" id="previewNormal" style="font-weight:400;font-style:normal;">Hola Mundo</span>
                                </div>
                                <div class="preview-row">
                                    <span class="preview-style-label">Negrita</span>
                                    <span class="preview-style-text" id="previewBold" style="font-weight:700;font-style:normal;">Hola Mundo</span>
                                </div>
                                <div class="preview-row">
                                    <span class="preview-style-label">Cursiva</span>
                                    <span class="preview-style-text" id="previewItalic" style="font-weight:400;font-style:italic;">Hola Mundo</span>
                                </div>
                            </div>
                        </div>

                        <!-- Cuadros de texto con códigos de implementación en tema oscuro -->
                        <details class="font-code-details">
                            <summary class="font-code-summary">Ver código para usar esta fuente</summary>
                            <div class="font-code-area" id="fontCodeArea">
                                <div class="code-section">
                                    <label class="code-label" for="fontLinkCode">HTML (&lt;link&gt;)</label>
                                    <textarea id="fontLinkCode" readonly>&lt;link rel="preconnect" href="https://fonts.googleapis.com"&gt;
&lt;link rel="preconnect" href="https://fonts.gstatic.com" crossorigin&gt;
&lt;link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"&gt;</textarea>
                                </div>
                                <div class="code-section">
                                    <label class="code-label" for="fontImportCode">CSS (@import)</label>
                                    <textarea id="fontImportCode" readonly>@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');</textarea>
                                </div>
                                <div class="code-section">
                                    <label class="code-label" for="fontCssRuleCode">Regla CSS</label>
                                    <input type="text" id="fontCssRuleCode" class="code-output-input" readonly value="font-family: 'Roboto', sans-serif;">
                                </div>
                            </div>
                        </details>
                    </div>
                </div>

                <!-- MÓDULO 4: Efectos Visuales CSS -->
                <div class="interactive-preview-card tool-module-card" id="toolsInteractiveCard" style="margin-top: 28px;">

                    <div class="card-module-body">
                        <div class="module-title-row">
                            <h2>Efectos visuales</h2>
                            <span class="module-hint">4 efectos listos</span>
                        </div>

                        <!-- Escenario de previsualización -->
                        <div class="card-display-area" style="border-radius: var(--radius-md); margin-bottom: 15px;">
                            <div class="demo-box demo-effect-glow" id="toolsDemoBox">
                                <div class="demo-box-inner">
                                    <span class="demo-icon" id="toolsDemoIcon">✨</span>
                                    <strong class="demo-title" id="toolsDemoTitle">Neón Glow</strong>
                                    <span class="demo-sub" id="toolsDemoSub">Elige un efecto abajo</span>
                                </div>
                            </div>
                        </div>

                        <!-- Selector de efectos en vivo -->
                        <div class="card-controls" style="border: 1px solid var(--border-color); border-radius: var(--radius-md); margin-bottom: 15px;">
                            <span class="controls-label" id="effectsLabel">Efecto</span>
                            <div class="effect-pills" id="toolsEffectPills" role="group" aria-labelledby="effectsLabel">
                                <button type="button" class="pill-btn active" aria-pressed="true" data-effect="glow">Neón</button>
                                <button type="button" class="pill-btn" aria-pressed="false" data-effect="glass">Glass</button>
                                <button type="button" class="pill-btn" aria-pressed="false" data-effect="gradient">Gradiente</button>
                                <button type="button" class="pill-btn" aria-pressed="false" data-effect="float">Flotante</button>
                            </div>
                        </div>

                        <!-- Código generado en vivo con botón para copiar -->
                        <div class="card-code-snippet" style="border-radius: var(--radius-md);">
                            <pre tabindex="0"><code id="toolsCodeSnippet">/* Efecto Neón Glow */
box-shadow: 0 0 25px rgba(33, 150, 243, 0.45);
border: 2px solid #2196f3;
background: #ffffff;</code></pre>
                            <button type="button" class="copy-snippet-btn" id="copyToolsSnippet">
                                <svg aria-hidden="true" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                </svg>
                                <span id="copyToolsSnippetText">Copiar</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- MÓDULO 6: Generador de Efectos Glassmorphism Avanzado -->
                <div class="interactive-preview-card tool-module-card" id="glassmorphismCard" style="margin-top: 28px;">

                    <div class="card-module-body">
                        <div class="module-title-row">
                            <h2>Glassmorphism</h2>
                            <span class="module-hint">Efecto de vidrio esmerilado</span>
                        </div>

                        <!-- Escenario de previsualización con fondo degradado y esferas flotantes -->
                        <div class="glass-preview-stage gradient-purple" id="glassPreviewStage">
                            <div class="glass-stage-orb orb-1"></div>
                            <div class="glass-stage-orb orb-2"></div>
                            <div class="glass-stage-card" id="glassStageCard">
                                <div class="glass-stage-card-content">
                                    <span class="glass-card-icon">💎</span>
                                    <strong>Efecto vidrio</strong>
                                    <span class="glass-card-sub">Mueve los controles de abajo</span>
                                </div>
                            </div>
                        </div>

                        <!-- Selector de fondo del escenario -->
                        <div class="glass-stage-bg-selector">
                            <span class="glass-bg-label" id="glassBgLabel">Fondo de prueba</span>
                            <div class="glass-bg-pills" role="group" aria-labelledby="glassBgLabel">
                                <button type="button" class="glass-bg-btn active" aria-pressed="true" data-stage-bg="gradient-purple">Púrpura</button>
                                <button type="button" class="glass-bg-btn" aria-pressed="false" data-stage-bg="gradient-ocean">Océano</button>
                                <button type="button" class="glass-bg-btn" aria-pressed="false" data-stage-bg="gradient-sunset">Atardecer</button>
                                <button type="button" class="glass-bg-btn" aria-pressed="false" data-stage-bg="mesh-dark">Oscuro</button>
                            </div>
                        </div>

                        <!-- Panel de Sliders -->
                        <div class="glass-controls-list">
                            <!-- Desenfoque (Blur) -->
                            <div class="glass-ctrl-row">
                                <div class="flex-slider-header">
                                    <label for="glassBlurRange" class="flex-ctrl-label">Desenfoque (blur)</label>
                                    <span id="glassBlurVal" class="flex-val-tag">12px</span>
                                </div>
                                <input type="range" id="glassBlurRange" min="0" max="40" value="12" class="tool-range-slider">
                            </div>

                            <!-- Opacidad del fondo (Transparencia) -->
                            <div class="glass-ctrl-row">
                                <div class="flex-slider-header">
                                    <label for="glassOpacityRange" class="flex-ctrl-label">Opacidad del fondo</label>
                                    <span id="glassOpacityVal" class="flex-val-tag">25%</span>
                                </div>
                                <input type="range" id="glassOpacityRange" min="5" max="95" value="25" class="tool-range-slider">
                            </div>

                            <!-- Opacidad del borde -->
                            <div class="glass-ctrl-row">
                                <div class="flex-slider-header">
                                    <label for="glassBorderRange" class="flex-ctrl-label">Opacidad del borde</label>
                                    <span id="glassBorderVal" class="flex-val-tag">40%</span>
                                </div>
                                <input type="range" id="glassBorderRange" min="0" max="100" value="40" class="tool-range-slider">
                            </div>

                            <!-- Sombra (Box Shadow) -->
                            <div class="glass-ctrl-row">
                                <div class="flex-slider-header">
                                    <label for="glassShadowRange" class="flex-ctrl-label">Sombra</label>
                                    <span id="glassShadowVal" class="flex-val-tag">20px</span>
                                </div>
                                <input type="range" id="glassShadowRange" min="0" max="50" value="20" class="tool-range-slider">
                            </div>
                        </div>

                        <!-- Código CSS generado -->
                        <div class="card-code-snippet code-output-panel">
                            <div class="code-output-header">
                                <span class="code-output-label">Código CSS generado</span>
                                <button type="button" class="copy-snippet-btn" id="copyGlassCssBtn">
                                    <svg aria-hidden="true" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                    <span id="copyGlassCssText">Copiar</span>
                                </button>
                            </div>
                            <textarea id="glassCssOutput" class="code-output" readonly aria-label="Código CSS generado"></textarea>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <?php 
$extraScripts = '
<script src="js/toast.js"></script>
<script src="js/color-picker.js"></script>
<script src="js/box-model.js"></script>
<script src="js/flexbox.js"></script>
<script src="js/contrast.js"></script>
<script src="js/fonts.js"></script>
<script src="js/effects.js"></script>
<script src="js/glassmorphism.js"></script>
';
include 'includes/footer.php'; 
?>
