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
    <link rel="stylesheet" href="style/css/artikel-statistiken.min.css">

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/anime.min.js"></script>
    <script src="js/main.js"></script>
    <script src="node_modules/untoasted/js/minified/toasted.min.js"></script>
    <script src="node_modules/chart.js/dist/chart.min.js"></script>
    <script src="js/artikel-statistiken.js"></script>
</head>
<body>

<?php include_once("./elements/navigator.php"); ?>

<main>
    <section id="cart-section">
        <h1>Artikelstatistiken</h1>

        <div class="all-stats">
            <div class="stat">
                <h3>Verkäufe (1 Woche)</h3>
                <canvas id="salesWeek"></canvas>
            </div>

            <div class="stat">
                <h3>Verkäufe (30 Tage)</h3>
                <canvas id="sales30"></canvas>
            </div>

            <div class="stat">
                <h3>Zusammenfassung</h3>

                <div class="fl">
                    <div>
                        <h4>Aufrufe</h4>
                        <p id="views"><?php echo number_format(rand(0, 200000), 0, ',', '.'); ?></p>
                    </div>

                    <div>
                        <h4>Verkäufe</h4>
                        <p id="views"><?php echo number_format(rand(0, 150000), 0, ',', '.'); ?></p>
                    </div>

                    <div>
                        <h4>Umsätze</h4>
                        <p id="views" class="small"><?php echo number_format(random_float(9, 99999999), 2, ',', '.') . "€"; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    loadPlaceholders();
</script>

<?php include_once("./elements/footer.php"); ?>

</body>
</html>