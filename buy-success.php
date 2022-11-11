<?php
include_once "php/methods.php";
$sum = number_format(random_float(1.00, 20000.00), 2, ",", ".");
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
    <link rel="stylesheet" href="style/css/buy-success.min.css">

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/anime.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/rating.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/party-js@latest/bundle/party.min.js"></script>
</head>
<body>

<?php include_once("./elements/navigator.php"); ?>

<main class="small-space ignore-animation">
    <section id="head">
        <a href="./index.php" class="head-link icon-text large fc-primary no-underline hoverable">
            <span class="icon">chevron_left</span>
            <span>Zur Startseite</span>
        </a>
        <img class="head-illustration" src="./images/undraw-delivery.svg" alt="Bestellung erfolgreich"/>
    </section>

    <section class="gradient-section ignore-animation">
        <h1>Vielen Dank für deine Bestellung</h1>
        <p>Die durchschnittliche Lieferzeit für deine Region beträgt <strong>3–5 Werktage</strong>, solltest du deine Bestellung nach <strong>14 Tagen</strong> noch nicht erhalten haben, wende dich bitte an unseren <a href="support.html" target="_blank" class="button-tertiary inline">Support</a></p>
    </section>

    <section class="ignore-animation">
        <h2>Bestellinformationen</h2>

        <div class="bestellinformationen">
            <div>
                <p>Bestellnummer</p>
                <a href="bestellung.php"><?php echo uniqid(); ?></a>
            </div>

            <div>
                <p>Datum</p>
                <p><?php echo date("d.m.Y"); ?></p>
            </div>

            <div>
                <p>Summe</p>
                <p><?php echo $sum . '€'; ?></p>
            </div>
        </div>
    </section>
</main>


<?php include_once("./elements/footer.php"); ?>

<script>
    $(function () {
        loadPlaceholders();
        confetti(document.querySelector('.head-illustration'));
    });
</script>

</body>
</html>