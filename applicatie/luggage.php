<?php

require_once './util-pages/session.php';
require_once './util-pages/array-from-url.php';
require_once './util-pages/search-passenger-number.php';
require_once './util-pages/search-flight-number.php';
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
    $passengerDetails = getPassengerDetails($_SESSION['passengerNumber']);
    $flightDetails = getFlightInformation($passengerDetails['vluchtnummer']);
} else {
    if(isset($_SERVER["QUERY_STRING"])) {
        $searchedNumber = getArrayFromURL($_SERVER["QUERY_STRING"]);

    }

    $pageContent .= searchPassengerByNumberForm();
    $passengerDetails = !empty($searchedNumber["passengernumber"]) ? retrievePassengerInformation($searchedNumber["passengernumber"]) : [];
    $flightDetails = !empty($passengerDetails["vluchtnummer"]) ? getFlightInformation($passengerDetails['vluchtnummer']) : [];
    $pageContent .= "</div>";
}

if(!empty($passengerDetails)) {
    $luggageDetails = getLuggageFlightInfo($passengerDetails["vluchtnummer"]);
    $maxLuggageLeftPassenger = ($luggageDetails['max_gewicht_pp'] - $passengerDetails['gewicht_bagage']);

    $pageContent .= '<div class= "information-field">';
    $pageContent .= '<h2>Passagiersgegevens</h2>';
    $pageContent .= generatePassengerInformation($passengerDetails);
    $pageContent .= '<h2>Vluchtgegevens</h2>';
    $pageContent .= generateSingleFlightInfomation($flightDetails);
    $pageContent .= flightLugggageInfo($luggageDetails);

    if ($passengerDetails["aantal"] < $luggageDetails["max_objecten_pp"] && $passengerDetails["gewicht_bagage"] < $luggageDetails["max_gewicht_pp"]) {
        $pageContent .= extraLuggageForm($passengerDetails['passagiernummer'], $maxLuggageLeftPassenger);

    } else {
        $pageContent .= '<h3> Er is geen mogelijkheid om het gewicht of het aantal bagagestukken te wijzigen. </h3 >';

    }
    $pageContent .= '</div>';
}

$pageContent .= printMessages();



include './basic-elements/base-page.php';













