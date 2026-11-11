// js/snippets.js - Filtrado y Copiado de Snippets
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('snippetSearchInput');
    const catButtons = document.querySelectorAll('.snippet-cat-btn');
    const cards = document.querySelectorAll('.snippet-card');
    const noMsg = document.getElementById('noSnippetsMessage');

    let activeCat = 'all';

    function filterSnippets() {
        if (!searchInput) return;
        const query = searchInput.value.toLowerCase().trim();
        let visibleCount = 0;

        cards.forEach(card => {
            const cat = card.getAttribute('data-cat');
            const title = card.getAttribute('data-title') || '';
            const text = card.textContent.toLowerCase();

            const matchesCat = (activeCat === 'all' || cat === activeCat);
            const matchesQuery = (!query || title.includes(query) || text.includes(query));

            if (matchesCat && matchesQuery) {
                card.style.display = 'flex';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        if (noMsg) {
            noMsg.style.display = (visibleCount === 0) ? 'block' : 'none';
        }
    }

    if (catButtons) {
        catButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                catButtons.forEach(b => {
                    b.classList.remove('active');
                    b.setAttribute('aria-pressed', 'false');
                });
                btn.classList.add('active');
                btn.setAttribute('aria-pressed', 'true');
                activeCat = btn.getAttribute('data-cat');
                filterSnippets();
            });
        });
    }

    if (searchInput) {
        searchInput.addEventListener('input', filterSnippets);
    }

    // Copiar snippets al portapapeles
    document.querySelectorAll('.snippet-copy-btn').forEach(btn => {
        bindCopyButton(btn, () => btn.getAttribute('data-code'), 'Snippet copiado');
    });
});
