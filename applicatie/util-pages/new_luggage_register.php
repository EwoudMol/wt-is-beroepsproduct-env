<?php

session_start();

//TODO verwerk het nieuwe object nummer nog netjes
//TODO alle form validatie nog aan de server kant.

require_once '../database/queries.php';
$extraLuggage = ["passengerNumber" => $_POST["passengerNumber"], "weight" => floatval($_POST["weight-extra-luggage"])];
$postedToken = $_POST['csrf_token'];

if ($postedToken === $_SESSION['token']){
    $newLuggageObjectNumber = registerNewLuggage($extraLuggage);
 //   var_dump($newLuggageObjectNumber);
    $_SESSION["newLuggageObjectNumber"] = $newLuggageObjectNumber +1;

    unset($_SESSION["passengerDetails"]);
    unset($_SESSION["flightDetails"]);


    header('location: ../luggage.php');

} else {
    die("Ongeldig verzoek. Probeer het opnieuw.");
}



