<?php

require './forms/search-passenger-form.php';
require './forms/extra-luggage-form.php';
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













