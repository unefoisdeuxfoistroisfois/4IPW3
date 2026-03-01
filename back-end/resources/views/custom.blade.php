<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Formulaire Euronews</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/lib/external.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header class="header-hover-area">
        <div class="header-top">
            <div class="language-selector">
                <label for="language">Langue:</label>
                <select id="language" name="language">
                    <option value="fr">Français</option>
                    <option value="en">English</option>
                    <option value="es">Español</option>
                    <option value="de">Deutsch</option>
                    <option value="it">Italiano</option>
                </select>
            </div>
            <div class="logo">euronews.</div>
        </div>
    </header>

    <nav>
        <a href="{{ url('/') }}">Accueil</a>
        <a href="#">Monde</a>
        <a href="#">Europe</a>
        <a href="#">Business</a>
        <a href="#">Sport</a>
        <a href="#">Culture</a>
        <a href="{{ url('/custom') }}">Formulaire</a>
        <a href="{{ url('/favoris') }}">Favoris</a>
        <a href="{{ url('/apropos') }}">À propos</a>
    </nav>

    <nav>
        <a href="{{ url('/article') }}">A LA UNE</a>
        <a href="https://fr.euronews.com/2025/04/08/le-president-zelensky-confirme-que-les-troupes-ukrainiennes-avancent-dans-loblast-de-belgo">UKRAINE</a>
        <a href="https://fr.euronews.com/business/2025/04/08/von-der-leyen-propose-a-trump-un-accord-sur-les-droits-de-douane-zero-pour-zero-pour-tous-">TRUMP</a>
        <a href="https://fr.euronews.com/next/2025/04/08/tiktok-a-apporte-des-modifications-avant-la-repetition-des-elections-roumaines-selon-bruxe">TIKTOK</a>
        <a href="https://fr.euronews.com/2025/04/08/lotan-ne-peut-pas-etre-naive-face-au-renforcement-militaire-de-la-chine-alerte-mark-rutte">OTAN</a>
    </nav>

    <!--
    Ça applique les options sauvegardées en SESSION directement sur la page
    Ça lit ce que l'utilisateur a choisi (stocké en SESSION) et l'applique visuellemen 
    -->
    <body style="
        background-color: {{ session('background_color', 'white') }};
        word-spacing: {{ session('word_spacing', 0) }}px;
    ">

    <section class="top-menu">
        <form action="{{ route('save-options') }}" method="POST">
            @csrf

            <label for="background-color">Couleur du fond :</label>
            <select id="background-color" name="background_color">
                <option value="white" {{ session('background_color') == 'white' ? 'selected' : '' }}>Blanc</option>
                <option value="#f0f0f0" {{ session('background_color') == '#f0f0f0' ? 'selected' : '' }}>Gris</option>
                <option value="#ffeb3b" {{ session('background_color') == '#ffeb3b' ? 'selected' : '' }}>Jaune</option>
                <option value="#ff7043" {{ session('background_color') == '#ff7043' ? 'selected' : '' }}>Coral</option>
            </select>

            <label for="border-color">Couleur des bordures :</label>
            <input type="color" id="border-color" name="border_color" value="{{ session('border_color', '#000000') }}">

            <label for="border-style">Style des bordures :</label>
            <select id="border-style" name="border_style">
                <option value="solid" {{ session('border_style') == 'solid' ? 'selected' : '' }}>Plein</option>
                <option value="dotted" {{ session('border_style') == 'dotted' ? 'selected' : '' }}>Pointillé</option>
                <option value="dashed" {{ session('border_style') == 'dashed' ? 'selected' : '' }}>Tiret</option>
                <option value="double" {{ session('border_style') == 'double' ? 'selected' : '' }}>Double</option>
            </select>

            <label for="word-break">Césure dans les mots :</label>
            <select id="word-break" name="word_break">
                <option value="normal" {{ session('word_break') == 'normal' ? 'selected' : '' }}>Normal</option>
                <option value="break-word" {{ session('word_break') == 'break-word' ? 'selected' : '' }}>Césure automatique</option>
            </select>

            <label for="word-spacing">Espacement entre mots :</label>
            <input type="number" id="word-spacing" name="word_spacing" value="{{ session('word_spacing', 0) }}" min="0" max="20"> px

            <button type="submit" style="padding: 8px 20px; background: rgb(197, 197, 0); border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">
                Appliquer
            </button>
        </form>
    </section>

    <aside class="side-menu">
        <form>
            <label for="font-family">Famille de police :</label>
            <select id="font-family" name="font-family">
                <option value="Bodoni MT">Bodoni MT</option>
                <option value="Courier New">Courier New</option>
                <option value="Arial">Arial</option>
            </select>

            <label for="font-style">Style de police :</label>
            <select id="font-style" name="font-style">
                <option value="normal">Normal</option>
                <option value="bold">Gras</option>
                <option value="italic">Italique</option>
            </select>

            <label for="background-color">Couleur du fond :</label>
            <input type="color" id="background-color" name="background-color">

            <label for="text-align">Alignement des paragraphes :</label>
            <select id="text-align" name="text-align">
                <option value="left">Gauche</option>
                <option value="center">Centré</option>
                <option value="right">Droite</option>
                <option value="justify">Justifié</option>
            </select>
        </form>
    </aside>

    <main class="formulaire-recherche">
        <h1 class="form-title">Faire votre recherche :</h1>
        <form class="search-form" action="{{ route('search') }}" method="get">

            <label for="keyword">Rechercher un article :</label>
            <input type="text" id="keyword" name="keyword" placeholder="Entrez des mots-clés..." required>

            <label for="date">Date :</label>
            <input type="date" id="date" name="date">

            <label for="categorie">Catégorie :</label>
            <select id="categorie" name="categorie">
                <option value="main-news">Main News</option>
                <option value="belgique">Belgique</option>
                <option value="marche">Marché</option>
                <option value="tech">Tech</option>
                <option value="securite">Sécurité</option>
            </select>

            <label for="nombre-articles">Nombre d'articles à afficher :</label>
            <input type="number" id="nombre-articles" name="nombre-articles" min="1" max="50">

            <label for="trier">Trier par :</label>
            <select id="trier" name="trier">
                <option value="ancien-recents">Du plus ancien au plus récent</option>
                <option value="recents-anciens">Du plus récent au plus ancien</option>
            </select>

            <button type="submit" class="search-button">Rechercher</button>
        </form>
    </main>

  <footer>
    <div class="footer-top">
      <div class="footer-logo">euronews.</div>
      <div class="footer-socials">
        <a href="https://www.facebook.com/euronews" target="_blank">Facebook</a>
        <a href="https://twitter.com/euronews" target="_blank">Twitter</a>
        <a href="https://www.instagram.com/euronews.tv/" target="_blank">Instagram</a>
        <a href="https://www.youtube.com/euronews" target="_blank">YouTube</a>
      </div>
    </div>

    <div class="footer-links">
        <section class="footer-column">
            <h4>Thèmes</h4>
            <a href="#">Monde</a>
            <a href="#">Europe</a>
            <a href="#">Business</a>
            <a href="#">Sport</a>
            <a href="#">Culture</a>
        </section>
        <section class="footer-column">
            <h4>Services</h4>
            <a href="#">Applications</a>
            <a href="#">Newsletter</a>
            <a href="#">Publicité</a>
            <a href="#">Contacts</a>
        </section>
        <section class="footer-column">
            <h4>Plus</h4>
            <a href="#">À propos</a>
            <a href="#">Politique de confidentialité</a>
            <a href="#">Mentions légales</a>
        </section>
    </div>

    <div class="footer-bottom">
      © 2025 euronews. Tous droits réservés | Projet créé le 08/04/2025 | Bachelier Informatique
      Contact: 24-00523.amm.abd@isfce.be | ISFCE 4IWPB
    </div>
  </footer>
</body>
</html>
