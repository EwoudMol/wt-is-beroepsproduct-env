<?php

require_once './util-pages/session.php';
require_once './forms/search-passenger-form.php';
require_once './forms/search-flight-form.php';
require_once './content-blocks/info-single-flight.php';
require_once './content-blocks/messages.php';
require_once './forms/check-in-button.php';


if(!isset($_SESSION["role"])) {
   header('Location: ../index.php');
}


$homePage = false;
$pageTitle = "Passagiersdetails";
$pageContent = searchPassengerByNumberForm();

if (!empty($_SESSION["passengerDetails"])) {
    $pageContent .= generatePassengerInformation($_SESSION["passengerDetails"]);
}
$pageContent .= '</div>';
$pageContent .= searchFlightByNumberForm();

if (!empty($_SESSION["flightDetails"])) {
    $pageContent .= generateSingleFlightInfomation($_SESSION["flightDetails"]);
    unset($_SESSION["flightDetails"]);
}

if (!empty($_SESSION["passengerDetails"])){
      if(is_null($_SESSION["passengerDetails"]["inchecktijdstip"])) {
        $pageContent .= createCheckinButton($_SESSION["passengerDetails"]["passagiernummer"]);
      }
}

$pageContent .= printMessages();
$pageContent .= '</div>';

unset($_SESSION["passengerDetails"]);


include './basic-elements/base-page.php';

?>


