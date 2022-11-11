<?php
include_once "php/methods.php";
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

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/party-js@latest/bundle/party.min.js"></script>
    <script src="js/anime.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/index.js"></script>
    <script src="js/confetti_buttons.js"></script>
</head>
<body>

<?php include_once("./elements/navigator.php"); ?>

<main>
    <section>
        <div class="input-group searchbar">
            <input type="text" name="search" id="search" placeholder="Artikel oder Verkäufer suchen..."/>
            <button id="search-button">Suchen</button>
        </div>

        <div class="stats">
            <div class="stat hover-gradient">
                <span class="description">Artikel</span>
                <p><?php echo number_format(rand(100, 10000), 0, ',', '.'); ?></p>
                <span class="icon">shopping_bag</span>
            </div>

            <div class="stat hover-gradient">
                <span class="description">Aktive Nutzer</span>
                <p><?php echo number_format(rand(50, 7500), 0, ',', '.'); ?></p>
                <span class="icon">group</span>
            </div>

            <div class="stat hover-gradient">
                <span class="description">Bestellungen</span>
                <p><?php echo number_format(rand(100, 1500), 0, ',', '.'); ?></p>
                <span class="icon">payments</span>
            </div>
        </div>
    </section>

    <section>
        <h2>Neuste Artikel</h2>

        <div class="article-grid">
            <?php for ($i = 0; $i < 3; $i++) { ?>

                <div class="article">
                    <a href="./article/<?php echo rand(1, 1000); ?>">
                        <img src="https://fakeimg.pl/350x350/888888/2c2c2c/?retina=1&text=Artikelbild" alt="Bild"/>

                        <div class="article-information">
                            <div class="text-group">
                                <div class="title-price text-group">
                                    <h3>Lorem ipsum.</h3>
                                    <p class="price"><?php echo number_format(random_float(1.0, 10000), 2, ",", ".") . "€"; ?></p>
                                </div>
                                <span class="stars"><?php echo getStarString(random_float(1.0, 5.0), rand(1, 10000), true); ?></span>
                            </div>
                        </div>
                    </a>
                </div>

            <?php } ?>
        </div>
    </section>

    <section>
        <h2>Aktive Verkäufer</h2>

        <div class="seller-grid">
            <?php for ($i = 0; $i < 3; $i++) { ?>

                <div class="grid-item">
                    <div class="grid-information">
                        <p data-placeholder="name"></p>
                        <span>Verkauft <?php echo rand(50, 100); ?> Artikel.</span>

                        <div class="grid-buttons">
                            <a class="button" href="verkaeufer-anzeigen.php">Verkäufer anzeigen</a>
                        </div>
                    </div>
                    <img loading="lazy" src="https://fakeimg.pl/250" alt="Bild"/>
                </div>

            <?php } ?>
        </div>
    </section>
</main>

<script>
    loadPlaceholders();
</script>

<?php include_once("./elements/footer.php"); ?>

</body>
</html>