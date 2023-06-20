<?php


//TODO alle form validatie nog aan de server kant.

require_once '../util-pages/session.php';
require_once '../database/queries.php';
require_once 'sanitize_form_fields.php';

$postedToken = $_POST['csrf_token'];


if ($postedToken === $_SESSION['token']){
    $newLuggage = sanatizeDataInput($_POST);
    $extraLuggage = ["passengerNumber" => $newLuggage["passengerNumber"], "weight" => floatval($newLuggage["weight-extra-luggage"])];

    if($newLuggage["max_luggage_left"] < $extraLuggage["weight"]) {
        $_SESSION["messages"][] = "Bagage is te zwaar en kan niet bijgeboekt worden";
    }

    $newLuggageObjectNumber = registerNewLuggage($extraLuggage);
    $_SESSION["messages"]["newLuggageObjectNumber"] = "De koffer is opgenomen in het systeem";

    $_SESSION["newLuggageObjectNumber"] = $newLuggageObjectNumber +1;

    unset($_SESSION["passengerDetails"]);
    unset($_SESSION["flightDetails"]);

 header('location: ../luggage.php');

} else {
    die("Ongeldig verzoek. Probeer het opnieuw.");
}



