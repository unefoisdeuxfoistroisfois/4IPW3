//Compteur de clics sur les articles

// Fonction pour mettre à jour l'affichage des statistiques
function updateStatsDisplay() {
    const statsContainer = document.getElementById("click-stats");
    if (!statsContainer) return;

    // Récupère les stats depuis le localStorage
    const stats = JSON.parse(localStorage.getItem("clickStats")) || {};

    // Crée le texte à afficher
    if (Object.keys(stats).length === 0) {
        statsContainer.textContent = "Aucun clic enregistré pour le moment.";
        return;
    }

    // Format d'affichage :
    statsContainer.innerHTML = Object.entries(stats)
        .map(([title, count]) => `- ${title}: ${count}`)
        .join("<br>");
}

// Fonction pour enregistrer les clics uniquement sur les articles
function setupClickTracking() {
    const articleLinks = document.querySelectorAll(
        ".main-article a, .side-articles a, .discovery a, .more-news a"
    );

    articleLinks.forEach(link => {
        link.addEventListener("click", () => {
            const linkText = link.textContent.trim();
            if (!linkText) return;

            // Récupère les stats actuelles
            let stats = JSON.parse(localStorage.getItem("clickStats")) || {};

            // Incrémente le compteur du lien
            stats[linkText] = (stats[linkText] || 0) + 1;

            // Sauvegarde dans le localStorage
            localStorage.setItem("clickStats", JSON.stringify(stats));

            // Met à jour l'affichage
            updateStatsDisplay();
        });
    });
}

// Exécute les fonctions une fois que la page est chargée
document.addEventListener("DOMContentLoaded", () => {
    setupClickTracking();
    updateStatsDisplay();
});
