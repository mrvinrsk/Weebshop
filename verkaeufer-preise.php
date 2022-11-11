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
    <link rel="stylesheet" href="style/css/verkaeufer-preise.min.css">

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/anime.min.js"></script>
    <script src="node_modules/untoasted/js/minified/toasted.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/rating.js"></script>
    <script src="js/verkaeufer-preise.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/party-js@latest/bundle/party.min.js"></script>
</head>
<body>

<?php include_once("./elements/navigator.php"); ?>

<main class="ignore-animation">
    <section id="head">
        <h2>BRRRRRR-Shop für Verkäufer</h2>
        <p>
            Du hast als Anbieter mehrere Möglichkeiten deine Artikel im BRRRRRR-Shop zu verkaufen, wir bieten dir ein
            kostenloses Angebot zum Verkaufen, wenn dir das nicht reichen sollte, hast du aber trotzdem jederzeit die
            Möglichkeit auf einen der höheren Abonnements mit mehr Schnickschnack zu upgraden. Mehr Informationen dazu
            <a href="#plans">weiter unten</a>.
        </p>
    </section>

    <section>
        <h2>Wieso BRRRRRR-Shop?</h2>
        <p>
            Wir bieten dir für den Verkauf deiner Artikel viele Vorteile<sup>1</sup> gegenüber unserer Konkurrenz,
            welche diese Frage überflüssig machen sollten. Zu diesen Vorteilen zählen u.A.:
        </p>

        <div class="list">
            <div class="list-item">Statistiken für Verkäufe</div>
            <div class="list-item">Hervorhebung von besonderen Angeboten</div>
            <div class="list-item">Wir klauen dir nur niedrige Servicegebühren</div>
            <div class="list-item">Wir haben eine coole Domain, was dich und deine Artikel automatisch auch cool macht
                😎
            </div>
        </div>

        <div class="footnotes">
            <span><sup>1</sup>Einige Vorteile sind u.U. nur mit einem kostenpflichtigen Abonnement verfügbar.</span>
        </div>
    </section>

    <section id="plans" class="plans" data-offset="300" data-offset-mobile="225">
        <h2>Angebote</h2>

        <div>
            <div class="plan">
                <span class="name">Starter</span>

                <div class="information">
                    <h3>Kostenlos</h3>
                    <span class="renewal">für immer</span>

                    <!--<p>Perfekt für all diejenigen, die ab und zu mal ein paar Artikel verscherbeln wollen.</p>-->

                    <div class="list">
                        <div class="list-item">Geringe Servicegebühren</div>
                        <div class="list-item">bis zu 3 Artikel gleichzeitig</div>
                        <div class="list-item">Vorteil 3</div>
                    </div>

                    <div class="buttons">
                        <a class="button">Auswählen</a>
                        <a class="button-tertiary" href="#compare">Vergleichen</a>
                    </div>
                </div>
            </div>

            <div class="plan featured">
                <span class="name">Profi</span>

                <div class="information">
                    <h3>10€</h3>
                    <span class="renewal">pro Monat</span>

                    <!--<p>Für alle, die Stammkunden im Shop sind und den ein oder anderen Vorteil genießen möchten.</p>-->

                    <div class="list">
                        <div class="list-item">Vorteil 1</div>
                        <div class="list-item">Vorteil 2</div>
                        <div class="list-item">Vorteil 3</div>
                    </div>

                    <div class="buttons">
                        <a class="button">Auswählen</a>
                        <a class="button-tertiary" href="#compare">Vergleichen</a>
                    </div>
                </div>
            </div>

            <div class="plan">
                <span class="name">Unternehmen</span>

                <div class="information">
                    <h3>Ab 50€</h3>
                    <span class="renewal">pro Monat</span>

                    <!--<p>Für Unternehmen ab fünf Mitarbeitern – bietet den größten Funktionsumfang und die meisten Statistiken zum genauen Kalkulieren.</p>-->

                    <div class="list">
                        <div class="list-item">Vorteil 1</div>
                        <div class="list-item">Vorteil 2</div>
                        <div class="list-item">Vorteil 3</div>
                    </div>

                    <div class="buttons">
                        <a class="button">Auswählen</a>
                        <a class="button-tertiary" href="#compare">Vergleichen</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="compare" class="compare" data-offset="200" data-offset-mobile="225">
        <h2>Vergleichen</h2>

        <div class="desktop">
            <table>
                <thead>
                <tr class="header">
                    <th></th>
                    <th>
                        <span class="name">Starter</span>
                        <h3>Kostenlos</h3>
                        <span class="renewal">für immer</span>

                        <p>Perfekt für all diejenigen, die ab und zu mal ein paar Artikel verscherbeln wollen.</p>
                    </th>
                    <th>
                        <span class="name">Profi</span>
                        <h3>10€</h3>
                        <span class="renewal">pro Monat</span>
                        <p>Für alle, die Stammkunden im Shop sind und den ein oder anderen Vorteil genießen möchten.</p>
                    </th>
                    <th>
                        <span class="name">Unternehmen</span>
                        <h3>Ab 50€</h3>
                        <span class="renewal">pro Monat</span>
                        <p>Für Unternehmen ab fünf Mitarbeitern – bietet den größten Funktionsumfang und die meisten Statistiken zum genauen Kalkulieren.</p>
                    </th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>
                        <div class="benefit tooltip"><p>Maximale Artikel</p>
                            <div class="tooltip-content">
                                <h4>Maximale Artikel</h4>
                                <p>
                                    Die maximale Anzahl an Artikeln, welche gleichzeitig zum Verkauf angeboten werden
                                    können.
                                </p>
                            </div>
                        </div>
                    </td>
                    <td><span>3</span></td>
                    <td><span>Unlimitiert</span></td>
                    <td><span>Unlimitiert</span></td>
                </tr>

                <tr>
                    <td>
                        <div class="benefit"><p>Statistiken</p></div>
                    </td>
                    <td><span class="icon"></span></td>
                    <td><span class="icon">remove</span></td>
                    <td><span class="icon">done</span></td>
                </tr>

                <tr>
                    <td>
                        <div class="benefit tooltip"><p>Artikel hervorheben</p>
                            <div class="tooltip-content">
                                <h4>Artikel hervorheben</h4>
                                <p>
                                    Hervorgehobene Artikel werden auf deiner Verkäufer-Seite als erstes, und farblich
                                    angezeigt.
                                </p>
                            </div>
                        </div>
                    </td>
                    <td><span class="icon"></span></td>
                    <td><span class="icon">remove</span></td>
                    <td><span class="icon">done</span></td>
                </tr>

                <tr>
                    <td>
                        <div class="benefit tooltip"><p>Servicegebühren</p>
                            <div class="tooltip-content">
                                <h4>Servicegebühren</h4>
                                <p>
                                    Die Servicegebühren berechnen wir für die bereitstellung unserer Dienste, sie werden
                                    pro Verkauf, basierend auf einem festen Prozentsatz, berechnet.
                                </p>
                            </div>
                        </div>
                    </td>
                    <td><span>10%</span></td>
                    <td><span>7%</span></td>
                    <td><span>Ab 4%</span></td>
                </tr>

                </tbody>
            </table>
        </div>

        <div class="mobile">
            <noscript>Dein Browser unterstützt kein JavaScript.</noscript>
        </div>

        <div class="legend">
            <h4>Legende:</h4>

            <div>
                <p class="icon-text"><span class="icon">done</span><span>Enthalten</span></p>
                <p class="icon-text"><span class="icon">remove</span><span>Teilweise enthalten</span></p>
            </div>
        </div>
    </section>
</main>


<?php include_once("./elements/footer.php"); ?>

</body>
</html>