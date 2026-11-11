// js/fonts.js
// Lógica del Buscador de Fuentes (Chips + Preview Triple)
        // ==========================================
        const searchMessage = document.getElementById('searchMessage');
        const fontLinkCode = document.getElementById('fontLinkCode');
        const fontImportCode = document.getElementById('fontImportCode');
        const fontCssRuleCode = document.getElementById('fontCssRuleCode');
        const dynamicFontLoader = document.getElementById('dynamicFontLoader');

        const previewNormal = document.getElementById('previewNormal');
        const previewBold   = document.getElementById('previewBold');
        const previewItalic = document.getElementById('previewItalic');
        const fontPreviewCustomText = document.getElementById('fontPreviewCustomText');
        const fontChipsGrid = document.getElementById('fontChipsGrid');

        // Aplica el texto del input a los 3 previews
        function applyPreviewText(text) {
            const t = text.trim() || 'Hola Mundo';
            previewNormal.textContent = t;
            previewBold.textContent   = t;
            previewItalic.textContent = t;
        }

        fontPreviewCustomText.addEventListener('input', () => {
            applyPreviewText(fontPreviewCustomText.value);
        });

        // Aplica la familia de fuente a los 3 previews
        function applyFontFamily(fontFamily) {
            previewNormal.style.fontFamily = fontFamily;
            previewBold.style.fontFamily   = fontFamily;
            previewItalic.style.fontFamily = fontFamily;
        }

        function fetchFontData(fontName) {
            searchMessage.style.display = 'none';
            fetch(`backend/get_font.php?name=${encodeURIComponent(fontName)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        searchMessage.textContent = data.error;
                        searchMessage.style.display = 'block';
                    } else {
                        fontLinkCode.value    = data.link_code;
                        fontImportCode.value  = data.import_code;
                        fontCssRuleCode.value = data.css_rule;

                        // Cargar la fuente dinámicamente
                        dynamicFontLoader.textContent = data.import_code;

                        // Extraer font-family del css_rule y aplicar a los 3 previews
                        const match = data.css_rule.match(/font-family:\s*([^;]+)/i);
                        const family = match ? match[1].trim() : `'${fontName}', sans-serif`;
                        applyFontFamily(family);
                        applyPreviewText(fontPreviewCustomText.value);
                    }
                })
                .catch(() => {
                    searchMessage.textContent = "No se pudo cargar la fuente. Revisa que el servidor local esté encendido.";
                    searchMessage.style.display = 'block';
                });
        }

        // Cargar chips de fuentes desde backend
        fetch('backend/get_all_fonts.php')
            .then(res => res.json())
            .then(fonts => {
                fontChipsGrid.innerHTML = '';
                if (!fonts || fonts.error || fonts.length === 0) {
                    fontChipsGrid.innerHTML = '<span class="font-chips-error">No hay fuentes disponibles todavía.</span>';
                    return;
                }
                fonts.forEach((font, index) => {
                    const btn = document.createElement('button');
                    btn.className = 'font-chip-btn' + (index === 0 ? ' active' : '');
                    btn.setAttribute('aria-pressed', index === 0 ? 'true' : 'false');
                    btn.textContent = font;
                    btn.type = 'button';
                    btn.addEventListener('click', () => {
                        document.querySelectorAll('.font-chip-btn').forEach(b => {
                            b.classList.remove('active');
                            b.setAttribute('aria-pressed', 'false');
                        });
                        btn.classList.add('active');
                        btn.setAttribute('aria-pressed', 'true');
                        fetchFontData(font);
                    });
                    fontChipsGrid.appendChild(btn);
                });
                // Cargar la primera fuente por defecto
                fetchFontData(fonts[0]);
            })
            .catch(() => {
                fontChipsGrid.innerHTML = '<span class="font-chips-error">No se pudieron cargar las fuentes. Revisa que el servidor local esté encendido.</span>';
            });

        // ==========================================
