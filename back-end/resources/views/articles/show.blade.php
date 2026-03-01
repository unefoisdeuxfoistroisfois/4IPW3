<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ $article->title_art }}</title>
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
    <a href="{{ url('/custom') }}">Formulaire</a>
    <a href="{{ url('/article') }}">A LA UNE</a>
</nav>

<main class="article-page">
    <section class="article-info">
        <p>
            <strong>Date :</strong> {{ $article->date_art }} |
            <strong>Lecture :</strong> {{ $article->readtime_art }} min
        </p>
    </section>

    <h1>{{ $article->title_art }}</h1>

    @if(!empty($article->image_art))
        <img src="{{ asset('media/' . $article->image_art) }}" class="article-image" alt="">
    @endif

    <p><strong>{{ $article->hook_art }}</strong></p>

    <p>{!! nl2br(e($article->content_art)) !!}</p>
</main>

</body>
</html>
