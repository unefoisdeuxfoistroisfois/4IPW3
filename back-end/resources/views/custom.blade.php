<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Formulaire Euronews</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/lib/external.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        /* Force la police sur tous les éléments */
        * {
            font-family: {{ session('font_family', 'Arial') }} !important;
        }
        
        /* Force les styles sur le body */
        body {
            background-color: {{ session('background_color', 'white') }} !important;
            word-spacing: {{ session('word_spacing', 0) }}px !important;
            border: {{ session('border_style') == 'thin' ? '1px' : (session('border_style') == 'thick' ? '5px' : '0px') }} solid {{ session('border_color', '#000000') }} !important;
        }
    </style>
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
            {{-- STATS CLICS avec SUPERGLOBAL --}}
            @php
                if (!session_id()) session_start();
                $totalClicks = $_SESSION['total_clicks'] ?? 0;
            @endphp
            <div style="color: #666; font-size: 0.9rem;">
                Clics totaux : {{ $totalClicks }}
            </div>
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
    <!--
    <body style="
        background-color: {{ session('background_color', 'white') }};
        word-spacing: {{ session('word_spacing', 0) }}px;
    ">
    -->
    <body style="
        background-color: {{ session('background_color', 'white') }};
        font-family: {{ session('font_family', 'Arial') }};
        word-spacing: {{ session('word_spacing', 0) }}px;
        border: {{ session('border_style') == 'thin' ? '1px' : (session('border_style') == 'thick' ? '5px' : '0px') }} solid {{ session('border_color', '#000000') }};
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

            <label for="font-family">Famille de police :</label>
            <select id="font-family" name="font_family">
                <option value="Arial" {{ session('font_family') == 'Arial' ? 'selected' : '' }}>Arial</option>
                <option value="Times" {{ session('font_family') == 'Times' ? 'selected' : '' }}>Times</option>
                <option value="Consolas" {{ session('font_family') == 'Consolas' ? 'selected' : '' }}>Consolas</option>
            </select>

            <label for="border-style">Style des bordures :</label>
            <select id="border-style" name="border_style">
                <option value="none" {{ session('border_style') == 'none' ? 'selected' : '' }}>None</option>
                <option value="thin" {{ session('border_style') == 'thin' ? 'selected' : '' }}>Thin</option>
                <option value="thick" {{ session('border_style') == 'thick' ? 'selected' : '' }}>Thick</option>
            </select>

            <label for="border-color">Couleur des bordures :</label>
            <input type="color" id="border-color" name="border_color" value="{{ session('border_color', '#000000') }}">

            <label for="word-spacing">Espacement entre mots :</label>
            <input type="number" id="word-spacing" name="word_spacing" value="{{ session('word_spacing', 0) }}" min="0" max="20"> px

            <button type="submit" style="padding: 8px 20px; background: rgb(197, 197, 0); border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">
                Appliquer
            </button>
        </form>
    </section>

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
