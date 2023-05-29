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
    <h1>Koffers bijboeken</h1>
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
    <section class="page-content">
        <label class="hamburger-menu">
            <input type="checkbox" />
        </label>
        <aside class="sidebar">
            <nav id="nav-menu-staff">
                <div class="nav-icon">
                    <a href="startpage-staff.php">
                        <img src="./images/home-icon.png" alt="Home">
                        <p>Startpagina medewerker</p>
                    </a>
                </div>
                <div class="nav-icon">
                    <a href="startpage-passenger.php">
                        <img src="./images/home-icon.png" alt="Home">
                        <p>Startpagina passagier</p>
                    </a>
                </div>
                <div class="nav-icon">
                    <a href="leaving-flights.php">
                        <img src="./images/departure-icon.png" alt="vertrek vluchten">
                        <p>Vertrek vluchten</p>
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
                <section class="actual-information">
                    <p>naam passagier: </p>
                    <p>Geslacht:</p>
                    <p>Passagiersnummer:</p>
                    <p>Stuks bagage:</p>
                </section>
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
    <p>Ontworpen door: Ewoud Mol<br>
        <a href="mailto: e.mol2@student.han.nl">Stuur e-mail</a></p>
</footer>

</body>
</html>