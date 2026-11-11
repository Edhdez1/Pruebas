<?php
$currentPage = 'snipets';
$pageTitle = 'Snippets de CSS | CSS Helper';
include 'includes/header.php';
?>

    <main class="container" id="main-content">
        <!-- Hero de la sección -->
        <header class="section-hero">
            <div class="hero-text">
                <h1>Snippets de CSS moderno</h1>
                <p>Soluciones cortas para problemas frecuentes de maquetación, texto, scroll y estilos base. Cada una con vista previa y botón para copiar.</p>
            </div>
            <div class="palette-actions">
                <div class="snippet-search-box">
                    <label for="snippetSearchInput" class="visually-hidden">Buscar snippets</label>
                    <input type="search" id="snippetSearchInput" placeholder="Buscar: centrado, scroll, texto…" class="snippet-filter-input" autocomplete="off">
                </div>
            </div>
        </header>

        <!-- Filtros por categoría de snippets -->
        <div class="snippet-categories" id="snippetCategories" role="group" aria-label="Filtrar por categoría">
            <button type="button" class="snippet-cat-btn active" aria-pressed="true" data-cat="all">Todos</button>
            <button type="button" class="snippet-cat-btn" aria-pressed="false" data-cat="layout">Maquetación y Grid</button>
            <button type="button" class="snippet-cat-btn" aria-pressed="false" data-cat="text">Texto y tipografía</button>
            <button type="button" class="snippet-cat-btn" aria-pressed="false" data-cat="ui">Interfaz y scroll</button>
            <button type="button" class="snippet-cat-btn" aria-pressed="false" data-cat="reset">Reset y base</button>
            <button type="button" class="snippet-cat-btn" aria-pressed="false" data-cat="effects">Efectos y vidrio</button>
        </div>

        <!-- Grid de Snippets -->
        <div class="snippets-grid" id="snippetsGrid">

            <!-- SNIPPET 1: Centrado absoluto moderno -->
            <article class="interactive-preview-card snippet-card" data-cat="layout" data-title="centrado absoluto moderno grid place-items center">
                <div class="card-module-body snippet-body">
                    <div class="snippet-header-info">
                        <h2>Centrado perfecto con Grid</h2>
                        <p>Centra cualquier elemento tanto vertical como horizontalmente en una sola línea con CSS Grid.</p>
                    </div>

                    <!-- Mini Preview Interactivo -->
                    <div class="snippet-live-demo">
                        <div class="demo-center-container">
                            <span class="demo-center-chip">¡Centrado perfecto!</span>
                        </div>
                    </div>

                    <div class="snippet-code-box">
                        <pre tabindex="0"><code>.container {
  display: grid;
  place-items: center;
  min-height: 100vh;
}</code></pre>
                        <button type="button" class="snippet-copy-btn" data-code=".container {&#10;  display: grid;&#10;  place-items: center;&#10;  min-height: 100vh;&#10;}">
                            <svg width="14" height="14" aria-hidden="true"><use href="#icon-copy"></use></svg>
                            <span>Copiar</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- SNIPPET 2: Truncado de texto (1 línea con elipsis) -->
            <article class="interactive-preview-card snippet-card" data-cat="text" data-title="truncado texto elipsis una linea overflow ellipsis nowrap">
                <div class="card-module-body snippet-body">
                    <div class="snippet-header-info">
                        <h2>Cortar texto en 1 línea</h2>
                        <p>Corta el texto que sobrepasa el contenedor agregando automáticamente puntos suspensivos.</p>
                    </div>

                    <div class="snippet-live-demo">
                        <div class="demo-truncate-box">
                            Este es un texto excesivamente largo que se trunca de forma elegante con puntos suspensivos en una sola línea.
                        </div>
                    </div>

                    <div class="snippet-code-box">
                        <pre tabindex="0"><code>.truncate-single {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}</code></pre>
                        <button type="button" class="snippet-copy-btn" data-code=".truncate-single {&#10;  white-space: nowrap;&#10;  overflow: hidden;&#10;  text-overflow: ellipsis;&#10;}">
                            <svg width="14" height="14" aria-hidden="true"><use href="#icon-copy"></use></svg>
                            <span>Copiar</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- SNIPPET 3: Truncado multilínea con Line-Clamp -->
            <article class="interactive-preview-card snippet-card" data-cat="text" data-title="truncado multiline clamp line clamp lineas parrafo">
                <div class="card-module-body snippet-body">
                    <div class="snippet-header-info">
                        <h2>Cortar texto en varias líneas</h2>
                        <p>Limita el texto a un número exacto de líneas (ej. 2 o 3) con elipsis final.</p>
                    </div>

                    <div class="snippet-live-demo">
                        <div class="demo-line-clamp-box">
                            CSS moderno permite cortar párrafos largos a un número definido de líneas sin necesidad de recortar cadenas con JavaScript o trucos de altura fija.
                        </div>
                    </div>

                    <div class="snippet-code-box">
                        <pre tabindex="0"><code>.truncate-multiline {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}</code></pre>
                        <button type="button" class="snippet-copy-btn" data-code=".truncate-multiline {&#10;  display: -webkit-box;&#10;  -webkit-line-clamp: 2;&#10;  -webkit-box-orient: vertical;&#10;  overflow: hidden;&#10;}">
                            <svg width="14" height="14" aria-hidden="true"><use href="#icon-copy"></use></svg>
                            <span>Copiar</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- SNIPPET 4: Ocultar Scrollbar manteniendo scroll -->
            <article class="interactive-preview-card snippet-card" data-cat="ui" data-title="ocultar scrollbar scroll desaparecer barra desplazamiento">
                <div class="card-module-body snippet-body">
                    <div class="snippet-header-info">
                        <h2>Ocultar la barra de scroll</h2>
                        <p>Mantiene el desplazamiento funcional (horizontal o vertical) pero hace invisible la barra.</p>
                    </div>

                    <div class="snippet-live-demo">
                        <div class="demo-hide-scroll-box" tabindex="0">
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
                        <pre tabindex="0"><code>.hide-scrollbar {
  -ms-overflow-style: none; /* IE y Edge */
  scrollbar-width: none;    /* Firefox */
}
.hide-scrollbar::-webkit-scrollbar {
  display: none;            /* Chrome, Safari, Opera */
}</code></pre>
                        <button type="button" class="snippet-copy-btn" data-code=".hide-scrollbar {&#10;  -ms-overflow-style: none;&#10;  scrollbar-width: none;&#10;}&#10;.hide-scrollbar::-webkit-scrollbar {&#10;  display: none;&#10;}">
                            <svg width="14" height="14" aria-hidden="true"><use href="#icon-copy"></use></svg>
                            <span>Copiar</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- SNIPPET 5: Reset CSS Moderno y Ligero -->
            <article class="interactive-preview-card snippet-card" data-cat="reset" data-title="reset css moderno box sizing margin padding responsive media">
                <div class="card-module-body snippet-body">
                    <div class="snippet-header-info">
                        <h2>Reset CSS moderno</h2>
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
                        <pre tabindex="0"><code>*, *::before, *::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
