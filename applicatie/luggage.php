<?php

require './forms/search-passenger-by-number.php';
require './forms/extra-luggage.php';
require './content-blocks/Flight-luggage-Info.php';



    $homePage = false;
    $pageTitle = "Bagage bijboeken";
    $numberPassenger = 123456;
    $namePassenger = "Piet";
    $genderPassenger = "M";
    $amountLuggage = 2;
    $flightNumber = 12;
    $destination = "Madrid";
    $weightAvailableLuggageLeft = 0;
    $maxAmountLuggageAirline = 1;

    $pageContent = searchPassengerByNumberForm();
    $pageContent .= flightLugggageInfo();
    $pageContent .= extraLuggageForm();


include './basic-elements/base-page.php';













