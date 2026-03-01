<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des articles</title>
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
            </select>
        </div>
        <div class="logo">euronews.</div>
    </div>
</header>

<nav>
    <a href="{{ url('/') }}">Accueil</a>
    <a href="{{ url('/articles') }}">Articles</a>
    <a href="{{ url('/custom') }}">Formulaire</a>
    <a href="{{ url('/article') }}">A LA UNE</a>
</nav>

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
        </article>
    @endforeach

    {{--
    Paginate(10) dans le controller = 10 articles par page.
    --}}

    <div style="margin-top: 20px;">
        {{ $articles->links() }}
    </div>
</main>

</body>
</html>
