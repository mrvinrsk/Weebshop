<?php
include_once "php/methods.php";

$percent = rand(3, 20);
$priceNormal = random_float(1.00, 20000.00);
$priceReduced = number_format(getPercentageAmount($priceNormal, $percent), 2, ",", ".");
$priceNormal = number_format($priceNormal, 2, ",", ".");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WeebShop</title>

    <link rel="stylesheet" href="style/css/global.min.css">
    <link rel="stylesheet" href="style/css/home.min.css">
    <link rel="stylesheet" href="style/css/artikel-anzeigen.min.css">

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/anime.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/rating.js"></script>
</head>
<body>

<div id="mobile-nav">
    <div id="mobile-links">
        <p id="mobile-close">X</p>

        <ul>
            <li id="mobile-logo-li"><img loading="lazy" src="images/logo.png" alt="Logo"/></li>
            <!-- Don't add links here, the links are automatically generated from the desktop navigation using js -->
        </ul>
    </div>
</div>

<div id="mobile-data">
    <div id="mobile-data-links">
        <p id="mobile-data-close">X</p>
        <!-- Don't add links here, the links are automatically generated from the desktop navigation using js -->
    </div>
</div>

<nav>
    <div id="header-banner">
        <div>
            <div>
                <span id="mobile-data-toggle">Rechtliches & Kontakt</span>
                <a href="datenschutz.html" style="cursor:pointer;">Datenschutzerklärung</a>
                <a href="impressum.html">Impressum</a>
                <a href="#kontakt">Kontakt</a>
            </div>

            <div id="icons">
                <a href="" target="_blank">
                    <svg class="icon" id="facebook" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                        <defs>
                            <style>
                                .facebook-f {
                                    fill: #fff;
                                }

                                .facebook-circle {
                                    fill: #343434;
                                }
                            </style>
                        </defs>
                        <path class="facebook-circle" d="M1024,512C1024,229.23,794.77,0,512,0S0,229.23,0,512c0,255.55,187.23,467.37,432,505.78v-357.78h-130v-148h130v-112.8c0-128.32,76.44-199.2,193.39-199.2,56.02,0,114.61,10,114.61,10v126h-64.56c-63.6,0-83.44,39.47-83.44,79.96v96.04h142l-22.7,148h-119.3v357.78c244.77-38.41,432-250.22,432-505.78Z"/>
                        <path class="facebook-f" d="M711.3,660l22.7-148h-142v-96.04c0-40.49,19.84-79.96,83.44-79.96h64.56v-126s-58.59-10-114.61-10c-116.95,0-193.39,70.88-193.39,199.2v112.8h-130v148h130v357.78c26.07,4.09,52.78,6.22,80,6.22s53.93-2.13,80-6.22v-357.78h119.3Z"/>
                    </svg>
                </a>
                <a href="" target="_blank">
                    <svg class="icon" id="twitter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 406.66 332.12">
                        <defs>
                            <style>
                                .b {
                                    fill: #343434;
                                }
                            </style>
                        </defs>
                        <path class="b" d="M0,294.66c45.88,4.18,86.43-6.85,123.41-34.68-23.61-1.18-42.92-9.78-58.66-25.98-8.81-9.07-15.26-19.63-19.36-32.25,12.43,1.71,24.38,1.75,36.93-1.56-43.29-10.42-67.06-47.86-66.18-82.97,11.57,5.61,23.39,9.63,36.75,9.83C12.04,97.29,8.99,47.56,28.02,15.58c45.27,53.34,102.56,82.79,172.72,87.48-2.65-14.7-2.4-28.72,1.45-42.73C213.21,20.35,255.36-6.13,296.27,1.23c17.39,3.13,32.45,10.57,44.99,22.99,1.86,1.84,3.43,2.09,5.95,1.52,16.03-3.62,31.25-9.27,45.61-17.25,.98-.55,1.87-1.53,3.63-1.05-6.46,18.9-18.18,33.45-35.77,44.71,16.55-1.55,31.25-6.43,45.98-11.49-5.27,8.93-11.83,16.55-18.88,23.76-5.86,6-12.15,11.54-18.97,16.45-1.75,1.26-2.51,2.61-2.45,4.95,1.48,52.25-13.03,99.93-41.82,143.29-25.67,38.67-59.92,67.25-102.86,85.13-23.1,9.62-47.25,15.02-72.17,17.03-29.98,2.43-59.48-.29-88.38-8.69-21.36-6.21-41.47-15.25-61.13-27.91Z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div id="links">
        <ul>
            <li><a href="#">Link #1</a></li>
            <li><a href="#">Link #2</a></li>
            <li id="logo-li"><a href="#header"><img loading="lazy" src="images/logo.png" alt="Logo"/></a></li>
            <li><a href="#">Link #3</a></li>
            <li><a href="#">Link #4</a></li>
            <li id="hamburger">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="#343434" d="M3,8H21a1,1,0,0,0,0-2H3A1,1,0,0,0,3,8Zm18,8H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Zm0-5H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z"/>
                </svg>
            </li>
        </ul>
    </div>
</nav>

