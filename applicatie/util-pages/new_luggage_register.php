<?php

require_once '../util-pages/session.php';
require_once '../util-pages/validate-form-fields.php';
require_once '../database/queries.php';
require_once 'sanitize_form_fields.php';

$postedToken = $_POST['csrf_token'];
$requiredFormFields = ["weight-extra-luggage"];
$numericFormFields = ["weight-extra-luggage"];
$newLuggage = sanatizeDataInput($_POST);


if ($postedToken === $_SESSION['token']){
    if (requiredFieldsFilled($newLuggage, $requiredFormFields) && validateNumericField($newLuggage, $numericFormFields)) {
        try {
            $extraLuggage = ["passengerNumber" => $newLuggage["passengerNumber"], "weight" => floatval($newLuggage["weight-extra-luggage"])];

            if (floatval($newLuggage["max_luggage_left"]) < $extraLuggage["weight"]) {
                $_SESSION["messages"][] = "Totale bagage is te zwaar en kan niet bijgeboekt worden";
            } else {
                $newLuggageObjectNumber = registerNewLuggage($extraLuggage);
                $_SESSION["messages"]["newLuggage"] = "De koffer is opgenomen in het systeem";
            }
        } catch (Exception $error) {
            $_SESSION["messages"]["newLuggage"] = "Er is iets fout gegaan bij het inboeken van de extra bagage.";
        }
    }


    header('location: ../luggage.php');

} else {
    die("Ongeldig verzoek. Probeer het opnieuw.");
}



