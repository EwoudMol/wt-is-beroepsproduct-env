<?php

require_once '../util-pages/session.php';
require_once '../util-pages/validate-form-fields.php';
require_once '../database/queries.php';
require_once 'sanitize_form_fields.php';

$postedToken = $_POST['csrf_token'];

if ($postedToken === $_SESSION['token']) {
    if(!empty($_POST["depart_time"])) {

        $_POST["depart_time"] = convertDatetimeToQuery($_POST["depart_time"]);
    }

    $newFlightDetails = sanatizeDataInput($_POST);
$requiredFormFields = ["destination", "gatecode","destination","max_passenger", "max_weight_pp", "max_totalweigth",
                        "airline", "depart_time"];
$numericFormFields = ["max_passenger", "max_weight_pp", "max_totalweigth"];

    if (requiredFieldsFilled($newFlightDetails, $requiredFormFields) && validateNumericField($newFlightDetails, $numericFormFields)) {
        try {

            $newFlightnumber = registerNewFlight($newFlightDetails);
            $_SESSION["messages"]["newFlightnumber"] = "Vlucht {$newFlightnumber} is opgenomen in het systeem";

        } catch (Exception $error) {

            $_SESSION["messages"]["newFlightnumber"] = "Er is iets fout gegaan met inboeken van de vlucht probeer het opnieuw";
        }
    }

    header('location: ../new-flight.php');
} else {
        die("Ongeldig verzoek. Probeer het opnieuw.");
}


