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
    <h1>Vertrek Vluchten</h1>
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
    <p>Ontworpen door: Ewoud Mol<br>
        <a href="mailto: e.mol2@student.han.nl">Stuur e-mail</a></p>
</footer>

</body>
</html>