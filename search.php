<?php
include_once "php/methods.php";
$results = number_format(rand(10, 10000), 0, ",", ".");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $results; ?> Ergebnisse für: <?php echo $_GET['search']; ?> | Weebshop</title>

    <link rel="stylesheet" href="style/css/global.min.css">
    <link rel="stylesheet" href="style/css/search.min.css">

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/anime.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>

<main>
    <section class="heading">
        <form class="input-group" action="#" method="GET">
            <input type="text" name="search" id="search" placeholder="Suchen..." value="<?php echo(isset($_GET['search']) ? $_GET['search'] : ''); ?>"/>
            <button>Suchen</button>
        </form>

        <div class="search-info text-group">
            <h1><?php echo "Du hast nach <span class='fc-secondary'>" . $_GET['search'] . "</span>"; ?> gesucht</h1>
            <p>Diese Suche hat <b><?php echo $results; ?> Ergebnisse</b> erzielt.</p>
        </div>
    </section>

    <section>
        <h2>Ergebnisse</h2>

        <div class="article-grid">

            <?php for ($i = 0; $i < 35; $i++) { ?>

                <div class="article">
                    <a href="artikel-anzeigen.php">
                        <img src="https://loremflickr.com/175/175?random=<?php echo rand(1, 99999); ?>" alt="Bild"/>

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