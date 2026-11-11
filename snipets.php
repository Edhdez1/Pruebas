<?php
$currentPage = 'snipets';
$pageTitle = 'Snippets Rápidos de CSS Moderno - CSS Helper';
include 'includes/header.php';
?>

    <main class="container">
        <!-- Hero de la sección -->
        <header class="section-hero">
            <div class="hero-text">
                <div class="hero-badge">
                    <span class="badge-dot"></span>
                    <span>CSS Cheat Sheet</span>
                </div>
                <h2>Snippets Rápidos de <span class="text-gradient">CSS Moderno</span></h2>
                <p>Colección de soluciones prácticas, ligeras y listas para copiar para resolver problemas frecuentes de maquetación, tipografía, interactividad y reset.</p>
            </div>
            <div class="palette-actions">
                <div class="snippet-search-box">
                    <input type="text" id="snippetSearchInput" placeholder="Filtrar snippets (ej. centrado, scroll)..." class="snippet-filter-input">
                </div>
            </div>
        </header>

        <!-- Filtros por categoría de snippets -->
        <div class="snippet-categories" id="snippetCategories">
            <button type="button" class="snippet-cat-btn active" data-cat="all">Todos</button>
            <button type="button" class="snippet-cat-btn" data-cat="layout">Maquetación & Grid</button>
            <button type="button" class="snippet-cat-btn" data-cat="text">Texto & Tipografía</button>
            <button type="button" class="snippet-cat-btn" data-cat="ui">UI & Scroll</button>
            <button type="button" class="snippet-cat-btn" data-cat="reset">Reset & Base</button>
            <button type="button" class="snippet-cat-btn" data-cat="effects">Efectos & Vidrio</button>
        </div>

        <!-- Grid de Snippets -->
        <div class="snippets-grid" id="snippetsGrid">

            <!-- SNIPPET 1: Centrado absoluto moderno -->
            <article class="interactive-preview-card snippet-card" data-cat="layout" data-title="centrado absoluto moderno grid place-items center">
                <div class="card-glass-header">
                    <div class="window-dots">
                        <span class="dot dot-red"></span>
                        <span class="dot dot-yellow"></span>
                        <span class="dot dot-green"></span>
                    </div>
                    <span class="window-title">layout-center.css</span>
                    <span class="badge-live">GRID</span>
                </div>
                <div class="card-module-body snippet-body">
                    <div class="snippet-header-info">
                        <h3>Centrado Absoluto Moderno</h3>
                        <p>Centra cualquier elemento tanto vertical como horizontalmente en una sola línea con CSS Grid.</p>
                    </div>

                    <!-- Mini Preview Interactivo -->
                    <div class="snippet-live-demo">
                        <div class="demo-center-container">
                            <span class="demo-center-chip">¡Centrado perfecto!</span>
                        </div>
                    </div>

                    <div class="snippet-code-box">
                        <pre><code>.container {
  display: grid;
  place-items: center;
  min-height: 100vh;
}</code></pre>
                        <button type="button" class="snippet-copy-btn" data-code=".container {&#10;  display: grid;&#10;  place-items: center;&#10;  min-height: 100vh;&#10;}">
                            <svg width="14" height="14"><use href="#icon-copy"></use></svg>
                            <span>Copiar</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- SNIPPET 2: Truncado de texto (1 línea con elipsis) -->
            <article class="interactive-preview-card snippet-card" data-cat="text" data-title="truncado texto elipsis una linea overflow ellipsis nowrap">
                <div class="card-glass-header">
                    <div class="window-dots">
                        <span class="dot dot-red"></span>
                        <span class="dot dot-yellow"></span>
                        <span class="dot dot-green"></span>
                    </div>
                    <span class="window-title">truncate-single.css</span>
                    <span class="badge-live">TEXTO</span>
                </div>
                <div class="card-module-body snippet-body">
                    <div class="snippet-header-info">
                        <h3>Truncado de Texto (1 Línea)</h3>
                        <p>Corta el texto que sobrepasa el contenedor agregando automáticamente puntos suspensivos.</p>
                    </div>

                    <div class="snippet-live-demo">
                        <div class="demo-truncate-box">
                            Este es un texto excesivamente largo que se trunca de forma elegante con puntos suspensivos en una sola línea.
                        </div>
                    </div>

                    <div class="snippet-code-box">
                        <pre><code>.truncate-single {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}</code></pre>
                        <button type="button" class="snippet-copy-btn" data-code=".truncate-single {&#10;  white-space: nowrap;&#10;  overflow: hidden;&#10;  text-overflow: ellipsis;&#10;}">
                            <svg width="14" height="14"><use href="#icon-copy"></use></svg>
                            <span>Copiar</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- SNIPPET 3: Truncado multilínea con Line-Clamp -->
            <article class="interactive-preview-card snippet-card" data-cat="text" data-title="truncado multiline clamp line clamp lineas parrafo">
                <div class="card-glass-header">
                    <div class="window-dots">
                        <span class="dot dot-red"></span>
                        <span class="dot dot-yellow"></span>
                        <span class="dot dot-green"></span>
                    </div>
                    <span class="window-title">truncate-multiline.css</span>
                    <span class="badge-live">LINE CLAMP</span>
                </div>
                <div class="card-module-body snippet-body">
                    <div class="snippet-header-info">
                        <h3>Truncado Multilínea (Line Clamp)</h3>
                        <p>Limita el texto a un número exacto de líneas (ej. 2 o 3) con elipsis final.</p>
                    </div>

                    <div class="snippet-live-demo">
                        <div class="demo-line-clamp-box">
                            CSS moderno permite cortar párrafos largos a un número definido de líneas sin necesidad de recortar cadenas con JavaScript o trucos de altura fija.
                        </div>
                    </div>

                    <div class="snippet-code-box">
                        <pre><code>.truncate-multiline {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}</code></pre>
                        <button type="button" class="snippet-copy-btn" data-code=".truncate-multiline {&#10;  display: -webkit-box;&#10;  -webkit-line-clamp: 2;&#10;  -webkit-box-orient: vertical;&#10;  overflow: hidden;&#10;}">
                            <svg width="14" height="14"><use href="#icon-copy"></use></svg>
                            <span>Copiar</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- SNIPPET 4: Ocultar Scrollbar manteniendo scroll -->
            <article class="interactive-preview-card snippet-card" data-cat="ui" data-title="ocultar scrollbar scroll desaparecer barra desplazamiento">
                <div class="card-glass-header">
                    <div class="window-dots">
                        <span class="dot dot-red"></span>
                        <span class="dot dot-yellow"></span>
                        <span class="dot dot-green"></span>
                    </div>
                    <span class="window-title">hide-scrollbar.css</span>
                    <span class="badge-live">SCROLL</span>
                </div>
                <div class="card-module-body snippet-body">
                    <div class="snippet-header-info">
                        <h3>Ocultar Barra de Scroll</h3>
                        <p>Mantiene el desplazamiento funcional (horizontal o vertical) pero hace invisible la barra.</p>
                    </div>

                    <div class="snippet-live-demo">
                        <div class="demo-hide-scroll-box">
                            <div class="demo-scroll-pill">Pestaña 1</div>
                            <div class="demo-scroll-pill">Pestaña 2</div>
                            <div class="demo-scroll-pill">Pestaña 3</div>
                            <div class="demo-scroll-pill">Pestaña 4</div>
                            <div class="demo-scroll-pill">Pestaña 5</div>
                            <div class="demo-scroll-pill">Pestaña 6</div>
                        </div>
                        <span class="demo-hint-text">← Haz scroll horizontal sin barra visible →</span>
                    </div>

                    <div class="snippet-code-box">
                        <pre><code>.hide-scrollbar {
  -ms-overflow-style: none; /* IE y Edge */
  scrollbar-width: none;    /* Firefox */
}
.hide-scrollbar::-webkit-scrollbar {
  display: none;            /* Chrome, Safari, Opera */
}</code></pre>
                        <button type="button" class="snippet-copy-btn" data-code=".hide-scrollbar {&#10;  -ms-overflow-style: none;&#10;  scrollbar-width: none;&#10;}&#10;.hide-scrollbar::-webkit-scrollbar {&#10;  display: none;&#10;}">
                            <svg width="14" height="14"><use href="#icon-copy"></use></svg>
                            <span>Copiar</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- SNIPPET 5: Reset CSS Moderno y Ligero -->
            <article class="interactive-preview-card snippet-card" data-cat="reset" data-title="reset css moderno box sizing margin padding responsive media">
                <div class="card-glass-header">
                    <div class="window-dots">
                        <span class="dot dot-red"></span>
                        <span class="dot dot-yellow"></span>
                        <span class="dot dot-green"></span>
                    </div>
                    <span class="window-title">modern-reset.css</span>
                    <span class="badge-live">RESET</span>
                </div>
                <div class="card-module-body snippet-body">
                    <div class="snippet-header-info">
                        <h3>Reset CSS Moderno y Compacto</h3>
                        <p>Base esencial para cualquier proyecto: `border-box`, eliminación de márgenes y medios responsivos.</p>
                    </div>

                    <div class="snippet-live-demo">
                        <div class="demo-badge-preview">
                            <span>✓ Box-sizing aplicado</span>
                            <span>✓ Imágenes fluidas</span>
                            <span>✓ Márgenes limpios</span>
                        </div>
                    </div>

                    <div class="snippet-code-box">
                        <pre><code>*, *::before, *::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
