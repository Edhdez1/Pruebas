<?php 
$currentPage = 'herramientas'; 
$pageTitle = 'Herramientas - CSS Helper';
$extraHead = '<style id="dynamicFontLoader"></style>';
include 'includes/header.php';
?>

    <main class="container">
        <!-- Encabezado de Herramientas -->
        <header class="section-hero">
            <div class="hero-text">
                <div class="hero-badge">
                    <span class="badge-dot"></span>
                    <span>Utilidades Frontend</span>
                </div>
                <h2>Generadores y <span class="text-gradient">Herramientas CSS</span></h2>
                <p>Manipula colores con precisión, diseña interactivamente tu modelo de caja, prueba tipografías y experimenta con efectos visuales modernos con código listo para tus proyectos.</p>
            </div>
        </header>

        <div class="two-columns">
            <!-- ========================================== -->
            <!-- COLUMNA IZQUIERDA                          -->
            <!-- ========================================== -->
            <section class="column-left">
                <!-- MÓDULO 1: Selector de Color -->
                <div class="interactive-preview-card tool-module-card" id="colorPickerCard">
                    <div class="card-glass-header">
                        <div class="window-dots">
                            <span class="dot dot-red"></span>
                            <span class="dot dot-yellow"></span>
                            <span class="dot dot-green"></span>
                        </div>
                        <span class="window-title">color-picker.css</span>
                        <span class="badge-live">COLOR</span>
                    </div>

                    <div class="card-module-body">
                        <div class="module-title-row">
                            <h2>Selector de Color</h2>
                            <span class="module-hint">HEX · RGB · HSL</span>
                        </div>

                        <div class="color-picker-widget-inner">
                            <!-- Mapa 2D de Saturación y Luminosidad -->
                            <div class="color-map-container" id="colorMap" style="background-color: hsl(0, 100%, 50%);">
                                <div class="color-map-overlay-white"></div>
                                <div class="color-map-overlay-black"></div>
                                <div class="color-map-pointer" id="colorMapPointer"></div>
                            </div>
                            
                            <!-- Barra 1D de Tonalidad (Hue) -->
                            <div class="hue-slider-container" id="hueSlider">
                                <div class="hue-slider-thumb" id="hueSliderThumb"></div>
                            </div>
                        </div>

                        <!-- Caja de Información con Glassmorphism y Neón Glow -->
                        <div class="color-info-box demo-effect-glass" id="colorInfoBox" style="margin-top: 18px;">
                            <div class="color-preview demo-effect-glow" id="colorPreview" title="Muestra con Neón Glow reactivo"></div>
                            <div class="color-codes">
                                <div class="code-group">
                                    <span class="code-label">HEX:</span>
                                    <input type="text" id="hexCode" readonly>
                                    <button class="copy-btn" data-target="hexCode">Copiar</button>
                                </div>
                                <div class="code-group">
                                    <span class="code-label">RGB:</span>
                                    <input type="text" id="rgbCode" readonly>
                                    <button class="copy-btn" data-target="rgbCode">Copiar</button>
                                </div>
                                <div class="code-group">
                                    <span class="code-label">HSL:</span>
                                    <input type="text" id="hslCode" readonly>
                                    <button class="copy-btn" data-target="hslCode">Copiar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MÓDULO 2: Modelo de Caja CSS (Box Model) -->
                <div class="interactive-preview-card tool-module-card" id="boxModelCard" style="margin-top: 28px;">
                    <div class="card-glass-header">
                        <div class="window-dots">
                            <span class="dot dot-red"></span>
                            <span class="dot dot-yellow"></span>
                            <span class="dot dot-green"></span>
                        </div>
                        <span class="window-title">box-model.css</span>
                        <span class="badge-live">BOX MODEL</span>
                    </div>

                    <div class="card-module-body">
                        <div class="module-title-row">
                            <h2>Modelo de Caja CSS</h2>
                            <span class="module-hint">Interactivo (Drag & Drop)</span>
                        </div>

                        <div class="bm-legend">
                            <span><span class="bm-legend-swatch" style="background:rgba(246,178,107,0.7)"></span> margin</span>
                            <span><span class="bm-legend-swatch" style="background:rgba(253,216,53,0.7)"></span> border</span>
                            <span><span class="bm-legend-swatch" style="background:rgba(129,199,132,0.7)"></span> padding</span>
                            <span><span class="bm-legend-swatch" style="background:rgba(100,181,246,0.6)"></span> content</span>
                        </div>

                        <div class="box-model-visual-wrapper demo-effect-glass">
                            <div id="boxModelVisual"></div>
                        </div>

                        <!-- Salida CSS con tema oscuro de editor -->
                        <div class="card-code-snippet" style="margin-top: 16px; border-radius: var(--radius-md); flex-direction: column;">
                            <div class="box-model-output-header" style="width: 100%; display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                                <span class="code-label" style="color: #94a3b8; font-size: 0.8rem; font-weight: 600;">Código CSS generado:</span>
                                <div style="display:flex; gap:8px;">
                                    <button type="button" class="copy-snippet-btn" id="resetBoxModel">Reset</button>
                                    <button type="button" class="copy-snippet-btn" id="copyBoxModelCss">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                        <span id="copyBoxModelCssText">Copiar</span>
                                    </button>
                                </div>
                            </div>
                            <textarea id="boxModelCssOutput" readonly style="width: 100%; height: 115px; background: transparent; border: none; color: #38bdf8; font-family: 'Consolas', 'Courier New', monospace; font-size: 0.82rem; resize: none; outline: none; line-height: 1.5;"></textarea>
                        </div>
                    </div>
                </div>

                <!-- MÓDULO 5: Generador de Flexbox & CSS Grid -->
                <div class="interactive-preview-card tool-module-card" id="flexboxCard" style="margin-top: 28px;">
                    <div class="card-glass-header">
                        <div class="window-dots">
                            <span class="dot dot-red"></span>
                            <span class="dot dot-yellow"></span>
                            <span class="dot dot-green"></span>
                        </div>
                        <span class="window-title">flexbox-grid-builder.css</span>
                        <span class="badge-live">LAYOUT BUILDER</span>
                    </div>

                    <div class="card-module-body">
                        <div class="module-title-row">
                            <h2>Generador de Flexbox & Grid</h2>
                            <span class="module-hint">Simulador Visual en Vivo</span>
                        </div>

                        <!-- Selector de Modo: Flexbox o CSS Grid -->
                        <div class="flex-mode-switch">
                            <button type="button" class="flex-mode-btn active" id="btnModeFlex">Flexbox</button>
                            <button type="button" class="flex-mode-btn" id="btnModeGrid">CSS Grid</button>
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
                                    <option value="repeat(5, 1fr)">repeat(5, 1fr) (máx 5)</option>
                                    <option value="repeat(auto-fit, minmax(80px, 1fr))">auto-fit (minmax 80px)</option>
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
                                    <label for="flexGapRange" class="flex-ctrl-label">gap (espaciado):</label>
                                    <span id="flexGapValue" class="flex-val-tag">12px</span>
                                </div>
                                <input type="range" id="flexGapRange" min="0" max="40" value="12" class="tool-range-slider">
                            </div>
                        </div>

                        <!-- Acciones de Items -->
                        <div class="flex-items-bar">
                            <span class="flex-items-count-text">Elementos en el contenedor (<span id="flexItemsCount">4</span> / 5 máx):</span>
                            <div class="flex-items-btn-group">
                                <button type="button" class="btn-item-action" id="btnRemoveItem" title="Quitar elemento">− Quitar</button>
                                <button type="button" class="btn-item-action" id="btnAddItem" title="Añadir elemento">+ Añadir</button>
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
                        <div class="card-code-snippet" style="margin-top: 16px; border-radius: var(--radius-md); flex-direction: column;">
                            <div class="box-model-output-header" style="width: 100%; display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                                <span class="code-label" style="color: #94a3b8; font-size: 0.8rem; font-weight: 600;">Regla CSS resultante:</span>
                                <button type="button" class="copy-snippet-btn" id="copyFlexCssBtn">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                    <span id="copyFlexCssText">Copiar</span>
                                </button>
                            </div>
                            <textarea id="flexCssOutput" readonly style="width: 100%; height: 110px; background: transparent; border: none; color: #38bdf8; font-family: 'Consolas', 'Courier New', monospace; font-size: 0.82rem; resize: none; outline: none; line-height: 1.5;"></textarea>
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
                    <div class="card-glass-header">
                        <div class="window-dots">
                            <span class="dot dot-red"></span>
                            <span class="dot dot-yellow"></span>
                            <span class="dot dot-green"></span>
                        </div>
                        <span class="window-title">contrast-preview.css</span>
                        <span class="badge-live">CONTRASTE</span>
                    </div>

                    <div class="card-module-body">
                        <div class="module-title-row">
                            <h2>Contraste & Accesibilidad</h2>
                            <span class="module-hint">Previsualización en Vivo</span>
                        </div>

                        <!-- Selector dual de colores (Texto y Fondo) -->
                        <div class="contrast-pickers-row">
                            <div class="contrast-picker-box">
                                <label for="contrastTextColor" class="contrast-label">Color de Texto:</label>
                                <div class="contrast-input-wrap">
                                    <input type="color" id="contrastTextColor" value="#0f172a" class="contrast-color-native">
                                    <input type="text" id="contrastTextHex" value="#0f172a" class="contrast-hex-input" maxlength="7">
                                </div>
                            </div>

                            <button type="button" id="btnSwapContrast" class="btn-swap-contrast" title="Invertir colores texto y fondo">
                                ⇄
                            </button>

                            <div class="contrast-picker-box">
                                <label for="contrastBgColor" class="contrast-label">Color de Fondo:</label>
                                <div class="contrast-input-wrap">
                                    <input type="color" id="contrastBgColor" value="#ffffff" class="contrast-color-native">
                                    <input type="text" id="contrastBgHex" value="#ffffff" class="contrast-hex-input" maxlength="7">
                                </div>
                            </div>
                        </div>

                        <!-- Botón para sincronizar con el selector de color de al lado -->
                        <div class="contrast-sync-row">
                            <button type="button" id="btnSyncWithPicker" class="btn-sync-picker">
                                🎨 Usar color actual del Selector (#hexCode)
                            </button>
                        </div>

                        <!-- Muestra de contraste (Live Preview) -->
                        <div class="contrast-preview-stage" id="contrastPreviewBox">
                            <h3 id="contrastSampleHeading">Título de Muestra</h3>
                            <p id="contrastSampleBody">El diseño accesible garantiza que cualquier persona pueda leer tu contenido con facilidad sobre cualquier color de fondo.</p>
                        </div>
                    </div>
                </div>

                <!-- MÓDULO 3: Buscador de Fuentes Google Fonts -->
                <div class="interactive-preview-card tool-module-card" id="fontSearchCard" style="margin-top: 28px;">
                    <div class="card-glass-header">
                        <div class="window-dots">
                            <span class="dot dot-red"></span>
                            <span class="dot dot-yellow"></span>
                            <span class="dot dot-green"></span>
                        </div>
                        <span class="window-title">google-fonts.css</span>
                        <span class="badge-live">GOOGLE FONTS</span>
                    </div>

                    <div class="card-module-body">
                        <div class="module-title-row">
                            <h2>Selector de Fuentes</h2>
                            <span class="module-hint">Explora & Previsualiza</span>
                        </div>

                        <!-- Grid de chips de fuentes -->
                        <div id="fontChipsGrid" class="font-chips-grid">
                            <!-- Se llena dinámicamente con JS -->
                            <span class="font-chips-loading">Cargando fuentes…</span>
                        </div>
                        <div id="searchMessage" style="color: #ef4444; font-size: 0.88rem; margin-top: 6px; display: none;"></div>

                        <!-- Input de texto personalizable para preview -->
                        <div class="font-preview-input-row">
                            <label for="fontPreviewCustomText" class="font-preview-input-label">✏️ Texto de previsualización</label>
                            <input type="text" id="fontPreviewCustomText" class="font-preview-custom-input" placeholder="Escribe algo para previsualizar…" value="Hola Mundo">
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
                        <details class="font-code-details" style="margin-top: 16px; cursor: pointer;">
                            <summary style="font-weight: 600; margin-bottom: 10px; color: #334155; font-size: 0.9rem; user-select: none;">Ver códigos de implementación</summary>
                            <div class="font-code-area" id="fontCodeArea">
                                <div class="code-section">
                                    <span class="code-label">HTML (&lt;link&gt;):</span>
                                    <textarea id="fontLinkCode" readonly>&lt;link rel="preconnect" href="https://fonts.googleapis.com"&gt;
&lt;link rel="preconnect" href="https://fonts.gstatic.com" crossorigin&gt;
&lt;link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"&gt;</textarea>
                                </div>
                                <div class="code-section">
                                    <span class="code-label">CSS (@import):</span>
                                    <textarea id="fontImportCode" readonly>@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');</textarea>
                                </div>
                                <div class="code-section">
                                    <span class="code-label">Regla CSS:</span>
                                    <input type="text" id="fontCssRuleCode" readonly value="font-family: 'Roboto', sans-serif;" style="width: 100%; padding: 10px 12px; border: 1px solid #1e293b; border-radius: 8px; background: #0f172a; color: #38bdf8; font-family: 'Consolas', monospace; font-size: 0.82rem;">
                                </div>
                            </div>
                        </details>
                    </div>
                </div>

                <!-- MÓDULO 4: Efectos Visuales CSS -->
                <div class="interactive-preview-card tool-module-card" id="toolsInteractiveCard" style="margin-top: 28px;">
                    <div class="card-glass-header">
                        <div class="window-dots">
                            <span class="dot dot-red"></span>
                            <span class="dot dot-yellow"></span>
                            <span class="dot dot-green"></span>
                        </div>
                        <span class="window-title">effects-presets.css</span>
                        <span class="badge-live">EFECTOS</span>
                    </div>

                    <div class="card-module-body">
                        <div class="module-title-row">
                            <h2>Efectos Visuales CSS</h2>
                            <span class="module-hint">Presets & Generador</span>
                        </div>

                        <!-- Escenario de previsualización -->
                        <div class="card-display-area" style="border-radius: var(--radius-md); margin-bottom: 15px;">
                            <div class="demo-box demo-effect-glow" id="toolsDemoBox">
                                <div class="demo-box-inner">
                                    <span class="demo-icon" id="toolsDemoIcon">✨</span>
                                    <strong class="demo-title" id="toolsDemoTitle">Neón Glow</strong>
                                    <span class="demo-sub" id="toolsDemoSub">Haz clic en los efectos abajo</span>
                                </div>
                            </div>
                        </div>

                        <!-- Selector de efectos en vivo -->
                        <div class="card-controls" style="border: 1px solid var(--border-color); border-radius: var(--radius-md); margin-bottom: 15px;">
                            <span class="controls-label">Efecto CSS:</span>
                            <div class="effect-pills" id="toolsEffectPills">
                                <button type="button" class="pill-btn active" data-effect="glow">Neón</button>
                                <button type="button" class="pill-btn" data-effect="glass">Glass</button>
                                <button type="button" class="pill-btn" data-effect="gradient">Gradiente</button>
                                <button type="button" class="pill-btn" data-effect="float">Flotante</button>
                            </div>
                        </div>

                        <!-- Código generado en vivo con botón para copiar -->
                        <div class="card-code-snippet" style="border-radius: var(--radius-md);">
                            <pre><code id="toolsCodeSnippet">/* Efecto Neón Glow */
box-shadow: 0 0 25px rgba(33, 150, 243, 0.45);
border: 2px solid #2196f3;
background: #ffffff;</code></pre>
                            <button type="button" class="copy-snippet-btn" id="copyToolsSnippet" title="Copiar código CSS">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                    <div class="card-glass-header">
                        <div class="window-dots">
                            <span class="dot dot-red"></span>
                            <span class="dot dot-yellow"></span>
                            <span class="dot dot-green"></span>
                        </div>
                        <span class="window-title">glassmorphism-studio.css</span>
                        <span class="badge-live">GLASS STUDIO</span>
                    </div>

                    <div class="card-module-body">
                        <div class="module-title-row">
                            <h2>Generador de Glassmorphism</h2>
                            <span class="module-hint">Efecto Vidrio Translúcido</span>
                        </div>

                        <!-- Escenario de previsualización con fondo degradado y esferas flotantes -->
                        <div class="glass-preview-stage" id="glassPreviewStage">
                            <div class="glass-stage-orb orb-1"></div>
                            <div class="glass-stage-orb orb-2"></div>
                            <div class="glass-stage-card" id="glassStageCard">
                                <div class="glass-stage-card-content">
                                    <span class="glass-card-icon">💎</span>
                                    <strong>Efecto Vidrio</strong>
                                    <span class="glass-card-sub">Ajusta los sliders en vivo</span>
                                </div>
                            </div>
                        </div>

                        <!-- Selector de fondo del escenario -->
                        <div class="glass-stage-bg-selector">
                            <span class="glass-bg-label">Fondo de prueba:</span>
                            <div class="glass-bg-pills">
                                <button type="button" class="glass-bg-btn active" data-stage-bg="gradient-purple">Púrpura</button>
                                <button type="button" class="glass-bg-btn" data-stage-bg="gradient-ocean">Océano</button>
                                <button type="button" class="glass-bg-btn" data-stage-bg="gradient-sunset">Sunset</button>
                                <button type="button" class="glass-bg-btn" data-stage-bg="mesh-dark">Mesh Dark</button>
                            </div>
                        </div>

                        <!-- Panel de Sliders -->
                        <div class="glass-controls-list">
                            <!-- Desenfoque (Blur) -->
                            <div class="glass-ctrl-row">
                                <div class="flex-slider-header">
                                    <label for="glassBlurRange" class="flex-ctrl-label">backdrop-filter blur:</label>
                                    <span id="glassBlurVal" class="flex-val-tag">12px</span>
                                </div>
                                <input type="range" id="glassBlurRange" min="0" max="40" value="12" class="tool-range-slider">
                            </div>

                            <!-- Opacidad del fondo (Transparencia) -->
                            <div class="glass-ctrl-row">
                                <div class="flex-slider-header">
                                    <label for="glassOpacityRange" class="flex-ctrl-label">Opacidad del fondo:</label>
                                    <span id="glassOpacityVal" class="flex-val-tag">25%</span>
                                </div>
                                <input type="range" id="glassOpacityRange" min="5" max="95" value="25" class="tool-range-slider">
                            </div>

                            <!-- Opacidad del borde -->
                            <div class="glass-ctrl-row">
                                <div class="flex-slider-header">
                                    <label for="glassBorderRange" class="flex-ctrl-label">Opacidad del borde:</label>
                                    <span id="glassBorderVal" class="flex-val-tag">40%</span>
                                </div>
                                <input type="range" id="glassBorderRange" min="0" max="100" value="40" class="tool-range-slider">
                            </div>

                            <!-- Sombra (Box Shadow) -->
                            <div class="glass-ctrl-row">
                                <div class="flex-slider-header">
                                    <label for="glassShadowRange" class="flex-ctrl-label">Sombra difuminada:</label>
                                    <span id="glassShadowVal" class="flex-val-tag">20px</span>
                                </div>
                                <input type="range" id="glassShadowRange" min="0" max="50" value="20" class="tool-range-slider">
                            </div>
                        </div>

                        <!-- Código CSS generado -->
                        <div class="card-code-snippet" style="margin-top: 16px; border-radius: var(--radius-md); flex-direction: column;">
                            <div class="box-model-output-header" style="width: 100%; display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                                <span class="code-label" style="color: #94a3b8; font-size: 0.8rem; font-weight: 600;">Regla CSS resultante:</span>
                                <button type="button" class="copy-snippet-btn" id="copyGlassCssBtn">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                    <span id="copyGlassCssText">Copiar</span>
                                </button>
                            </div>
                            <textarea id="glassCssOutput" readonly style="width: 100%; height: 120px; background: transparent; border: none; color: #38bdf8; font-family: 'Consolas', 'Courier New', monospace; font-size: 0.82rem; resize: none; outline: none; line-height: 1.5;"></textarea>
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
