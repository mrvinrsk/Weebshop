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
    <link rel="stylesheet" href="style/css/user-settings.min.css">

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/anime.min.js"></script>
    <script src="js/main.js"></script>
    <script src="node_modules/untoasted/js/minified/toasted.min.js"></script>
    <script src="node_modules/cleave.js/dist/cleave.min.js"></script>
    <script src="js/settings.js"></script>
</head>
<body>

<?php include_once("./elements/navigator.php"); ?>

<main>
    <section>
        <h1>Nutzereinstellungen</h1>

        <div class="user-settings-wrapper">
            <div class="fixedinfo">
                <div class="profile">
                <img src="https://fakeimg.pl/200x200/888888/2c2c2c/?retina=1&text=Profilbild" loading="lazy"
                     alt="Profilbild" class="profilepicture">
                <strong data-placeholder="firstname"></strong>
                </div>

                <div class="settings-navigation">
                    <div class="subnav">
                        <div class="settings-category" data-settings-load="user">
                            <span class="icon">person</span><p>Accountdaten</p>
                        </div>
                    </div>

                    <div class="subnav">
                        <div class="settings-category" data-settings-load="general">
                            <span class="icon">settings</span><p>Allgemeines</p>
                        </div>

                        <div class="settings-category" data-settings-load="payment">
                            <span class="icon">credit_card</span><p>Zahlungsmethoden</p>
                        </div>
                    </div>

                    <div class="subnav">
                        <div class="settings-category danger" data-settings-load="delete">
                            <span class="icon">delete</span><p>Account löschen</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="settings-wrapper s-nothing">
                <div class="no-selection">
                    <span class="icon">tune</span>
                    <div>
                        <h2>Keine Kategorie gewählt</h2>
                        <p>Bitte wähle in der Navigation einen Unterpunkt, dessen Einstellungen du bearbeiten
                            möchtest.</p>
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