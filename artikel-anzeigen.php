<?php
include_once "php/methods.php";

$id = $params['id'] ?: $_GET['id'];
if ($id == null) {
    header("Location: /");
    exit();
}

$percent = rand(3, 20);
$priceNormal = random_float(1.00, 20000.00);
$priceReduced = number_format(getPercentageAmount($priceNormal, $percent), 2, ",", ".");
$priceNormal = number_format($priceNormal, 2, ",", ".");
?>

<!doctype html>
<html lang="en">
<head>
    <base href="/Steven/Weebshop/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WeebShop</title>

    <link rel="stylesheet" href="node_modules/untoasted/css/minified/toasted.min.css">
    <link rel="stylesheet" href="style/css/global.min.css">
    <link rel="stylesheet" href="style/css/home.min.css">
    <link rel="stylesheet" href="style/css/artikel-anzeigen.min.css">

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/anime.min.js"></script>
    <script src="js/main.js"></script>
    <script src='node_modules/untoasted/js/minified/toasted.min.js'></script>
    <script src="js/cart.js"></script>
    <script src="js/rating.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/party-js@latest/bundle/party.min.js"></script>
    <script src="js/confetti_buttons.js"></script>
</head>
<body>

<div id="mobile-nav">
    <div id="mobile-links">
        <p id="mobile-close">X</p>

        <ul>
            <li id="mobile-logo-li"><img loading="lazy" src="images/logo.svg" alt="Logo"/></li>
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

<?php include_once("./elements/navigator.php"); ?>

<!-- TODO: only as seller -->
<div class="stats-banner icon-text article-stats-banner" data-id="<?php echo $id; ?>">
    <span class="icon">bar_chart</span>
    <span>Verkaufs-Statistiken</span>
</div>

<main>
    <section id="offer">
        <div class="article-head">
            <div class="article-main-image">
                <img src="https://fakeimg.pl/650x300/888888/2c2c2c/?retina=1&text=Artikelbild (groß)" alt="Bild"/>
            </div>

            <div class="article-main-text">
                <div class="row article-title">
                    <h1 class="article-name">Ein ganz toller Artikel</h1>
                    <p class="price special-heading"><?php echo $priceNormal; ?>€</p>
                </div>

                <p class="article-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquam architecto, consequuntur debitis eos explicabo harum illum molestias nisi, nobis nostrum praesentium provident ratione sunt tempore! Est eum ullam voluptas?</p>

                <div class="actions">
                    <a id="btn-cart" class="button" onclick="add_article(<?php echo rand(1, 10000); ?>);">In den Warenkorb</a>
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
                            <img src="https://fakeimg.pl/650x300/888888/2c2c2c/?retina=1&text=Profilbild" loading="lazy" alt="Profilbild">
                        </div>

                        <div>
                            <p class="heading"><span class="rating-count"><?php echo getStarString(random_float(1.0, 5.0), 1, false); ?></span><a class="review-user" href="./user/<?php echo rand(1, 1000); ?>/activity"><b data-placeholder="name"></b></a></p>
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

    <section id="also-bought">
        <h2>Ähnliche Artikel</h2>

        <div class="article-grid">
            <?php for ($i = 0; $i < 3; $i++) { ?>
                <div class="article">
                    <a href="artikel-anzeigen.php">
                        <img loading="lazy" src="https://fakeimg.pl/350x350/888888/2c2c2c/?retina=1&text=Artikelbild" alt="Bild">

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
</main>


<?php include_once("./elements/footer.php"); ?>

<script>
    $(function () {
        loadPlaceholders();
    });
</script>

</body>
</html>