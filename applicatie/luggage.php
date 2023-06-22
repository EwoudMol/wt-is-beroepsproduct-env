<?php


require_once './util-pages/session.php';
require_once './forms/search-passenger-form.php';
require_once './forms/extra-luggage-form.php';
require_once './content-blocks/flight-luggage-Info.php';
require_once './content-blocks/info-passenger.php';
require_once './content-blocks/info-single-flight.php';
require_once './content-blocks/messages.php';
require_once './database/queries.php';

if(!isset ($_SESSION["role"])) {
    header('Location: ../index.php');
}

$homePage = false;
$pageTitle = "Bagage details";

$pageContent = '';


if(($_SESSION["role"] === 'passenger')){
    $_SESSION["passengerDetails"] = getPassengerDetails($_SESSION['passengerNumber']);
    $_SESSION["flightDetails"] = getFlightInformation($_SESSION["passengerDetails"]['vluchtnummer']);
} else {
    $pageContent .= searchPassengerByNumberForm($_SERVER["REQUEST_URI"]);
    $passengerDetails = isset($_SESSION["passengerDetails"]) ? getPassengerDetails($_SESSION["passengerDetails"]["passagiernummer"]) : [];
    $flightDetails = isset($_SESSION["flightDetails"]) ? getFlightInformation($passengerDetails['vluchtnummer']) : [];
    $pageContent .= "</div>";
}


if(!empty($_SESSION["passengerDetails"])) {
    $luggageDetails = getLuggageFlightInfo($_SESSION["passengerDetails"]['vluchtnummer']);
    $_SESSION["maxLuggageLeftPassenger"] = ($luggageDetails['max_gewicht_pp'] - $_SESSION['passengerDetails']['gewicht_bagage']);


    $pageContent .= '<div class= "information-field">';
    $pageContent .= '<h2>Passagiersgegevens</h2>';
    $pageContent .= generatePassengerInformation($_SESSION["passengerDetails"]);
 //   $pageContent .= '<section class= "information-field">';
    $pageContent .= '<h2>Vluchtgegevens</h2>';
    $pageContent .= generateSingleFlightInfomation($_SESSION["flightDetails"]);
    $pageContent .= flightLugggageInfo($luggageDetails);



    if ($_SESSION["passengerDetails"]["aantal"] < $luggageDetails["max_objecten_pp"] && $_SESSION["passengerDetails"]["gewicht_bagage"] < $luggageDetails["max_gewicht_pp"]) {
        $pageContent .= extraLuggageForm();

    } else {
        $pageContent .= '<h3> Er is geen mogelijkheid om het gewicht of het aantal bagagestukken te wijzigen. </h3 >';

    }
    $pageContent .= '</div>';
}

$pageContent .= printMessages();

unset($_SESSION["passengerDetails"]);
unset($_SESSION["flightDetails"]);

include './basic-elements/base-page.php';













