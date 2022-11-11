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
    <link rel="stylesheet" href="style/css/cart.min.css">

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/anime.min.js"></script>
    <script src="js/main.js"></script>
    <script src="node_modules/untoasted/js/minified/toasted.min.js"></script>
    <script src="js/cart.js"></script>
</head>
<body>

<?php include_once("./elements/navigator.php"); ?>

<main>
    <section id="cart-section">
        <h1>Warenkorb</h1>

        <div class="cart">
            <div class="cart-items">
                <div class="no-items">
                    <span class="icon">remove_shopping_cart</span>
                    <h2>Nichts im Warenkorb</h2>
                    <p>Schau' dich doch erstmal im Shop um und packe ein paar Artikel in deinen Warenkorb, bezahlen
                        kannst
                        du später immernoch.</p>
                </div>

                <div class="cart-item-list">
                    <?php
                    $total = 0;
                    for ($i = 0; $i < rand(3, 7); $i++) {
                        $price = random_float(0.5, 100.0);
                        $amount = rand(1, 50);
                        $priceWAmount = $price * $amount;
                        $total += round($priceWAmount, 2);

                        $price = number_format($price, 2, ',', '.') . "€";
                        $priceWAmount = number_format($priceWAmount, 2, ',', '.') . "€";
                        ?>

                        <div class="cart-item cart-<?php echo $i; ?>">
                            <div class="article-information">
                                <img loading="lazy"
                                     src="https://fakeimg.pl/350x350/888888/2c2c2c/?retina=1&text=Artikelbild">
                                <div class="article-text">
                                    <h2><a href="./artikel-anzeigen.php" class="button-tertiary not-flex">Ein
                                            Produkt</a>
                                    </h2>
                                    <p>Hinzugefügt am <span class="add-date">22.09.2022</span></p>
                                    <p><strong><?php echo number_format($amount, 0, ',', '.'); ?>x</strong> im Warenkorb
                                    </p>
                                    <p>
                                        Einzelpreis: <?php echo "<strong>" . $price . "</strong>" . ($amount > 1 ? ' | Gesamt: <strong>' . $priceWAmount . '</strong>' : ''); ?>
                                    </p>

                                    <div class="cart-item-actions">
                                        <a class="button danger"
                                           onclick="remove_article(<?php echo $i; ?>);">Entfernen</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>


            </div>

            <?php
            $tax = 19;
            // add tax to total
            $taxAmount = round($total * ($tax / 100), 2);
            $totalWTax = $total + $taxAmount;
            ?>

            <div class="summary">
                <div>
                    <span>Total</span>
                    <h3><?php echo number_format($totalWTax, 2, ',', '.') . "€"; ?></h3>

                    <div class="details">
                        <div class="sflex">
                            <strong>Summe</strong>
                            <p><?php echo number_format($total, 2, ',', '.') . "€"; ?></p>
                        </div>

                        <div class="sflex">
                            <strong>Steuern (<?php echo $tax . "%" ?>)</strong>
                            <p><?php echo number_format($taxAmount, 2, ',', '.') . "€"; ?></p>
                        </div>
                    </div>
                </div>

                <div class="infos">
                    <div class="info">
                        <span>Rabattcode</span>
                        <input class="inline" id="coupon" type="text" pattern="[a-zA-Z0-9]{6}">
                    </div>
                </div>

                <div class="infos">
                    <div class="info">
                        <span>Eingeloggt als</span>
                        <p data-placeholder="mail"></p>
                    </div>
                </div>

                <a class="button">Zum Bezahlen</a>
            </div>
        </div>
    </section>

    <div class="summary-mobile">
        <div>
            <div>
                <span>Total</span>
                <h3><?php echo number_format($totalWTax, 2, ',', '.') . "€"; ?></h3>
            </div>

            <a class="button">Zum Bezahlen</a>
        </div>
    </div>
</main>


<script>
    loadPlaceholders();
</script>

<?php include_once("./elements/footer.php"); ?>

</body>
</html>