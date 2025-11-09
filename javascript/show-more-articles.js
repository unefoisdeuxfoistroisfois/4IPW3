document.addEventListener("DOMContentLoaded", () => {
    const sideArticles = document.querySelectorAll(".side-articles article");
    const showMoreBtn = document.getElementById("show-more-side");

    if (!showMoreBtn || sideArticles.length <= 2) return;

    // Cacher tous sauf les 2 premiers
    sideArticles.forEach((article, index) => {
        if (index >= 2) article.style.display = "none";
    });

    showMoreBtn.addEventListener("click", () => {
        const hidden = [...sideArticles].filter(a => a.style.display === "none");

        if (hidden.length) {
            hidden.forEach(a => (a.style.display = "flex"));
            showMoreBtn.textContent = "Voir moins";
        } else {
            sideArticles.forEach((a, i) => {
                if (i >= 2) a.style.display = "none";
            });
            showMoreBtn.textContent = "Voir plus d’articles";
        }
    });
});