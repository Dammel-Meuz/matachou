<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matachou</title>
    <!-- Ajoutez les liens vers Bootstrap CSS et jQuery -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>

<header>
    <img src="{{ asset('images/mon-logo.png') }}" alt="logo" id="logo-img">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" style="color: #549637;" href="#"><b>Accueil</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #549637;" href="#plateaux"><b>Boutique</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #549637;" href="#blog"><b>Blog</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #549637;" href="#a-propos"><b>A propos</b></a>
                </li>
                <li class="nav-item" id="exeption">
                    <a class="nav-link" style="color: #549637;" href="#contact"><b>Contact</b></a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div>
    <article>
        <div>
            <img src="{{ asset('images/commandez.jpg') }}" alt="commande" class="img-fluid mx-auto d-block" id="commandez">
        </div>
        <div class="main-content">
            <div class="text">
                <p>Plongez dans un monde d'exotisme <br> avec nos plateaux de fruits exotiques frais : <br>
                Une symphonie de saveurs tropicales <br> pour éveiller vos papilles !</p>
                <p>Des fruits frais et savoureux <br> à chaque bouchée </p>
            </div>
            <div>
                <img src="{{ asset('images/assiettedefruitsfrais-removebg-preview.png') }}" alt="Image carré" class="img-fluid">
            </div>
        </div>
    </article>

    <div class="square-container2">
        <img src="{{ asset('images/assiettedefruitsfrais-removebg-preview.png') }}" alt="Image carré" id="plateau1" class="img-fluid mx-auto d-block">
        <div>
            <ul class="liste">
                <li>Pêches</li>
                <li>Oranges</li>
                <li>Kiwi</li>
                <li>Raisins</li>
                <li>Fraises</li>
                <li>Prunes</li>
                <li>Framboises</li>
                <li>Figues</li>
            </ul>
        </div>
    </div>


    <div class="plateaux" id="plateaux">
        <div class="image-prix image-prix1">
            <div class="image">
                <img src="{{ asset('images/plateau1-removebg-preview.png') }}" alt="Image 1" class="price">
            </div>
            <div class="prix">15 000 CFA</div>
        </div>

        <div class="image-prix image-prix2">
            <div class="image">
                <img src="{{ asset('images/plateau1-removebg-preview.png') }}" alt="Image 2" class="price">
            </div>
            <div class="prix">20 000 CFA</div>
        </div>

        <div class="image-prix image-prix3">
            <div class="image">
                <img src="{{ asset('images/plateau1-removebg-preview.png') }}" alt="Image 3" class="price">
            </div>
            <div class="prix">25 000 CFA</div>
        </div>
    </div>




    <div class="container mt-5">
    <div class="carousel-container">
        <button class="carousel-button" onclick="previous()">&#9204;</button>
        <div class="carousel">
            <div class="carousel-track" id="carousel-track">
            <img src="{{ asset('images\kiwi.jpeg') }}" alt="kiwi" id="kiwi" class="fruit">
            <img src="{{ asset('images\fraise.jpeg') }}" alt="fraise" id="fraise" class="fruit">
            <img src="{{ asset('images\fruit-de-la-passion.png') }}" alt="fruit-de-la-passion" id="fruit-de-la-passion" class="fruit">
            <img src="{{ asset('images\pitaya.jpg') }}" alt="pitaya" id="pitaya" class="fruit">
            <img src="{{ asset('images\ananas.jpg') }}" alt="ananas" id="ananas" class="fruit">
            <img src="{{ asset('images\framboises.jpg') }}" alt="framboise" id="framboise" class="fruit">
            <img src="{{ asset('images\banane.jpg') }}" alt="banane" id="banane" class="fruit">
            <img src="{{ asset('images\Figue.png') }}" alt="figue" id="figue" class="fruit">
            <img src="{{ asset('images\myrtille.jpeg') }}" alt="myrtille" id="myrtille" class="fruit">
            <img src="{{ asset('images\orange.jpg') }}" alt="orange" id="orange" class="fruit">
            <img src="{{ asset('images\pasteque.jpg') }}" alt="pasteque" id="pasteque" class="fruit">
            <img src="{{ asset('images\Peche.jpg') }}" alt="peche" id="peche" class="fruit">
            <img src="{{ asset('images\cerises.jpg') }}" alt="cerise" id="cerise" class="fruit">
            <img src="{{ asset('images\pommes.jpg') }}" alt="pomme" id="pomme" class="fruit">
            <img src="{{ asset('images\raisin.jpg') }}" alt="raisin" id="raisin" class="fruit">
            <img src="{{ asset('images\prune.jpeg') }}" alt="prune" id="prune" class="fruit">
            </div>
        </div>
        <button class="carousel-button" onclick="next()">&#9205;</button>
    </div>
</div>

    <script>
        let currentIndex = 0;
        const track = document.getElementById('carousel-track');
        const images = document.querySelectorAll('.carousel img');
        const totalImages = images.length;
        const visibleImages = 3; // Nombre d'images visibles à la fois

        function updateCarousel() {
            const offset = currentIndex * -(100 / visibleImages);
            track.style.transform = `translateX(${offset}%)`;
        }

        function next() {
            if (currentIndex < totalImages - visibleImages) {
                currentIndex++;
                updateCarousel();
            }
        }

        function previous() {
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            }
        }

        // Fonction pour remonter en haut de la page
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Afficher ou masquer le bouton en fonction du scroll
window.addEventListener('scroll', function() {
    var scrollTopBtn = document.getElementById('scrollTopBtn');
    if (window.scrollY > 200) {
        scrollTopBtn.style.display = 'block';
    } else {
        scrollTopBtn.style.display = 'none';
    }
});


    </script>

