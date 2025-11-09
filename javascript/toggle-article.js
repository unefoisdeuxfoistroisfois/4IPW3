document.addEventListener("DOMContentLoaded", () => {
    const toggleButton = document.getElementById("toggle-main-articles");
    const mainArticles = document.querySelectorAll(".main-article");

    if (!toggleButton || !mainArticles.length) return;

    let titlesOnly = false;

    toggleButton.addEventListener("click", () => {
        titlesOnly = !titlesOnly;

        mainArticles.forEach(article => {
            const img = article.querySelector("img");
            const text = article.querySelector("p");

            if (titlesOnly) {
                if (img) img.style.display = "none";
                if (text) text.style.display = "none";
            } else {
                if (img) img.style.display = "block";
                if (text) text.style.display = "block";
            }
        });

        toggleButton.textContent = titlesOnly
            ? "Afficher images et résumés"
            : "Afficher seulement les titres";
    });
});