<?php
include_once "php/methods.php";
$results = number_format(rand(10, 10000), 0, ",", ".");
$term = $params['term'];
?>

<!doctype html>
<html lang="en">
<head>
    <base href="/Steven/Weebshop/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $results; ?> Ergebnisse für: <?php echo $term; ?> | Weebshop</title>

    <link rel="stylesheet" href="style/css/global.min.css">
    <link rel="stylesheet" href="style/css/search.min.css">

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/anime.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>

<?php include_once("./elements/navigator.php"); ?>

<main>
    <section class="heading">
        <form class="input-group" action="#" method="GET">
            <input type="text" name="search" id="search" placeholder="Artikel oder Verkäufer..." value="<?php echo(isset($term) ? $term : ''); ?>"/>
            <button>Suchen</button>
        </form>

        <div class="search-info text-group">
            <?php if (isset($term)) { ?>
                <h1><?php echo "Du hast nach <span class='fc-secondary term'>" . $term . "</span>"; ?> gesucht</h1>
                <p>Diese Suche hat <b><?php echo $results; ?> Ergebnisse</b> erzielt.</p>
            <?php } else { ?>
                <h1>Gebe einen Suchbegriff ein, um eine Suche zu starten.</h1>
            <?php } ?>
        </div>


        <div class="article-grid">

            <?php for ($i = 0; $i < 35; $i++) { ?>

                <div class="article">
                    <a href="artikel-anzeigen.php">
                        <img loading="lazy" src="https://loremflickr.com/175/175?random=<?php echo rand(1, 99999); ?>" alt="Bild"/>

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

</body>
</html>