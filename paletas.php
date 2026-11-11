<?php
$currentPage = 'paletas';
$pageTitle = 'Paletas de Colores - CSS Helper';
require_once 'includes/palettes_data.php';
include 'includes/header.php';
?>

    <main class="container">
        <!-- Encabezado de la Sección de Paletas -->
        <header class="section-hero">
            <div class="hero-text">
                <div class="hero-badge">
                    <span class="badge-dot"></span>
                    <span>Temas Seleccionados</span>
                </div>
                <h2>Catálogo y <span class="text-gradient">Paletas de Colores</span></h2>
                <p>Colección de temas y paletas armónicas con sus respectivas subpaletas. Haz clic en cualquier código (HEX, RGB o HSL) para copiarlo directamente a tu portapapeles.</p>
            </div>
            <div class="palette-actions">
                <button type="button" id="btnExpandAll" class="action-btn">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="7 13 12 18 17 13"></polyline><polyline points="7 6 12 11 17 6"></polyline></svg>
                    Expandir todas
                </button>
                <button type="button" id="btnCollapseAll" class="action-btn">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="17 11 12 6 7 11"></polyline><polyline points="17 18 12 13 7 18"></polyline></svg>
                    Contraer todas
                </button>
            </div>
        </header>

        <!-- Lista de Desplegables de Paletas Principales -->
        <div class="palettes-list">
            <?php 
            $paletteIndex = 0;
            foreach ($palettes as $paletteKey => $palette): 
                $isFirstPalette = ($paletteIndex === 0);
                $paletteIndex++;
            ?>
                <!-- Desplegable de Paleta Principal -->
                <details class="palette-dropdown" <?= $isFirstPalette ? 'open' : '' ?>>
                    <summary class="palette-summary">
                        <div class="summary-main">
                            <span class="chevron-icon" aria-hidden="true">
                                <svg width="18" height="18"><use href="#icon-chevron"></use></svg>
                            </span>
                            <div class="palette-header-info">
                                <h3 class="palette-name"><?= htmlspecialchars($palette['name']) ?></h3>
                                <span class="badge-subpalettes"><?= htmlspecialchars($palette['badge']) ?></span>
                            </div>
                        </div>
                        <div class="preview-swatches" title="Muestra de colores de <?= htmlspecialchars($palette['name']) ?>">
                            <?php foreach ($palette['preview_colors'] as $previewHex): ?>
                                <span class="preview-dot" style="background-color: <?= htmlspecialchars($previewHex) ?>;"></span>
                            <?php endforeach; ?>
                        </div>
                    </summary>

                    <div class="palette-body">
                        <p class="palette-description"><?= htmlspecialchars($palette['description']) ?></p>

                        <!-- Subpaletas (Desplegables Internos) -->
                        <div class="subpalettes-wrapper">
                            <?php 
                            $subIndex = 0;
                            foreach ($palette['subpalettes'] as $subKey => $subpalette): 
                                $isFirstSub = ($isFirstPalette && $subIndex === 0);
                                $subIndex++;
                                $sampleColors = array_slice($subpalette['colors'], 0, 5);
                            ?>
                                <details class="subpalette-dropdown" <?= $isFirstSub ? 'open' : '' ?>>
                                    <summary class="subpalette-summary">
                                        <div class="sub-summary-main">
                                            <span class="chevron-icon small" aria-hidden="true">
                                                <svg width="15" height="15"><use href="#icon-chevron"></use></svg>
                                            </span>
                                            <h4 class="subpalette-name"><?= htmlspecialchars($subpalette['name']) ?></h4>
                                            <span class="badge-count"><?= count($subpalette['colors']) ?> colores</span>
                                        </div>
                                        <div class="preview-swatches">
                                            <?php foreach ($sampleColors as $sample): ?>
                                                <span class="preview-dot small" style="background-color: <?= htmlspecialchars($sample['hex']) ?>;"></span>
                                            <?php endforeach; ?>
                                        </div>
                                    </summary>

                                    <div class="subpalette-body">
                                        <div class="subpalette-header-bar">
                                            <p class="subpalette-description"><?= htmlspecialchars($subpalette['description']) ?></p>
                                            <button type="button" class="export-palette-btn" 
                                                    data-palette-name="<?= htmlspecialchars($palette['name'] . ' - ' . $subpalette['name']) ?>"
                                                    data-palette-colors='<?= json_encode($subpalette['colors'], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>'>
                                                <svg width="13" height="13"><use href="#icon-download"></use></svg>
                                                <span>Exportar</span>
                                            </button>
                                        </div>
                                        
                                        <!-- Tabla de Colores -->
                                        <div class="table-responsive">
                                            <table class="palette-table">
                                                <thead>
                                                    <tr>
                                                        <th class="th-swatch">Muestra</th>
                                                        <th class="th-name">Nombre</th>
                                                        <th class="th-hex">HEX</th>
                                                        <th class="th-rgb">RGB</th>
                                                        <th class="th-hsl">HSL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($subpalette['colors'] as $color): 
                                                        $hex = $color['hex'];
                                                        $rgb = hexToRgbString($hex);
                                                        $hsl = hexToHslString($hex);
                                                    ?>
                                                        <tr>
                                                            <td class="td-swatch">
                                                                <div class="color-swatch" style="background-color: <?= htmlspecialchars($hex) ?>;" title="<?= htmlspecialchars($color['name']) ?>: <?= htmlspecialchars($hex) ?>"></div>
                                                            </td>
                                                            <td class="td-name">
                                                                <span class="color-name"><?= htmlspecialchars($color['name']) ?></span>
                                                            </td>
                                                            <td class="td-code">
                                                                <button type="button" class="copy-badge" data-copy="<?= htmlspecialchars($hex) ?>" title="Clic para copiar HEX">
                                                                    <code><?= htmlspecialchars($hex) ?></code>
                                                                    <svg class="copy-btn-icon" width="13" height="13" aria-hidden="true"><use href="#icon-copy"></use></svg>
                                                                </button>
                                                            </td>
                                                            <td class="td-code">
                                                                <button type="button" class="copy-badge" data-copy="<?= htmlspecialchars($rgb) ?>" title="Clic para copiar RGB">
                                                                    <code><?= htmlspecialchars($rgb) ?></code>
                                                                    <svg class="copy-btn-icon" width="13" height="13" aria-hidden="true"><use href="#icon-copy"></use></svg>
                                                                </button>
                                                            </td>
                                                            <td class="td-code">
                                                                <button type="button" class="copy-badge" data-copy="<?= htmlspecialchars($hsl) ?>" title="Clic para copiar HSL">
                                                                    <code><?= htmlspecialchars($hsl) ?></code>
                                                                    <svg class="copy-btn-icon" width="13" height="13" aria-hidden="true"><use href="#icon-copy"></use></svg>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </details>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </details>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- Modal de Exportación de Paleta -->
    <div id="exportModal" class="export-modal-backdrop" aria-hidden="true">
        <div class="interactive-preview-card export-modal-card">
            <div class="card-glass-header">
                <div class="window-dots">
                    <span class="dot dot-red"></span>
                    <span class="dot dot-yellow"></span>
                    <span class="dot dot-green"></span>
                </div>
                <span class="window-title" id="exportModalTitle">export-palette.css</span>
                <button type="button" id="btnCloseModal" class="modal-close-btn" aria-label="Cerrar modal">
                    <svg width="14" height="14"><use href="#icon-close"></use></svg>
                </button>
            </div>

            <div class="card-module-body export-modal-body">
                <div class="module-title-row">
                    <h3 id="exportPaletteHeading" style="font-size:1.15rem;margin:0;">Exportar Paleta</h3>
                    <span class="module-hint" id="exportColorCount">0 colores</span>
                </div>

                <!-- Tabs de formato: CSS Variables / Tailwind / JSON / SCSS -->
                <div class="export-format-tabs" id="exportFormatTabs">
                    <button type="button" class="export-tab-btn active" data-format="css">Variables CSS</button>
                    <button type="button" class="export-tab-btn" data-format="tailwind">Tailwind CSS</button>
                    <button type="button" class="export-tab-btn" data-format="json">JSON</button>
                    <button type="button" class="export-tab-btn" data-format="scss">SCSS Map</button>
                </div>

                <!-- Código resultante -->
                <div class="card-code-snippet" style="margin-top: 12px; border-radius: var(--radius-md); flex-direction: column;">
                    <div class="box-model-output-header" style="width: 100%; display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                        <span class="code-label" style="color: #94a3b8; font-size: 0.8rem; font-weight: 600;" id="exportCodeLabel">Variables nativas :root</span>
                        <button type="button" class="copy-snippet-btn" id="btnCopyExportCode">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                            <span id="btnCopyExportText">Copiar</span>
                        </button>
                    </div>
                    <textarea id="exportCodeTextarea" readonly style="width: 100%; height: 210px; background: transparent; border: none; color: #38bdf8; font-family: 'Consolas', 'Courier New', monospace; font-size: 0.82rem; resize: none; outline: none; line-height: 1.5;"></textarea>
                </div>
            </div>
        </div>
    </div>

<?php 
$extraScripts = '<script src="js/toast.js"></script><script src="js/palettes.js"></script>';
include 'includes/footer.php'; 
?>
