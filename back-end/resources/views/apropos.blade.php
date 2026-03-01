<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>À propos - Euronews</title>
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
        <a href="{{ url('/') }}">Accueil</a>
        <a href="https://fr.euronews.com/2025/04/08/le-president-zelensky-confirme-que-les-troupes-ukrainiennes-avancent-dans-loblast-de-belgo">UKRAINE</a>
        <a href="https://fr.euronews.com/business/2025/04/08/von-der-leyen-propose-a-trump-un-accord-sur-les-droits-de-douane-zero-pour-zero-pour-tous-">TRUMP</a>
        <a href="https://fr.euronews.com/next/2025/04/08/tiktok-a-apporte-des-modifications-avant-la-repetition-des-elections-roumaines-selon-bruxe">TIKTOK</a>
        <a href="https://fr.euronews.com/2025/04/08/lotan-ne-peut-pas-etre-naive-face-au-renforcement-militaire-de-la-chine-alerte-mark-rutte">OTAN</a>
    </nav>

    <main style="max-width: 900px; margin: 40px auto; padding: 0 20px;">
        <h1 style="font-family: 'Bodoni MT', serif; color: rgb(197, 197, 0); margin-bottom: 30px;">
            📋 À propos du projet
        </h1>

        <section style="background: #f9f9f9; padding: 30px; border-radius: 10px; margin-bottom: 30px;">
            <h2 style="color: rgb(197, 197, 0); font-family: 'Bodoni MT', serif;">Informations générales</h2>
            <p><strong>Projet :</strong> Site de presse Euronews (version étudiante)</p>
            <p><strong>Cours :</strong> ISFCE - 4IPW3 - Développement Web Back-End</p>
            <p><strong>Étudiant :</strong> Bradley (24-00523.amm.abd@isfce.be)</p>
            <p><strong>Framework :</strong> Laravel 12.x</p>
            <p><strong>Base de données :</strong> MySQL (press_2025_v04)</p>
        </section>

        <section style="background: white; padding: 30px; border-radius: 10px; margin-bottom: 30px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
            <h2 style="color: rgb(197, 197, 0); font-family: 'Bodoni MT', serif;">Historique des livrables</h2>
            
            <div style="border-left: 3px solid rgb(197, 197, 0); padding-left: 20px; margin-top: 20px;">
                <h3 style="color: #333;">📅 Livrable 2 - 01/03/2026</h3>
                <ul style="line-height: 1.8;">
                    <li>✅ Migration du projet vers Laravel</li>
                    <li>✅ Intégration des vues Blade (index, custom, article, favoris, à propos)</li>
                    <li>✅ Configuration des routes web</li>
                    <li>✅ Structure MVC en place</li>
                    <li>✅ Page de gestion des favoris créée</li>
                    <li>🔧 Base de données en cours de connexion</li>
                </ul>
            </div>

            <div style="border-left: 3px solid #ccc; padding-left: 20px; margin-top: 30px;">
                <h3 style="color: #333;">📅 Livrable 1 - 08/04/2025</h3>
                <ul style="line-height: 1.8;">
                    <li>✅ Création de la charte graphique (CSS pur, sans Bootstrap)</li>
                    <li>✅ Page d'accueil avec article principal et articles secondaires</li>
                    <li>✅ Page article complet (exemple : Cora)</li>
                    <li>✅ Formulaire de recherche avec widgets</li>
                    <li>✅ Design responsive (mobile/desktop)</li>
                    <li>✅ Navigation fonctionnelle</li>
                </ul>
            </div>
        </section>

        <section style="background: #f9f9f9; padding: 30px; border-radius: 10px; margin-bottom: 30px;">
            <h2 style="color: rgb(197, 197, 0); font-family: 'Bodoni MT', serif;">État d'avancement</h2>
            
            <h3 style="margin-top: 20px;">✅ Fonctionnalités implémentées</h3>
            <ul style="line-height: 1.8;">
                <li>Page d'accueil avec articles statiques</li>
                <li>Page article complet</li>
                <li>Formulaire de recherche (interface)</li>
                <li>Page favoris (interface)</li>
                <li>Navigation entre pages</li>
                <li>Design responsive</li>
            </ul>

            <h3 style="margin-top: 20px;">🔧 En cours de développement</h3>
            <ul style="line-height: 1.8;">
                <li>Connexion à la base de données MySQL</li>
                <li>Affichage dynamique des articles depuis la DB</li>
                <li>Système de recherche fonctionnel</li>
                <li>Gestion des favoris (SESSION/COOKIE)</li>
            </ul>

            <h3 style="margin-top: 20px;">⏳ À venir</h3>
            <ul style="line-height: 1.8;">
                <li>Identification utilisateur (API + JSON)</li>
                <li>Options de présentation (couleur fond, etc.)</li>
                <li>Publicité sponsors (JSON distant)</li>
                <li>Page "Tous les articles"</li>
            </ul>
        </section>

        <section style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
            <h2 style="color: rgb(197, 197, 0); font-family: 'Bodoni MT', serif;">Notes techniques</h2>
            
            <h3 style="margin-top: 20px;">🔗 Liens importants</h3>
            <ul style="line-height: 1.8;">
                <li><a href="{{ url('/') }}" style="color: rgb(197, 197, 0);">Page d'accueil</a> - Articles principaux</li>
                <li><a href="{{ url('/article') }}" style="color: rgb(197, 197, 0);">Article Cora</a> - Exemple d'article complet</li>
                <li><a href="{{ url('/custom') }}" style="color: rgb(197, 197, 0);">Formulaire de recherche</a> - Interface de recherche</li>
                <li><a href="{{ url('/favoris') }}" style="color: rgb(197, 197, 0);">Mes favoris</a> - Gestion des favoris</li>
            </ul>

            <h3 style="margin-top: 20px;">🔍 Mots-clés pour la recherche (à venir)</h3>
            <p style="color: #666; font-style: italic;">Les mots-clés de recherche seront disponibles une fois la base de données connectée.</p>

            <h3 style="margin-top: 20px;">💻 Technologies utilisées</h3>
            <ul style="line-height: 1.8;">
                <li><strong>Backend :</strong> Laravel 12.x, PHP 8.5</li>
                <li><strong>Frontend :</strong> HTML5, CSS3 pur (pas de Bootstrap)</li>
                <li><strong>Base de données :</strong> MySQL 8.0</li>
                <li><strong>Fonts :</strong> Bodoni MT (titres), Courier New (corps)</li>
                <li><strong>Couleur principale :</strong> rgb(197, 197, 0)</li>
            </ul>
        </section>
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