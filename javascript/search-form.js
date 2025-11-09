// search-form.js - Formulaire de recherche avec widgets interactifs

(function() {
    
    // ========================================
    // DONNÉES SIMULÉES (articles exemples)
    // ========================================
    const articlesData = [
        {
            id: 1,
            title: "Clap de fin pour les hypermarchés Cora en Belgique",
            text: "C'est officiel: après Makro, c'est l'enseigne Cora qui disparaîtra du paysage belge début 2026. Un accord a été trouvé pour la reprise des murs.",
            category: "marche",
            readtime: 5,
            date: "2025-04-08"
        },
        {
            id: 2,
            title: "Zelensky confirme l'avancée ukrainienne",
            text: "Le président ukrainien confirme que les troupes avancent dans l'oblast russe de Belgorod.",
            category: "monde",
            readtime: 3,
            date: "2025-04-08"
        },
        {
            id: 3,
            title: "La Belgique va mettre en place le service militaire volontaire",
            text: "Après les Pays-Bas, la Belgique s'engage dans cette voie pour renforcer ses capacités de défense.",
            category: "belgique",
            readtime: 4,
            date: "2025-04-09"
        },
        {
            id: 4,
            title: "Trump reste ferme sur les droits de douane",
            text: "Malgré le lundi noir sur les marchés, le président américain n'envisage pas de suspendre ses droits de douane.",
            category: "business",
            readtime: 6,
            date: "2025-04-08"
        },
        {
            id: 5,
            title: "TikTok modifie ses règles avant les élections roumaines",
            text: "La plateforme a apporté des modifications suite aux pressions de Bruxelles concernant l'intégrité électorale.",
            category: "tech",
            readtime: 4,
            date: "2025-04-08"
        },
        {
            id: 6,
            title: "L'OTAN alerte sur le renforcement militaire chinois",
            text: "Mark Rutte prévient que l'Alliance ne peut pas être naïve face à la montée en puissance de la Chine.",
            category: "securite",
            readtime: 7,
            date: "2025-04-08"
        },
        {
            id: 7,
            title: "Bourses asiatiques en hausse",
            text: "Les investisseurs reprennent le poil de la bête après la correction de lundi dernier.",
            category: "business",
            readtime: 3,
            date: "2025-04-09"
        },
        {
            id: 8,
            title: "L'Allemagne est à nouveau sur la bonne voie",
            text: "Friedrich Merz déclare que le pays retrouve sa compétitivité grâce aux réformes de sa coalition.",
            category: "europe",
            readtime: 5,
            date: "2025-04-09"
        }
    ];

    // ========================================
    // INITIALISATION
    // ========================================
    window.addEventListener('load', function() {
        initializeSlider();
        initializeFormHandlers();
        console.log('✅ Formulaire de recherche activé !');
    });

    // ========================================
    // SLIDER DOUBLE (READTIME)
    // ========================================
    function initializeSlider() {
        const minSlider = document.getElementById('readtime-min');
        const maxSlider = document.getElementById('readtime-max');
        const minValue = document.getElementById('min-value');
        const maxValue = document.getElementById('max-value');
        const sliderRange = document.querySelector('.slider-range');

        if (!minSlider || !maxSlider) return;

        // Fonction pour mettre à jour l'affichage
        function updateSlider() {
            let min = parseInt(minSlider.value);
            let max = parseInt(maxSlider.value);

            // Empêcher le chevauchement
            if (min > max) {
                [min, max] = [max, min];
                minSlider.value = min;
                maxSlider.value = max;
            }

            // Mettre à jour les valeurs affichées
            minValue.textContent = min + ' min';
            maxValue.textContent = max + ' min';

            // Mettre à jour la barre de progression
            const percent1 = (min / 30) * 100;
            const percent2 = (max / 30) * 100;
            sliderRange.style.left = percent1 + '%';
            sliderRange.style.right = (100 - percent2) + '%';
        }

        // Événements sur les sliders
        minSlider.addEventListener('input', updateSlider);
        maxSlider.addEventListener('input', updateSlider);

        // Initialisation
        updateSlider();
    }

    // ========================================
    // GESTION DU FORMULAIRE
    // ========================================
    function initializeFormHandlers() {
        const form = document.querySelector('.search-form');
        
        if (!form) return;

        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Empêche le rechargement de la page
            performSearch();
        });
    }

    // ========================================
    // FONCTION DE RECHERCHE
    // ========================================
    function performSearch() {
        // Récupérer les valeurs du formulaire
        const keyword = document.getElementById('corps-motscles')?.value.toLowerCase() || '';
        
        // Catégorie (bouton radio sélectionné)
        const categoryRadios = document.getElementsByName('categorie');
        let selectedCategory = 'all';
        for (const radio of categoryRadios) {
            if (radio.checked) {
                selectedCategory = radio.value;
                break;
            }
        }

        // Temps de lecture
        const minReadtime = parseInt(document.getElementById('readtime-min')?.value) || 0;
        const maxReadtime = parseInt(document.getElementById('readtime-max')?.value) || 30;

        // Filtrer les articles
        const results = articlesData.filter(article => {
            // Filtre par mot-clé
            const matchKeyword = keyword === '' || 
                                  article.title.toLowerCase().includes(keyword) || 
                                  article.text.toLowerCase().includes(keyword);

            // Filtre par catégorie
            const matchCategory = selectedCategory === 'all' || article.category === selectedCategory;

            // Filtre par temps de lecture
            const matchReadtime = article.readtime >= minReadtime && article.readtime <= maxReadtime;

            return matchKeyword && matchCategory && matchReadtime;
        });

        // Afficher les résultats
        displayResults(results);
    }

    // ========================================
    // AFFICHAGE DES RÉSULTATS
    // ========================================
    function displayResults(results) {
        // Créer ou trouver le conteneur des résultats
        let resultsContainer = document.getElementById('search-results-container');
        
        if (!resultsContainer) {
            resultsContainer = document.createElement('div');
            resultsContainer.id = 'search-results-container';
            resultsContainer.className = 'search-results';
            
            const form = document.querySelector('.formulaire-recherche');
            form.appendChild(resultsContainer);
        }

        // Vider les résultats précédents
        resultsContainer.innerHTML = '';

        // Titre des résultats
        const title = document.createElement('h2');
        title.textContent = `${results.length} résultat${results.length > 1 ? 's' : ''} trouvé${results.length > 1 ? 's' : ''}`;
        resultsContainer.appendChild(title);

        // Si aucun résultat
        if (results.length === 0) {
            const noResults = document.createElement('div');
            noResults.className = 'no-results';
            noResults.innerHTML = `
                <div class="no-results-icon">🔍</div>
                <p>Aucun article ne correspond à vos critères de recherche.</p>
                <p>Essayez de modifier vos filtres.</p>
            `;
            resultsContainer.appendChild(noResults);
            return;
        }

        // Afficher chaque résultat
        results.forEach(article => {
            const resultItem = document.createElement('div');
            resultItem.className = 'result-item';

            // Crée un lien vers l'article correspondant
            let articleLink = '#';
            if (article.id === 1) articleLink = 'article.html'; // Ton article local
            else if (article.id === 2) articleLink = 'https://fr.euronews.com/2025/04/08/le-president-zelensky-confirme-que-les-troupes-ukrainiennes-avancent-dans-loblast-de-belgo';
            else if (article.id === 3) articleLink = 'https://fr.euronews.com/my-europe/2025/04/08/apres-les-pays-bas-la-belgique-va-mettre-en-place-le-service-militaire-volontaire';
            else if (article.id === 4) articleLink = 'https://fr.euronews.com/2025/04/08/lundi-noir-sur-les-marches-mais-trump-nenvisage-pas-de-suspendre-ses-droits-de-douane';
            else if (article.id === 5) articleLink = 'https://fr.euronews.com/next/2025/04/08/tiktok-a-apporte-des-modifications-avant-la-repetition-des-elections-roumaines-selon-bruxe';
            else if (article.id === 6) articleLink = 'https://fr.euronews.com/2025/04/08/lotan-ne-peut-pas-etre-naive-face-au-renforcement-militaire-de-la-chine-alerte-mark-rutte';
            else if (article.id === 7) articleLink = 'https://fr.euronews.com/business/2025/04/08/les-actions-asiatiques-et-les-contrats-a-terme-americains-progressent-les-investisseurs-re';
            else if (article.id === 8) articleLink = 'https://fr.euronews.com/my-europe/2025/04/09/lallemagne-est-a-nouveau-sur-la-bonne-voie-declare-friedrich-merz-alors-quune-nouvelle-coa';

            resultItem.innerHTML = `
                <a href="${articleLink}" target="_blank" class="result-link">
                    <h3>${article.title}</h3>
                </a>
                <p>${article.text}</p>
                 <div class="result-meta">
                    <span class="category-badge">${getCategoryName(article.category)}</span>
                    <span class="readtime-badge">📖 ${article.readtime} min de lecture</span>
                 </div>
            `;

            resultsContainer.appendChild(resultItem);
        });

        // Scroll vers les résultats
        resultsContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    // ========================================
    // UTILITAIRES
    // ========================================
    function getCategoryName(category) {
        const categories = {
            'all': 'Toutes',
            'monde': 'Monde',
            'europe': 'Europe',
            'belgique': 'Belgique',
            'marche': 'Marché',
            'business': 'Business',
            'tech': 'Tech',
            'securite': 'Sécurité'
        };
        return categories[category] || category;
    }

})();
