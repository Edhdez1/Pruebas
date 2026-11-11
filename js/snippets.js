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
                catButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
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
        btn.addEventListener('click', () => {
            const code = btn.getAttribute('data-code');
            if (!code) return;

            navigator.clipboard.writeText(code).then(() => {
                const originalHtml = btn.innerHTML;
                btn.innerHTML = `<svg width="14" height="14"><use href="#icon-check"></use></svg><span>¡Copiado!</span>`;
                btn.classList.add('copied');

                if (typeof showToast === 'function') {
                    showToast('¡Snippet copiado al portapapeles!');
                }

                setTimeout(() => {
                    btn.innerHTML = originalHtml;
                    btn.classList.remove('copied');
                }, 2000);
            }).catch(err => {
                console.error('Error al copiar snippet:', err);
            });
        });
    });
});