<div class="container-main">
    <h1 id="blog">Bienfaits des fruits</h1>
    <div class="bienfaits-container">
        <img src="{{ asset('images/liste_de_fruits.jpg') }}" alt="liste_fruits" id="liste_fruits">
        <div class="bienfaits">
            <p class="bienfait">
                <br>Bien sélectionnés et consommés aux bons moments, les fruits contribuent au maintien de l'énergie,
                de la vigilance et de l'efficacité au travail. Gorgés d'eau, de vitamines, d'oligo-éléments ou encore
                de fibres, ils apportent à l'organisme des éléments indispensables à son bon fonctionnement. <br>
                Leurs apports soutiennent la concentration, agissent sur la fatigue musculaire, la vision, le stress
                et la fatigue.
            </p>
            <p class="bienfait">
                Vous êtes peut-être parfois sujet à l'hypoglycémie, il s'agit d'un manque d'apport de sucre dans le sang
                et principalement dans le cerveau : avez-vous pensé qu'une délicieuse pomme croquée en milieu de matinée
                pourrait vous éviter un épisode de ce type tout en vous rassasiant et en vous apportant des vitamines
                jusqu'au déjeuner ?
            </p>
            <p class="bienfait">
                Les fruits agissent aussi bénéfiquement sur votre organisme grâce à leurs apports en antioxydants,
                en fibres… Leur consommation permet de limiter les risques de cancers et les maladies cardio-vasculaires.
                Ils sont recommandés par le PNNS (Plan National Nutrition Santé), avec les légumes il faudrait en
                consommer au minimum cinq par jour.
            </p>
        </div>
    </div>
</div>


<section id="a-propos" class="box">
        <div id="p1" class="grid-item">
            <h1>À propos de Matachou</h1>
        </div>
        <div id="p2" class="grid-item-vert">
            <h2 class='h2'>Notre Histoire</h2>
            <p>Matachou a commencé son aventure avec une passion pour les fruits frais et de qualité. Ce qui a
            commencé comme un petit stand de marché est rapidement devenu une entreprise florissante, grâce à
            notre engagement envers la fraîcheur, la qualité et le service client exceptionnel.</p>
        </div>
        <div id="p3" class="grid-item-vert">
            <h2 class='h2'>Notre Mission</h2>
            <p>Chez Matachou, notre mission est simple : offrir à nos clients les meilleurs fruits possibles.
                Nous sélectionnons soigneusement nos produits auprès de producteurs locaux et internationaux,
                en nous assurant que chaque fruit qui arrive sur votre table est délicieux, nutritif et d'une
                qualité irréprochable.
            </p>
        </div>
        <div id="p4" class="grid-item-vert">
            <h2 class='h2'>Nos Produits</h2>
            <p>Nous proposons une vaste gamme de fruits frais, incluant des variétés locales et exotiques.
                En plus des fruits individuels, nous créons également des plateaux de fruits artistiquement arrangés,
                parfaits pour des événements spéciaux, des cadeaux ou simplement pour se faire plaisir.
            </p>
        </div>
        <div id="p5" class="grid-item-vert">
            <h2 class='h2'>Nos Valeurs</h2>
            <p>Qualité : Nous ne faisons aucun compromis sur la qualité. Chaque fruit est sélectionné avec soin pour
                garantir une saveur et une fraîcheur optimales.
                Service Client : La satisfaction de nos clients est notre priorité absolue. Nous nous efforçons de
                fournir un service amical et personnalisé à chaque visite.
                Engagement Local : Nous soutenons les producteurs locaux et nous engageons à promouvoir des pratiques
                agricoles durables.</p>
        </div>
        <div id="p6" class="grid-item">
            <h2>Pourquoi Nous Choisir ?</h2>
            <p>En choisissant Matachou, vous faites le choix de la qualité et de l'engagement envers des produits
                frais et délicieux. Que vous soyez un amateur de fruits ou que vous cherchiez à ajouter une touche
                saine et colorée à votre prochain événement, nous sommes là pour vous servir.</p>
        </div>
    </section>

    <section id="contact">
        <div class="contact-header">
            <h2>Contactez-Nous</h2>
            <p>Pour toute question ou commande spéciale, n'hésitez pas à nous contacter. Nous sommes impatients de vous servir et de vous offrir les meilleurs fruits disponibles.</p>
        </div>
        <div class="contact-info">
            <p>
                <i class="fab fa-instagram"></i>
                <a href="https://www.instagram.com/matachougueye?igsh=ZHFidTV3eG8xeTll">Instagram: @matachougueye</a>
            </p>
            <p>
                <i class="fas fa-phone-alt"></i>
                <span>Téléphone: +221 771915757</span>
            </p>
            <p>
                <i class="fas fa-map-marker-alt"></i>
                <span>Adresse: Dakar, Sénégal</span>
            </p>
            <p>
                <i class="fab fa-tiktok"></i>
                <a href="https://www.tiktok.com/@matachou">TikTok: @matachou</a>
            </p>
        </div>
    </section>

    <footer>
        &copy; 2024 Matashou. Tous droits réservés.
    </footer>

    <button onclick="scrollToTop()" id="scrollTopBtn">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8.646 1.646a.5.5 0 0 1 .708 0l5 5a.5.5 0 0 1-.708.708L8 2.707 3.354 7.354a.5.5 0 1 1-.708-.708l5-5zM8.5 15a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 1 0v11.5a.5.5 0 0 1-.5.5z"/>
    </svg>
    </button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
<script>


</script>

</body>
</html>
