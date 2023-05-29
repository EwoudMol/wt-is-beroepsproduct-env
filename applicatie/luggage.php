<?php
    $pageTitle = "Bagage bijboeken";
    $namePassenger = "Piet";
    $sexePassenger = "M";
    $numberPassenger = 123456;
    $amountLuggage = 2;
    $bookedFlight = 12;
    $destination = "Madrid";
    $weightAvailableLuggageLeft = 0;
    $maxAmountLuggageAirline = 1;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bagage boeken</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/style-hamburger-menu.css">
    <link rel="icon" href="images/airport-icon.png">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Wix+Madefor+Display:wght@400;600;700;800&display=swap');
    </style>
</head>
<body>
<header>
    <?php include "./header.php" ?>
</header>

<main>
    <section class="page-content">
        <?php include "./hamburger-menu.php" ?>

        <!--            TODO: volledige pagina nog opmaken-->
        <section class="page-content" id="luggage-page">
            <section class="information-field">
                <p >Op deze pagina moet afhankelijk van de rol een menu gerenderd worden. Of het menu in de header, of op de pagina.<br>
                    Afhankelijk van de rol moet ook de class in de main aangepast worden?<p>
                <form>
                    <label for="passengernumber"> Passagiersnummer:</label>
                    <input type="number" id="passengernumber" name="passengernumber">
                    <input class="button" type="submit" value="Zoeken">
                </form>
            </section>

            <section class="information-field">
                <h2>Persoonsgegevens</h2>
                <?php include "./info-passenger.php" ?>
            </section>

            <section class="information-field">
                <h2>Vluchtgegevens</h2>
                <section class="actual-information">
                    <p>Vluchtnummer: </p>
                    <p>Bestemming:</p>
                    <p>Resterende kilo's:</p>
                    <p>Maximum aantal stuks bagage per passagier:</p>
                </section>
            </section>

            <section class="information-field">
                <h2>Extra koffer</h2>
                <form>
                    <label for="weight-extra-luggage">Gewicht extra koffer:</label>
                    <input type="number" id="weight-extra-luggage" name="gewicht-koffer">
                    <input class="button" type="submit" value="Extra bagage inboeken">
                </form>
            </section>
        </section>
    </section>
</main>


<footer>
 <?php include "./footer.php" ?>
</footer>
</body>
</html>