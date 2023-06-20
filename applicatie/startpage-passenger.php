<?php
require_once './util-pages/session.php';

//TODO hier staat nog een knop inchecken. Ik heb nog geen idee wat deze knop moet doen. Wellicht het vullen van het tijdstip ingecheckt.
//TODO geen meldingen meer open in W3 Validator


if(!isset ($_SESSION["role"])) {
    header('Location: ../index.php');
}

require_once './content-blocks/info-passenger.php';
require_once './content-blocks/info-single-flight.php';
require_once './database/queries.php';
require_once './content-blocks/messages.php';




    $passengerDetails = getPassengerDetails($_SESSION['passengerNumber']);
    $flightDetails = getFlightInformation($passengerDetails['vluchtnummer']);

    $homePage = false;
    $namePassenger = $passengerDetails['naam'];
    $pageTitle = 'Welkom '.$namePassenger;


    $pageContent = '<div class= "information-field">';
    $pageContent .= '<h2>Uw persoongegevens</h2>';
    $pageContent .= generatePassengerInformation($passengerDetails);
    $pageContent .='<button class="button" type="button" onclick="location.href=\'../luggage.php\';">Extra bagage boeken</button>';
    $pageContent .= '</div>';
    $pageContent .= '<div class= "information-field">';
    $pageContent .= '<h2>Uw Vluchtgegevens</h2>';
    $pageContent .= generateSingleFlightInfomation($flightDetails);
    $pageContent .='<button class="button" type="button" onclick="alert(\'Checkt passagier in\')">Inchecken</button>';
    $pageContent .= printMessages();
    $pageContent .= '</div>';

include './basic-elements/base-page.php';


?>
