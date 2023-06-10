<?php



    require './content-blocks/info-passenger.php';
    require './content-blocks/info-single-flight.php';

    $homePage = false;
    $pageTitle = "Welkom passagiersnaam";
    $numberPassenger = 123;
    $namePassenger = "Ans";
    $genderPassenger = "V";
    $amountLuggage = 2;
    $flightNumber = 123;
    $destination = "Dubai";
    $gate = 12;
    $departureTime = "11:15";
    $airline = "BA";




    $pageContent = '<section class= "information-field">';
    $pageContent .= '<h2>Uw persoongegevens</h2>';
    $pageContent .= generatePassengerInformation();
    $pageContent .='<button class="button" type="button" onclick="alert("Link koffer bijboeken")">Extra bagage boeken</button>';
    $pageContent .= '</section>';
    $pageContent .= '<section class= "information-field">';
    $pageContent .= '<h2>Uw Vluchtgegevens</h2>';
    $pageContent .= generateSingleFlightInfomation();
    $pageContent .='<button class="button" type="button" onclick="alert("Checkt passagier in")">Inchecken</button>';
    $pageContent .= '</section>';

include './basic-elements/base-page.php';


?>
