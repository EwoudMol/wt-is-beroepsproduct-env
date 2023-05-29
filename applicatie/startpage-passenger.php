<?php
    $pageTitle = "Welkom passagiersnaam";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Startpagina gebruiker</title>
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
            <h2>Persoonsgegevens</h2>
            <?php include "./info-passenger.php" ?>
            <button class="button" type="button" onclick="alert('Link koffer bijboeken')">Extra bagage boeken</button>
        </section>

        <section class="information-field">
            <h2>Uw vluchtgegevens</h2>
            <?php include "./info-one-flight.php" ?>
            <button class="button" type="button" onclick="alert('Checkt passagier in')">Inchecken</button>
        </section>
    </section>
</main>

<footer>
    <?php include "./footer.php" ?>
</footer>

</body>
</html>