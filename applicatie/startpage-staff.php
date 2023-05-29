<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Landingpagina medewerker</title>
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
    <h1>Passagiersdetails</h1>
    <nav>
        <div class="nav-icon">
            <a href="index.php">
                <img src="./images/sign-out-icon.png" alt="Uitloggen">
                <p>Uitloggen</p>
            </a>
        </div>
    </nav>
</header>

<main>
    <div id="side-menu">
        <label class="hamburger-menu">
            <input type="checkbox" />
        </label>
        <aside class="sidebar">
            <nav id="nav-menu-staff">
                <div class="nav-icon">
                    <a href="startpage-staff.php">
                        <img src="./images/home-icon.png" alt="Home">
                        <p>Startpagina</p>
                    </a>
                </div>
                <div class="nav-icon">
                    <a href="leaving-flights.php">
                        <img src="./images/departure-icon.png" alt="vertrek vluchten">
                        <p>Vertrek<br>vluchten</p>
                    </a>
                </div>
                <div class="nav-icon">
                    <a href="book-ticket.php">
                        <img src="./images/tickets-icon.png" alt="ticket boeken">
                        <p>Nieuwe<br>passagier</p>
                    </a>
                </div>
                <div class="nav-icon">
                    <a href="new-flight.php">
                        <img src="./images/flight-icon.png" alt="Nieuwe vlucht">
                        <p>Nieuwe<br>vlucht</p>
                    </a>
                </div>
                <div class="nav-icon">
                    <a href="luggage.php">
                        <img src="./images/luggage-icon.png" alt="Bagage">
                        <p>Bagage</p>
                    </a>
                </div>
            </nav>
        </aside>
    </div>

    <section class="page-content">
        <section class="information-field">
            <h3>Persoonsgegevens</h3>
            <form>
                <label for="passengernumber"> Passagiersnummer:</label>
                <input type="number" id="passengernumber" name="passengernumber">
                <label for="passenger-name"> Naam:</label>
                <input type="text" id="passenger-name" name="passengername">
                <input class="button" type="submit" value="Zoeken">
            </form>


            <section class="actual-information">
                <p>Passagiersnummer:</p>
                <p>Naam passagier: </p>
                <p>Geslacht:</p>
                <p>Hoeveelheid bagage:</p>
            </section>
        </section>

        <section class="information-field">
            <h3>Vluchtdata</h3>
            <form>
                <label for="flightnumber">Vluchtnummer</label>
                <input type="number" id="flightnumber" name="flightnumber">
                <input class="button" type="submit" value="Zoeken">
            </form>

            <section class="actual-information">
                <p>Vluchtnummer: </p>
                <p>Bestemming:</p>
                <p>Gate:</p>
                <p>Vertrektijd:</p>
                <p>Maatschappij:</p>
            </section>

            <button class="button" type="button" onclick="alert('Link koffer bijboeken')">Extra bagage boeken</button>
        </section>
    </section>
</main>



<footer>
    <p>Ontworpen door: Ewoud Mol<br>
        <a href="mailto: e.mol2@student.han.nl">Stuur e-mail</a></p>
</footer>


</body>
</html>