img, picture, svg, video {
  display: block;
  max-width: 100%;
}</code></pre>
                        <button type="button" class="snippet-copy-btn" data-code="*, *::before, *::after {&#10;  box-sizing: border-box;&#10;  margin: 0;&#10;  padding: 0;&#10;}&#10;img, picture, svg, video {&#10;  display: block;&#10;  max-width: 100%;&#10;}">
                            <svg width="14" height="14" aria-hidden="true"><use href="#icon-copy"></use></svg>
                            <span>Copiar</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- SNIPPET 6: Efecto Glassmorphism (Efecto Vidrio) -->
            <article class="interactive-preview-card snippet-card" data-cat="effects" data-title="glassmorphism efecto vidrio backdrop filter blur transparencia">
                <div class="card-module-body snippet-body">
                    <div class="snippet-header-info">
                        <h2>Efecto vidrio (glassmorphism)</h2>
                        <p>Diseño translúcido moderno con desenfoque de fondo y borde sutil reflectante.</p>
                    </div>

                    <div class="snippet-live-demo demo-glass-bg">
                        <div class="demo-glass-card">
                            <span>✨ Frosted Glass</span>
                        </div>
                    </div>

                    <div class="snippet-code-box">
                        <pre tabindex="0"><code>.glass-card {
  background: rgba(255, 255, 255, 0.7);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border: 1px solid rgba(255, 255, 255, 0.4);
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}</code></pre>
                        <button type="button" class="snippet-copy-btn" data-code=".glass-card {&#10;  background: rgba(255, 255, 255, 0.7);&#10;  backdrop-filter: blur(12px);&#10;  -webkit-backdrop-filter: blur(12px);&#10;  border: 1px solid rgba(255, 255, 255, 0.4);&#10;  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);&#10;}">
                            <svg width="14" height="14" aria-hidden="true"><use href="#icon-copy"></use></svg>
                            <span>Copiar</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- SNIPPET 7: Cuadrícula Responsiva Auto-Fit (Sin Media Queries) -->
            <article class="interactive-preview-card snippet-card" data-cat="layout" data-title="grid responsive columnas auto fit minmax sin media queries">
                <div class="card-module-body snippet-body">
                    <div class="snippet-header-info">
                        <h2>Cuadrícula que se adapta sola</h2>
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
                        <pre tabindex="0"><code>.auto-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 16px;
}</code></pre>
                        <button type="button" class="snippet-copy-btn" data-code=".auto-grid {&#10;  display: grid;&#10;  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));&#10;  gap: 16px;&#10;}">
                            <svg width="14" height="14" aria-hidden="true"><use href="#icon-copy"></use></svg>
                            <span>Copiar</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- SNIPPET 8: Texto con Gradiente (Gradient Text) -->
            <article class="interactive-preview-card snippet-card" data-cat="text" data-title="texto degradado gradiente gradient text background clip text">
                <div class="card-module-body snippet-body">
                    <div class="snippet-header-info">
                        <h2>Texto con degradado</h2>
                        <p>Aplica cualquier degradado lineal directamente a las letras de tus títulos destacados.</p>
                    </div>

                    <div class="snippet-live-demo">
                        <span class="demo-gradient-text-sample">Creatividad CSS</span>
                    </div>

                    <div class="snippet-code-box">
                        <pre tabindex="0"><code>.gradient-text {
  background: linear-gradient(135deg, #2563eb, #9333ea);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}</code></pre>
                        <button type="button" class="snippet-copy-btn" data-code=".gradient-text {&#10;  background: linear-gradient(135deg, #2563eb, #9333ea);&#10;  -webkit-background-clip: text;&#10;  -webkit-text-fill-color: transparent;&#10;}">
                            <svg width="14" height="14" aria-hidden="true"><use href="#icon-copy"></use></svg>
                            <span>Copiar</span>
                        </button>
                    </div>
                </div>
            </article>

        </div>

        <div id="noSnippetsMessage" class="no-snippets-found" role="status" style="display: none;">
            <p>Ningún snippet coincide con tu búsqueda. Prueba con otra palabra o elige «Todos».</p>
        </div>
    </main>

<?php 
$extraScripts = '<script src="js/toast.js"></script><script src="js/snippets.js"></script>';
include 'includes/footer.php'; 
?>
