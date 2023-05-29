<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gelre Airport Home</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="icon" href="images/airport-icon.png">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Wix+Madefor+Display:wght@400;600;700;800&display=swap');
    </style>
</head>

<body>
<header>
    <h1>Welkom bij Gelre Airport</h1>
    <nav>
        <div class="nav-icon">
            <a href="leaving-flights.php">
                <img src="./images/departure-icon.png" alt="vertrek vluchten">
                <p>Vertrek vluchten</p>
            </a>
        </div>
    </nav>
</header>

<main>
    <section class="page-content">
        <section class="information-field">
            <h2>Inloggen</h2>

            <form id="login-form">
                <label for="user">Soort gebruiker:</label>
                <select id="user" name="user">
                    <option value="passenger">Passagier</option>
                    <option value="operator">Medewerker</option>
                </select><br>
                <label for="passengernumber"> Passagiersnummer:</label>
                <input type="text" id="passengernumber" name="passengernumber" pattern="[0-9]{6}" placeholder="123456"><br>
                <input class="button" type="submit" value="Inloggen">
            </form>
        </section>
    </section>
</main>

<section>
    <!--            TODO Verwijderen na toepassen PHP.-->
    <a href="startpage-passenger.php">Startpagina gebruiker</a><br>
    <a href="startpage-staff.php">Startpagina medewerker</a><br>
</section>

<footer>
    <p>Ontworpen door: Ewoud Mol<br>
        <a href="mailto: e.mol2@student.han.nl">Stuur e-mail</a></p>
</footer>
</body>
</html>