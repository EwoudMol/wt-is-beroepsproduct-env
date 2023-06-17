<?php
session_start();

//todo het nummer van de nieuwe vlucht komt nu terug op de pagina. Deze nog netjes renderen.

require_once '../database/queries.php';
echo var_dump($_POST);


$postedToken = $_POST['csrf_token'];



if ($postedToken === $_SESSION['token']){
    $newFlight = $_POST;

    $origalDepartureTime = $newFlight["depart_time"];
    $datetime = DateTime::createFromFormat("Y-m-d\TH:i", $origalDepartureTime);

    $convertedDepartureTime = $datetime->format("Y-m-d H:i");

    $newFlight["depart_time"] = $convertedDepartureTime;
    var_dump("----- {$convertedDepartureTime}");



    $newFlightnumber = registerNewFlight($newFlight);
    $_SESSION["newFlightnumber"] = $newFlightnumber;

    header('location: ../new-flight.php');

 //   echo var_dump($newFlightnumber);
 //   echo var_dump($_SESSION["newFlightnumber"]);

} else {
    die("Ongeldig verzoek. Probeer het opnieuw.");
}

