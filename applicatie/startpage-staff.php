<?php

session_start();

require './forms/search-passenger-by-number.php';
require './forms/search-flight-by-number.php';
require './content-blocks/info-single-flight.php';

    $homePage = false;
    $pageTitle = "Passagiersdetails";



$pageContent = searchPassengerByNumberForm();

if (isset($_SESSION["passengerDetails"])) {
    $pageContent .= generatePassengerInformation($_SESSION["passengerDetails"]);
}
$pageContent .= '</section>';
$pageContent .= searchFlightByNumberForm();

if (isset($_SESSION["flightDetails"])) {
    $pageContent .= generateSingleFlightInfomation($_SESSION["flightDetails"]);
}

//$pageContent .='<button class="button" type="button" onclick="alert("Checkt passagier in")">Inchecken</button>';
//$pageContent .= '</section>';



include './basic-elements/base-page.php';

?>


