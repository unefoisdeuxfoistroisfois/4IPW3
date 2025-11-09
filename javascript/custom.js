(function () {
    // récupère l'élément select en testant plusieurs ids possibles
    function getSelectByIds(ids) {
        for (const id of ids) {
            const el = document.getElementById(id);
            if (el) return el;
        }
        return null;
    }

    // mapping simple pour les noms de police -> chaîne CSS sûre (ajoute fallback)
    const FONT_MAP = {
        "Arial": "Arial, sans-serif",
        "Times New Roman": "'Times New Roman', serif",
        "Times": "'Times New Roman', serif",
        "Consolas": "Consolas, monospace",
        "Bodoni MT": "'Bodoni MT', serif",
        "Courier New": "'Courier New', monospace"
    };

    // mapping pour bordure
    const BORDER_MAP = {
        "none": "none",
        "thin": "1px solid black",
        "thick": "3px solid black",
        "thin_keyword": "thin solid black" // au cas où
    };

    // trouver les selects (supporte id="fontSelect" ou id="font-family")
    const fontSelect = getSelectByIds(["fontSelect", "font-family", "font-family-select"]);
    const borderSelect = getSelectByIds(["borderSelect", "border-width", "border-width-select"]);

    // applique les préférences sur le body
    function applyPreferences(fontValue, borderValue) {
        if (fontValue) {
            const cssFont = FONT_MAP[fontValue] || fontValue;
            document.body.style.fontFamily = cssFont;
            console.log("Applied font:", cssFont);
        }
        if (borderValue) {
            const cssBorder = BORDER_MAP[borderValue] || (borderValue === "none" ? "none" : `${borderValue} solid black`);
            document.body.style.border = cssBorder;
            console.log("Applied border:", cssBorder);
        }
    }

    // charge depuis localStorage et applique
    function loadAndApply() {
        const savedFont = localStorage.getItem("fontFamily");
        const savedBorder = localStorage.getItem("borderStyle");
        if (savedFont) applyPreferences(savedFont, null);
        if (savedBorder) applyPreferences(null, savedBorder);

        // si les selects existent, refléter les valeurs sauvegardées dedans
        if (fontSelect && savedFont) {
            try { fontSelect.value = savedFont; } catch(e) { /* ignore */ }
        }
        if (borderSelect && savedBorder) {
            try { borderSelect.value = savedBorder; } catch(e) { /* ignore */ }
        }
    }

    // écouteurs pour changements (s'applique quel que soit l'id présent)
    function attachListeners() {
        if (fontSelect) {
            fontSelect.addEventListener("change", (ev) => {
                const v = ev.target.value;
                localStorage.setItem("fontFamily", v);
                applyPreferences(v, null);
            });
        }

        if (borderSelect) {
            borderSelect.addEventListener("change", (ev) => {
                const v = ev.target.value;
                localStorage.setItem("borderStyle", v);
                applyPreferences(null, v);
            });
        }
    }

    // run on load
    window.addEventListener("load", () => {
        loadAndApply();
        attachListeners();

        // debug: montrer quels selects on a trouvé
        console.log("custom.js loaded. fontSelect:", !!fontSelect, "borderSelect:", !!borderSelect);
    });
})();
