<?php
//TODO de boodschap terug renderen

session_start();

require_once './forms/search-passenger-form.php';
require_once './forms/extra-luggage-form.php';
require_once './content-blocks/Flight-luggage-Info.php';
require_once './content-blocks/info-passenger.php';
require_once './content-blocks/info-single-flight.php';
require_once './database/queries.php';

$homePage = false;
$pageTitle = "Bagage details";


$pageContent = '';


if(($_SESSION["role"] === 'passenger')){
    $_SESSION["passengerDetails"] = getPassengerDetails($_SESSION['passengerNumber']);
    $_SESSION["flightDetails"] = getFlightInformation($_SESSION["passengerDetails"]['vluchtnummer']);
} else {
    $pageContent .= searchPassengerByNumberForm($_SERVER["REQUEST_URI"]);


    $passengerDetails = empty($_SESSION["passengerDetails"]) ? getPassengerDetails($_SESSION['passengerNumber']) : [];
    $flightDetails = empty($_SESSION["flightDetails"]) ? getFlightInformation($passengerDetails['vluchtnummer']) : [];
}


if(!empty($_SESSION["passengerDetails"])) {
    $luggageDetails = getLuggageFlightInfo($_SESSION["passengerDetails"]['vluchtnummer']);

    $pageContent .= '<div class= "information-field">';
    $pageContent .= '<h2>Uw persoongegevens</h2>';
    $pageContent .= generatePassengerInformation($_SESSION["passengerDetails"]);
    //$pageContent .= '<section class= "information-field">';
    $pageContent .= '<h2>Uw Vluchtgegevens</h2>';
    $pageContent .= generateSingleFlightInfomation($_SESSION["flightDetails"]);
    $pageContent .= flightLugggageInfo($luggageDetails);


    if ($_SESSION["passengerDetails"]["aantal"] < $luggageDetails["max_objecten_pp"] && $_SESSION["passengerDetails"]["gewicht_bagage"] < $luggageDetails["max_gewicht_pp"]) {
        $pageContent .= extraLuggageForm();
    } else {
        $pageContent .= '
            <div class= "information-field">
                <h3 > Er is geen mogelijkheid om het gewicht of het aantal bagagestukken te wijzigen. </h3 >
            </div >';
    }
}

if(isset($_SESSION["newLuggageObjectNumber"])) {
    var_dump($_SESSION["newLuggageObjectNumber"]);
    echo "Bagageobject {$_SESSION["newLuggageObjectNumber"]} ingeboekt";
    unset($_SESSION["newLuggageObjectNumber"]);
}

include './basic-elements/base-page.php';













