<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Clap de fin pour les hypermarchés Cora en Belgique</title>
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/lib/external.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <header>
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