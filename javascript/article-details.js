// article-details.js - Affichage des détails d'un article au clic
// Version propre : le CSS est dans popup.css

(function() {
    // Fonction pour créer la popup (fenêtre modale)
    function createPopup() {
        // Vérifie si la popup existe déjà
        if (document.getElementById('article-popup')) {
            return;
        }

        // Crée le HTML de la popup
        const popupHTML = `
            <div id="article-popup" style="display: none;">
                <div class="popup-overlay"></div>
                <div class="popup-content">
                    <button class="popup-close">&times;</button>
                    <div class="popup-body">
                        <img id="popup-image" src="" alt="">
                        <h2 id="popup-title"></h2>
                        <p id="popup-text"></p>
                        <a id="popup-link" href="#" class="popup-read-more">Lire l'article complet →</a>
                    </div>
                </div>
            </div>
        `;

        // Ajoute la popup au body
        document.body.insertAdjacentHTML('beforeend', popupHTML);
    }

    // Fonction pour afficher la popup avec les infos de l'article
    function showPopup(title, text, imageUrl, linkUrl) {
        const popup = document.getElementById('article-popup');
        
        // Remplit les informations
        document.getElementById('popup-title').textContent = title;
        document.getElementById('popup-text').textContent = text;
        document.getElementById('popup-image').src = imageUrl;
        document.getElementById('popup-link').href = linkUrl;

        // Affiche la popup
        popup.style.display = 'block';
        document.body.style.overflow = 'hidden'; // Empêche le scroll
    }

    // Fonction pour fermer la popup
    function closePopup() {
        const popup = document.getElementById('article-popup');
        popup.style.display = 'none';
        document.body.style.overflow = 'auto'; // Réactive le scroll
    }

    // Quand la page est chargée
    window.addEventListener('load', function() {
        // Crée la popup
        createPopup();

        // Ajoute l'événement de clic sur TOUS les articles
        const articles = document.querySelectorAll('.main-article, .side-articles article, .discovery article, .more-news article');
        
        articles.forEach(function(article) {
            // Trouve le lien <a> dans l'article
            const link = article.querySelector('a');
            
            if (link) {
                link.addEventListener('click', function(event) {
                    // Empêche le lien de naviguer normalement
                    event.preventDefault();

                    // Récupère les informations de l'article
                    const title = article.querySelector('h2, h3, h4')?.textContent || 'Article';
                    const text = article.querySelector('p')?.textContent || 'Cliquez pour lire l\'article complet.';
                    const image = article.querySelector('img')?.src || '';
                    const linkUrl = link.href;

                    // Affiche la popup
                    showPopup(title, text, image, linkUrl);
                });
            }
        });

        // Ferme la popup quand on clique sur le X
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('popup-close')) {
                closePopup();
            }
        });

        // Ferme la popup quand on clique sur l'overlay (fond noir)
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('popup-overlay')) {
                closePopup();
            }
        });

        // Ferme la popup avec la touche Échap
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closePopup();
            }
        });

        console.log('✅ Système de popup articles activé !');
    });
})();
