<?php
require_once './util-pages/session.php';

require_once './content-blocks/info-passenger.php';
require_once './content-blocks/info-single-flight.php';
require_once './database/queries.php';
require_once './content-blocks/messages.php';
require_once './forms/check-in-button.php';

if(!isset ($_SESSION["role"])) {
    header('Location: ../index.php');
}

    $passengerDetails = getPassengerDetails($_SESSION['passengerNumber']);
    $homePage = false;
    $pageTitle = 'Welkom '.$passengerDetails['naam'];
    $flightDetails = getFlightInformation($passengerDetails['vluchtnummer']);

if(!is_null($passengerDetails["inchecktijdstip"])) {
    $passengerDetails["inchecktijdstip"] = convertDatetimeToApplication($passengerDetails["inchecktijdstip"]);
};

    $pageContent = '<div class= "information-field">';
    $pageContent .= '<h2>Uw persoongegevens</h2>';
    $pageContent .= generatePassengerInformation($passengerDetails);
    $pageContent .='<button class="button" type="button" onclick="location.href=\'../luggage.php\';">Extra bagage boeken</button>';
    $pageContent .= '</div>';
    $pageContent .= '<div class= "information-field">';
    $pageContent .= '<h2>Uw Vluchtgegevens</h2>';
    $pageContent .= generateSingleFlightInfomation($flightDetails);

if (!empty($passengerDetails)) {
    if (is_null($passengerDetails["inchecktijdstip"])) {
        $pageContent .= createCheckinButton($passengerDetails["passagiernummer"]);
    }
}

    $pageContent .= printMessages();
    $pageContent .= '</div>';

include './basic-elements/base-page.php';
