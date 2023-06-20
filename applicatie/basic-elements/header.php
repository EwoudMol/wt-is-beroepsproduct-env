<?php

//De menu items in de header zijn alleen zichtbaar als de gebruiker niet is ingelogd.

$headerMenuItems = [
    [
        'onHomePage' => true,
        'link' => '../leaving-flights.php',
        'img' => [
            'src' => '../images/departure-icon.png',
            'alt' => 'Vertrekkende vlucht'
        ],
        'text' => 'Vertrek vluchten'
    ],
    [
        'onHomePage' => false,
        'link' => '../index.php',
        'img' => [
            'src' => '../images/home-icon.png',
            'alt' => 'Home'
        ],
        'text' => 'Home'
    ]
];

function createHeaderMenu() {
    global $headerMenuItems;
    $isActivePageHomePage = ($_SERVER["REQUEST_URI"] === "/index.php"||$_SERVER["REQUEST_URI"] === "/" );

    $headerMenu = '
        <nav>
            <div class="nav-icon">';

    foreach ($headerMenuItems as $headerMenuItem) {
        if ($isActivePageHomePage === $headerMenuItem['onHomePage']){
            $headerMenu .= '
            <a href="' . $headerMenuItem["link"] . '">
                <img src="' . $headerMenuItem["img"]["src"] . '" alt="' . $headerMenuItem["img"]["alt"] . '">
                <p>' . $headerMenuItem["text"] . '</p>
            </a>';
        }
    }

    $headerMenu .= '
            </div>
        </nav>';

    return $headerMenu;
}






