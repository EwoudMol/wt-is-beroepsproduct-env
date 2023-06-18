<?php


//todo het nummer van de nieuwe vlucht komt nu terug op de pagina. Deze nog netjes renderen.
require_once '../util-pages/session.php';
require_once '../database/queries.php';
require_once 'sanitize_form_fields.php';
echo var_dump($_POST);

$postedToken = $_POST['csrf_token'];



if ($postedToken === $_SESSION['token']){
    $newFlight = sanatizeDataInput($_POST);


    $origalDepartureTime = $newFlight["depart_time"];
    $datetime = DateTime::createFromFormat("Y-m-d\TH:i", $origalDepartureTime);
    $convertedDepartureTime = $datetime->format("Y-m-d H:i");

    $newFlight["depart_time"] = $convertedDepartureTime;

    $newFlightnumber = registerNewFlight($newFlight);
    $_SESSION["newFlightnumber"] = $newFlightnumber;

    header('location: ../new-flight.php');


} else {

    die("Ongeldig verzoek. Probeer het opnieuw.");
}