img, picture, svg, video {
  display: block;
  max-width: 100%;
}</code></pre>
                        <button type="button" class="snippet-copy-btn" data-code="*, *::before, *::after {&#10;  box-sizing: border-box;&#10;  margin: 0;&#10;  padding: 0;&#10;}&#10;img, picture, svg, video {&#10;  display: block;&#10;  max-width: 100%;&#10;}">
                            <svg width="14" height="14"><use href="#icon-copy"></use></svg>
                            <span>Copiar</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- SNIPPET 6: Efecto Glassmorphism (Efecto Vidrio) -->
            <article class="interactive-preview-card snippet-card" data-cat="effects" data-title="glassmorphism efecto vidrio backdrop filter blur transparencia">
                <div class="card-glass-header">
                    <div class="window-dots">
                        <span class="dot dot-red"></span>
                        <span class="dot dot-yellow"></span>
                        <span class="dot dot-green"></span>
                    </div>
                    <span class="window-title">glassmorphism.css</span>
                    <span class="badge-live">EFECTOS</span>
                </div>
                <div class="card-module-body snippet-body">
                    <div class="snippet-header-info">
                        <h3>Efecto Vidrio (Glassmorphism)</h3>
                        <p>Diseño translúcido moderno con desenfoque de fondo y borde sutil reflectante.</p>
                    </div>

                    <div class="snippet-live-demo demo-glass-bg">
                        <div class="demo-glass-card">
                            <span>✨ Frosted Glass</span>
                        </div>
                    </div>

                    <div class="snippet-code-box">
                        <pre><code>.glass-card {
  background: rgba(255, 255, 255, 0.7);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border: 1px solid rgba(255, 255, 255, 0.4);
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}</code></pre>
                        <button type="button" class="snippet-copy-btn" data-code=".glass-card {&#10;  background: rgba(255, 255, 255, 0.7);&#10;  backdrop-filter: blur(12px);&#10;  -webkit-backdrop-filter: blur(12px);&#10;  border: 1px solid rgba(255, 255, 255, 0.4);&#10;  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);&#10;}">
                            <svg width="14" height="14"><use href="#icon-copy"></use></svg>
                            <span>Copiar</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- SNIPPET 7: Cuadrícula Responsiva Auto-Fit (Sin Media Queries) -->
            <article class="interactive-preview-card snippet-card" data-cat="layout" data-title="grid responsive columnas auto fit minmax sin media queries">
                <div class="card-glass-header">
                    <div class="window-dots">
                        <span class="dot dot-red"></span>
                        <span class="dot dot-yellow"></span>
                        <span class="dot dot-green"></span>
                    </div>
                    <span class="window-title">auto-grid.css</span>
                    <span class="badge-live">GRID</span>
                </div>
                <div class="card-module-body snippet-body">
                    <div class="snippet-header-info">
                        <h3>Cuadrícula Responsiva Auto-Ajustable</h3>
                        <p>Tarjetas que se adaptan automáticamente a cualquier resolución de pantalla sin escribir media queries.</p>
                    </div>

                    <div class="snippet-live-demo">
                        <div class="demo-mini-grid">
                            <div>Col 1</div>
                            <div>Col 2</div>
                            <div>Col 3</div>
                        </div>
                    </div>

                    <div class="snippet-code-box">
                        <pre><code>.auto-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 16px;
}</code></pre>
                        <button type="button" class="snippet-copy-btn" data-code=".auto-grid {&#10;  display: grid;&#10;  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));&#10;  gap: 16px;&#10;}">
                            <svg width="14" height="14"><use href="#icon-copy"></use></svg>
                            <span>Copiar</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- SNIPPET 8: Texto con Gradiente (Gradient Text) -->
            <article class="interactive-preview-card snippet-card" data-cat="text" data-title="texto degradado gradiente gradient text background clip text">
                <div class="card-glass-header">
                    <div class="window-dots">
                        <span class="dot dot-red"></span>
                        <span class="dot dot-yellow"></span>
                        <span class="dot dot-green"></span>
                    </div>
                    <span class="window-title">gradient-text.css</span>
                    <span class="badge-live">TEXTO</span>
                </div>
                <div class="card-module-body snippet-body">
                    <div class="snippet-header-info">
                        <h3>Texto con Relleno de Degradado</h3>
                        <p>Aplica cualquier degradado lineal directamente a las letras de tus títulos destacados.</p>
                    </div>

                    <div class="snippet-live-demo">
                        <span class="demo-gradient-text-sample">Creatividad CSS</span>
                    </div>

                    <div class="snippet-code-box">
                        <pre><code>.gradient-text {
  background: linear-gradient(135deg, #2563eb, #9333ea);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}</code></pre>
                        <button type="button" class="snippet-copy-btn" data-code=".gradient-text {&#10;  background: linear-gradient(135deg, #2563eb, #9333ea);&#10;  -webkit-background-clip: text;&#10;  -webkit-text-fill-color: transparent;&#10;}">
                            <svg width="14" height="14"><use href="#icon-copy"></use></svg>
                            <span>Copiar</span>
                        </button>
                    </div>
                </div>
            </article>

        </div>

        <div id="noSnippetsMessage" class="no-snippets-found" style="display: none;">
            <p>No se encontraron snippets que coincidan con tu búsqueda.</p>
        </div>
    </main>

<?php 
$extraScripts = '<script src="js/toast.js"></script><script src="js/snippets.js"></script>';
include 'includes/footer.php'; 
?>
