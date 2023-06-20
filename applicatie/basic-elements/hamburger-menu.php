<?php

$sideMenuItems = [
    [
        'role' => 'staff',
        'link' => '../startpage-staff.php',
        'img' => [
            'src' => '../images/home-icon.png',
            'alt' => 'Home'
        ],
        'text' => 'Startpagina medewerker'
    ],
    [
        'role' => 'passenger',
        'link' => '../startpage-passenger.php',
        'img' => [
            'src' => '../images/home-icon.png',
            'alt' => 'Home'
        ],
        'text' => 'Startpagina passagier'
    ],
    [
        'role' => 'all',
        'link' => '../leaving-flights.php',
        'img' => [
            'src' => '../images/departure-icon.png',
            'alt' => 'vertrek vluchten'
        ],
        'text' => 'Vertrek vluchten'
    ],
    [
        'role' => 'staff',
        'link' => '../book-ticket.php',
        'img' => [
            'src' => '../images/tickets-icon.png',
            'alt' => 'ticket boeken'
        ],
        'text' => 'Nieuwe<br>passagier'
    ],
    [
        'role' => 'staff',
        'link' => '../new-flight.php',
        'img' => [
            'src' => '../images/flight-icon.png',
            'alt' => 'Nieuwe vlucht'
        ],
        'text' => 'Nieuwe<br>vlucht'
    ],
    [
        'role' => 'all',
        'link' => '../luggage.php',
        'img' => [
            'src' => '../images/luggage-icon.png',
            'alt' => 'Bagage'
        ],
        'text' => 'Bagage'
    ],
    [
    'role' => 'all',
    'link' => '../util-pages/logout.php',
    'img' => [
        'src' => '../images/sign-out-icon.png',
        'alt' => 'Uitloggen'
    ],
    'text' => 'Uitloggen'
    ]
];

function createSideMenu($role) {
    global $sideMenuItems;

    $sideMenu = '
        <div>
            <label class="hamburger-menu">
                <input type="checkbox">
            </label>
            <aside class="sidebar">
                <nav id="nav-menu-staff">';

    foreach ($sideMenuItems as $sideMenuItem) {
        if ($role === $sideMenuItem['role'] || $sideMenuItem['role'] === 'all') {
            $sideMenu .= '        
                        <div class="nav-icon">
                            <a href="' . $sideMenuItem["link"] . '">
                                <img src="' . $sideMenuItem["img"]["src"] . '" alt="' . $sideMenuItem["img"]["alt"] . '">
                                <p>' . $sideMenuItem["text"] . '</p>
                            </a>
                        </div>';
        }
    }

    $sideMenu .= '     </nav>
                </aside>
            </div>';


    return $sideMenu;
}




?>
