<?php
    $pageTitle = "Nieuwe vlucht";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nieuwe vlucht</title>
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
            <h3>Maak hier een nieuwe vlucht aan:</h3>

            <form>
                <label for="destination">Bestemming:</label>
                <input type="text" id="destination" name="destination" required><br>
                <label for="gatecode">Vertrek gate:</label>
                <input type="text" id="gatecode" name="gatecode"><br>
                <label for="max_aantal">Maximum passagiers:</label>
                <input type="number" id="max_aantal" name="max_aantal" required>
                <label for="max_gewicht_pp">Maximum gewicht bagage per passagier:</label>
                <input type="number" id="max_gewicht_pp" name="max_gewicht_pp" required>
                <label for="max_totaalgewicht">Maximum totaalgewicht</label>
                <input type="number" id="max_totaalgewicht" name="max_totaalgewicht" required>
                <label for="maatschappij-code">Maatschappij</label>
                <input type="text" id="maatschappij-code" name="maatschappij-code" required>
                <label for="vertrektijd">Vertrektijd</label>
                <input type="datetime-local" id="vertrektijd" name="vertrektijd">
                <input class="button" type="submit" value="Vlucht registreren">
            </form>
        </section>
    </section>
</main>

<footer>
    <?php include "./footer.php" ?>
</footer>

</body>
</html>