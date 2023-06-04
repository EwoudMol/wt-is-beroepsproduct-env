<?php

require './content-blocks/leaving-flights-table.php';


    $homePage = false;
    $pageTitle = "Vertrek Vluchten";
    $flightDepartureTime = "11:59";
    $flightNumber = 123456;
    $gate = "A";
    $destination = "Madrid";
    $airline = "KLM";

    $flightTimes = [
        [   'flightDepartureTime' => "11:59",
            'flightNumber' => 123456,
            'gate' => "A",
            'destination' => "Dubai",
            'airline' => "KLM"
        ],
        [   'flightDepartureTime' => "11:60",
            'flightNumber' => 123457,
            'gate' => "B",
            'destination' => "Dubai",
            'airline' => "KLM"
        ],
        [   'flightDepartureTime' => "11:10",
            'flightNumber' => 123458,
            'gate' => "AC",
            'destination' => "Dubai",
            'airline' => "KLM"
        ],
        [   'flightDepartureTime' => "11:59",
            'flightNumber' => 123459,
            'gate' => "D",
            'destination' => "Dubai",
            'airline' => "KLM"
        ],
        [   'flightDepartureTime' => "11:59",
            'flightNumber' => 123460,
            'gate' => "E",
            'destination' => "Dubai",
            'airline' => "KLM"
        ],
        [   'flightDepartureTime' => "11:59",
            'flightNumber' => 123461,
            'gate' => "F",
            'destination' => "Dubai",
            'airline' => "KLM"
        ],
        [   'flightDepartureTime' => "11:59",
            'flightNumber' => 123462,
            'gate' => "G",
            'destination' => "Dubai",
            'airline' => "BA"
        ]
    ];
;
    $pageContent = generateDepartureTable($flightTimes);

include "./basic-elements/base-page.php";

?>