<main>
    <section id="offer">
        <a href="./index.php" class="icon-text large fc-primary no-underline hoverable">
            <span class="icon">chevron_left</span>
            <span>Zurück</span>
        </a>

        <div class="article-head">
            <div class="article-main-image">
                <img loading="lazy" src="https://loremflickr.com/640/360" alt="Bild"/>
            </div>

            <div class="article-main-text">
                <div class="row article-title">
                    <h1 class="article-name">Ein ganz toller Artikel</h1>
                    <p class="price special-heading"><?php echo $priceNormal; ?>€</p>
                </div>

                <p class="article-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquam architecto, consequuntur debitis eos explicabo harum illum molestias nisi, nobis nostrum praesentium provident ratione sunt tempore! Est eum ullam voluptas?</p>

                <div class="actions">
                    <a id="btn-cart" class="button" href="cart.php">In den Warenkorb</a>
                </div>

                <a id="other-options" href="#buying-options" style="display: inline-block; width: 100%; text-align: right;" class="button-tertiary">Andere Optionen</a>
            </div>
        </div>
    </section>

    <section id="buying-options" class="gradient-section">
        <h2>Kauf-Optionen</h2>

        <div class="offers">
            <div class="offer-card">
                <span class="icon">shopping_bag</span>
                <h3>Direktkauf</h3>
                <p>
                    Kaufe diesen Artikel ohne weitere Umwege über den Warenkorb.
                </p>

                <a class="button-secondary">Auswählen</a>
            </div>

            <div class="offer-card">
                <span class="icon">event_repeat</span>
                <h3>Regelmäßiger Kauf</h3>
                <p>
                    Ein regelmäßiger Kauf kann dir einen ordentlichen Rabatt einheimsen.
                    Bei diesem Produkt würde die Ersparnis <b><?php echo $percent; ?>%</b> des Verkaufspreises betragen. Somit läge der reduzierte Monats-Preis bei <strong><?php echo $priceReduced; ?>€</strong>.
                </p>

                <a class="button-secondary">Auswählen</a>
            </div>

            <div class="offer-card">
                <span class="icon">payments</span>
                <h3>Ratenkauf</h3>
                <p>
                    Zu teuer? Kein Problem! Wir bieten dir einen Ratenkauf zu guten Konditionen über einen Zeitraum von <b>3, 6, 12 oder 24 Monate</b> an.
                </p>

                <a class="button-secondary">Auswählen</a>
            </div>
        </div>
    </section>

    <section id="also-bought">
        <h2>Ähnliche Artikel</h2>

        <div class="article-grid">
            <?php for ($i = 0; $i < 4; $i++) { ?>
                <div class="article">
                    <a href="artikel-anzeigen.php">
                        <img loading="lazy" src="https://loremflickr.com/300/300?random=<?php echo rand(1, 99999); ?>" alt="Bild"/>

                        <div class="article-information">
                            <div class="text-group">
                                <h3>Lorem ipsum.</h3>
                                <span class="stars"><?php echo getStarString(random_float(1.0, 5.0), rand(1, 10000), true); ?></span>
                            </div>
                            <p class="price"><?php echo number_format(random_float(1.0, 10000), 2, ",", ".") . "€"; ?></p>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>

    </section>

    <section id="ratings">
        <h2>Bewertungen</h2>

        <div class="ratings-container">
            <div class="all-time">
                <div class="heading">
                    <span class="icon">star</span>
                    <p><?php echo number_format(random_float(1.0, 5.0), 1); ?>/5</p>
                </div>

                <p class="info">Diese Bewertung basiert auf den Ergebnissen von <b><?php echo rand(3, 50) . " Bewertungen"; ?></b>. Bitte beachte, dass positive Bewertungen nicht die Funktionalität eines Produktes garantieren.</p>
            </div>

            <div class="ratings">

                <?php for ($i = 0; $i < 3; $i++) { ?>

                    <div class="rating">
                        <div class="profile">
                            <img loading="lazy" src="https://fakeimg.pl/200/" alt="Profilbild"/>
                        </div>

                        <div>
                            <p class="heading"><span class="rating-count"><?php echo getStarString(random_float(1.0, 5.0), 1, false); ?></span><a class="review-user" href="nutzer-aktivitaet.html"><b data-placeholder="name"></b></a></p>
                            <p class="rating-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti exercitationem libero odit sit ullam voluptate?</p>
                        </div>
                    </div>

                <?php } ?>

                <a class="button-tertiary">Alle Kommentare</a>

            </div>
        </div>

        <div class="write-comment">
            <h3>Bewertung schreiben</h3>
            <textarea class="textfield"></textarea>

            <div class="comment-sub">
                <div class="thumb-rating">
                    <i class="bi bi-hand-thumbs-up thumb thumb-up" data-rating="1"></i>
                    <i class="bi bi-hand-thumbs-down thumb thumb-down" data-rating="-1"></i>
                </div>
                <a class="button">Kommentieren</a>
            </div>
        </div>
    </section>
</main>


<?php include_once("./elements/footer.php"); ?>

<script>
    $(function () {
        loadPlaceholders();
    });
</script>

</body>
</html>