<?php
    session_start();

    require './content-blocks/info-passenger.php';
    require './content-blocks/info-single-flight.php';
    require './database/queries.php';

//TODO vragen aan John of het logischer is om 1 of twee queries te doen in dit geval?
//Nu doe ik er twee.

    $passengerDetails = getPassengerDetails($_SESSION['number']);
    $flightDetails = getFlightInformation($passengerDetails['vluchtnummer']);

    $homePage = false;
    $namePassenger = $passengerDetails['naam'];
    $pageTitle = 'Welkom '.$namePassenger;


    $pageContent = '<section class= "information-field">';
    $pageContent .= '<h2>Uw persoongegevens</h2>';
    $pageContent .= generatePassengerInformation($passengerDetails);
    $pageContent .='<button class="button" type="button" onclick="alert("Link koffer bijboeken")">Extra bagage boeken</button>';
    $pageContent .= '</section>';
    $pageContent .= '<section class= "information-field">';
    $pageContent .= '<h2>Uw Vluchtgegevens</h2>';
    $pageContent .= generateSingleFlightInfomation($flightDetails);
    $pageContent .='<button class="button" type="button" onclick="alert("Checkt passagier in")">Inchecken</button>';
    $pageContent .= '</section>';

include './basic-elements/base-page.php';


?>
