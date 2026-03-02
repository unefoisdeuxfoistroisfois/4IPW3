<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des articles</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/lib/external.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            font-family: {{ session('font_family', 'Arial') }} !important;
        }
        
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

    <body style="
        background-color: {{ session('background_color', 'white') }};
        font-family: {{ session('font_family', 'Arial') }};
        word-spacing: {{ session('word_spacing', 0) }}px;
        border: {{ session('border_style') == 'thin' ? '1px' : (session('border_style') == 'thick' ? '5px' : '0px') }} solid {{ session('border_color', '#000000') }};
    ">

    <main style="max-width: 900px; margin: 20px auto; padding: 0 15px;">
    <h2 class="section-title">Tous les articles (DataBase: press_2025_v04)</h2>


    {{--
    $articles vient du controller.
    On prends les articles depuis la base de données que le prof a fourni.
    --}}
    @foreach($articles as $a)
        <article style="border-bottom:1px solid #ddd; padding:15px 0;">

            {{--
            On affiche le titre de l'article.
            Quand on clique dessus, on va vers /article/{id}
            --}}
            <h3>
                <a href="{{ route('article', ['id' => $a->id_art]) }}">
                    {{ $a->title_art }}
                </a>
            </h3>

            <p>{{ $a->hook_art }}</p>

            <small>
                Date : {{ $a->date_art }} |
                Lecture : {{ $a->readtime_art }} min
            </small>
            {{-- =========================
            Bouton Ajouter aux favoris
            ========================= --}}

            <form action="{{ route('favoris.add', $a->id_art) }}" method="POST" style="margin-top:10px;">
                @csrf

                @if(in_array($a->id_art, session('favoris', [])))
                    <button disabled style="background:#ccc; padding:5px 10px;">
                        Déjà en favori
                    </button>
                @else
                    <button type="submit" style="background:#C5C500FF; color:white; padding:5px 10px;">
                        Ajouter aux favoris
                    </button>
                @endif
            </form>
        </article>
    @endforeach

    {{--
    Paginate(10) dans le controller = 10 articles par page.
    --}}

    <div style="margin-top: 20px;">
        {{ $articles->links() }}
    </div>
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
            © 2025 euronews. Tous droits réservés | Projet créé le 08/04/2025 | Bachelier Informatique<br>
            Contact: 24-00523.amm.abd@isfce.be | ISFCE 4IWPB
        </div>
    </footer>


</body>
</html>
