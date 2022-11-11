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
<base href="/Steven/Weebshop/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WeebShop</title>

    <link rel="stylesheet" href="style/css/global.min.css">
    <link rel="stylesheet" href="style/css/home.min.css">
    <link rel="stylesheet" href="style/css/artikel-anzeigen.min.css">
    <link rel="stylesheet" href="style/css/verkaeufer-anzeigen.min.css">

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/anime.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>

<?php include_once("./elements/navigator.php"); ?>

<main>
    <section id="seller">
        <div class="article-head">
            <div class="article-main-image">
                <img loading="lazy" src="https://loremflickr.com/640/360" alt="Bild"/>
            </div>

            <div class="article-main-text">
                <h1 class="article-name" data-placeholder="firstname"></h1>
                <p class="article-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquam architecto, consequuntur debitis eos explicabo harum illum molestias nisi, nobis nostrum praesentium provident ratione sunt tempore! Est eum ullam voluptas?</p>

                <div class="actions">
                    <a class="button" href="#featured">Artikel</a>
                    <a class="button" href="#ratings">Bewertungen</a>
                </div>
            </div>
        </div>
    </section>

    <section id="featured" class="gradient-section">
        <h2>Im Rampenlicht</h2>

        <div class="featured-offer">
            <img loading="lazy" src="https://loremflickr.com/700/700?random=<?php echo rand(1, 99999); ?>" alt="Hervorgehobener Artikel: Bild"/>

            <div class="information">
                <div class="section-heading">
                    <h3>Toller Artikel</h3>
                    <span class="featured-rating stars"><?php echo getStarString(random_float(1., 5.), rand(10, 10000), true); ?></span>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias asperiores eligendi illum ipsum iusto nam nesciunt, non praesentium ratione repellat sed tempore, temporibus vel vitae.</p>

                <div class="actions">
                    <p class="price"><?php echo number_format(random_float(100., 1000.), 2, ",", ".") . "€"; ?></p>
                    <a href="artikel-anzeigen.php" class="button">Ansehen</a>
                </div>
            </div>
        </div>
    </section>

    <section id="also-bought">
        <h2>Artikel von <span data-placeholder="firstname"></span></h2>

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
                            <p class="heading"><span class="rating-count"><?php echo getStarString(random_float(1.0, 5.0), 1, false); ?></span><a class="review-user" href="./user/<?php echo rand(1, 1000); ?>/activity"><b data-placeholder="name"></b></a></p>
                            <p class="rating-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti exercitationem libero odit sit ullam voluptate?</p>
                        </div>
                    </div>

                <?php } ?>

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