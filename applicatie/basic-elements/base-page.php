<?php
//Dit is de basis pagina met algemene gegevens die voor elke pagina gebruikt wordt.
//Op de andere pagina's wordt de pagecontent gevuld.

    require_once 'hamburger-menu.php';
    require_once 'header.php';

    $headerMenu = '';
    $sideMenu = '';

    if(!isset ($_SESSION["role"])) {
        $headerMenu = createHeaderMenu();
    } else {
        $sideMenu = createSideMenu($_SESSION["role"]);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gelre Airport Home</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../css/style-hamburger-menu.css">
    <link rel="icon" href="../images/airport-icon.png">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Wix+Madefor+Display:wght@400;600;700;800&display=swap');
    </style>
</head>

<body>

    <header>
        <h1><?php  echo $pageTitle ?></h1>
        <?= $headerMenu ?>
    </header>

    <main>
        <div class="page-content">
            <?= $sideMenu ?>
            <?= $pageContent ?>
        </div>
    </main>

    <footer>
        <?php include "footer.php" ?>
    </footer>

</body>