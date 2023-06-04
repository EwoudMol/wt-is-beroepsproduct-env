<?php

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
        <?php include "header.php" ?>
    </header>

    <main>
        <section class="page-content">
            <?php include "hamburger-menu.php" ?>
            <?php echo $pageContent ?>
        </section>
    </main>

    <footer>
        <?php include "footer.php" ?>
    </footer>

</body>