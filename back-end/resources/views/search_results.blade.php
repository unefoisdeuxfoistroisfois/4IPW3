<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats de recherche - Euronews</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/lib/external.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header class="header-hover-area">
        <div class="header-top">
            <div class="logo">euronews.</div>
        </div>
    </header>

    <nav>
        <a href="{{ url('/') }}">Accueil</a>
        <a href="{{ url('/articles') }}">Articles</a>
        <a href="{{ url('/custom') }}">Recherche</a>
        <a href="{{ url('/favoris') }}">Favoris</a>
        <a href="{{ url('/apropos') }}">À propos</a>
    </nav>

    <main style="max-width: 900px; margin: 40px auto; padding: 0 20px;">
        <h1 style="font-family: 'Bodoni MT', serif; color: rgb(197, 197, 0);">
            Résultats de recherche pour "{{ $keyword }}"
        </h1>

        <p style="color: #666; margin: 20px 0;">
            {{ count($articles) }} article(s) trouvé(s) (max 10)
        </p>

        @if(count($articles) > 0)
            @foreach($articles as $article)
                <article style="border-bottom: 1px solid #ddd; padding: 20px 0;">
                    <h3>
                        <a href="{{ route('article', $article->id_art) }}" style="color: rgb(197, 197, 0); text-decoration: none;">
                            {{ $article->title_art }}
                        </a>
                    </h3>
                    <p>{{ $article->hook_art }}</p>
                    <small style="color: #999;">
                        {{ $article->date_art }} | {{ $article->readtime_art }} min
                    </small>
                </article>
            @endforeach
        @else
            <p style="text-align: center; padding: 40px; color: #999;">
                Aucun article trouvé pour "{{ $keyword }}"
            </p>
        @endif

        <div style="margin-top: 30px;">
            <a href="{{ url('/custom') }}" style="color: rgb(197, 197, 0);">← Nouvelle recherche</a>
        </div>
    </main>

    <footer>
        <div class="footer-bottom">
            © 2025 euronews. Tous droits réservés
        </div>
    </footer>
</body>
</html>