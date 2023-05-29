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
    <h1>Ticket boeken</h1>
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
    <label class="hamburger-menu">
        <input type="checkbox" />
    </label>
    <aside class="sidebar">
        <nav>
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

    <section class="page-content">
        <section class="information-field">
            <h2>Vlucht zoeken</h2>
            <form>
                <label for="flightnumber"> Vluchtnummer:</label>
                <input type="number" id="flightnumber" name="flightnumber">
                <input class="button" type="submit" value="Zoeken">
            </form>

            <div id="place-left-flight">
                <p>Vrije zitplaatsen vliegtuig: </p>
                <p>Hoeveelheid bagage die nog meegenomen kan worden: </p>
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
    <p>Ontworpen door: Ewoud Mol<br>
        <a href="mailto: e.mol2@student.han.nl">Stuur e-mail</a></p>
</footer>
</body>
</html>