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
    <h1>Nieuwe vlucht</h1>
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
    <section class="page-content">

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
    <p>Ontworpen door: Ewoud Mol<br>
        <a href="mailto: e.mol2@student.han.nl">Stuur e-mail</a></p>
</footer>

</body>
</html>