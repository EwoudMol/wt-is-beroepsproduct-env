<?php

session_start();
var_dump($_SESSION);

require './forms/search-passenger-by-number.php';
require './forms/search-flight-by-number.php';
require './content-blocks/info-single-flight.php';

    $homePage = false;
    $pageTitle = "Passagiersdetails";
    $numberPassenger = 1;
    $namePassenger = "Ans";
    $genderPassenger = "V";
    $amountLuggage = 2;
    $flightNumber = 123;
    $destination = "Dubai";
    $gate = 12;
    $departureTime = "11:15";
    $airline = "BA";

$pageContent = searchPassengerByNumberForm();
$pageContent .= '</section>';
$pageContent .= searchFlightByNumberForm();
$pageContent .= generateSingleFlightInfomation();
$pageContent .='<button class="button" type="button" onclick="alert("Checkt passagier in")">Inchecken</button>';
$pageContent .= '</section>';




include './basic-elements/base-page.php';

?>


