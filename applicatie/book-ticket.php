<?php
    $pageTitle = "Ticket boeken";
    $seatsAvailable= 0;
    $weightAvailableLuggageLeft = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Passagier bijboeken</title>
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

        <section class="information-field">
            <h2>Vlucht zoeken</h2>
            <form>
                <label for="flightnumber"> Vluchtnummer:</label>
                <input type="number" id="flightnumber" name="flightnumber">
                <input class="button" type="submit" value="Zoeken">
            </form>

            <div id="place-left-flight">
                <p>Vrije zitplaatsen vliegtuig: $seatsAvailable</p>
                <p>Hoeveelheid bagage die nog meegenomen kan worden: $weightAvailableLuggageLeft</p>
            </div>
        </section>

        <section class="information-field">
            <h3>Ticketgegevens</h3>
            <form>
                <label for="initials">Naam</label>
                <input type="text" id="initials" name="initials" required><br>
                <label for="flightnumber1">Vluchtnummer</label>
                <input type="number" id="flightnumber1" name="flightnumber1" required><br>

                <div id="gender-choices">
                    <input type="radio" id="genderM" name="gender" value="M">
                    <label for="genderM">Man</label>
                    <input type="radio" id="genderF" name="gender" value="F">
                    <label for="genderF">Vrouw</label>
                    <input type="radio" id="genderE" name="gender" value="A">
                    <label for="genderE">Anders</label>
                </div>
                <input class="button" type="submit" value="Boek ticket">

            </form>
        </section>
    </section>
</main>

<footer>
    <?php include "./footer.php" ?>
</footer>
</body>
</html>