<?php
    $pageTitle = "Vertrek Vluchten"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vluchtgegevens</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style-hamburger-menu.css">
    <link rel="stylesheet" href="css/stylesheet.css">
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
    <?php include "./hamburger-menu.php" ?>

    <section id="page-content-flight">
        <h2>Overzicht van de vertrekkende vluchten</h2>
        <table>
            <thead>
            <tr>
                <th class="prio-1">Vertrektijd</th>
                <th class="prio-1">Vlucht</th>
                <th class="prio-1">Gate</th>
                <th class="prio-1">Bestemming</th>
                <th class="prio-3">Maatschappij</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="prio-1">11:11</td>
                <td class="prio-1">12345</td>
                <td class="prio-1">12</td>
                <td class="prio-1">Madrid</td>
                <td class="prio-3">KLM</td>
            </tr>
            <tr>
                <td class="prio-1">11:11</td>
                <td class="prio-1">12345</td>
                <td class="prio-1">12</td>
                <td class="prio-1">Madrid</td>
                <td class="prio-3">KLM</td>
            </tr>
            </tbody>
        </table>
    </section>
</main>

<footer>
    <?php include "./footer.php" ?>
</footer>

</body>
</html>