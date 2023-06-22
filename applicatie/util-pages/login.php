<?php

//TODO opknippen in meerdere functies?

    require_once '../util-pages/session.php';
    require_once '../util-pages/validate-form-fields.php';
    require_once '../database/queries.php';
    require_once 'sanitize_form_fields.php';


    $sanitizedInput = sanatizeDataInput($_POST);
    $_SESSION["messages"] = [];

$requiredFormFields = ["user", "number","name"];
$numericFormFields = ["number"];



if (requiredFieldsFilled($_POST, $requiredFormFields) && validateNumericField($_POST, $numericFormFields)) {

    if ($sanitizedInput["user"] === "staff" && $sanitizedInput["name"] === "test" && $sanitizedInput["number"] === '98765') {
        $_SESSION['role'] = "staff";
        $_SESSION['staffnumber'] = $sanitizedInput["number"];
        $_SESSION['name'] = $sanitizedInput["name"];

        activateCsrfToken();

      header('Location: ../startpage-staff.php');

    } elseif ($sanitizedInput["user"] === "passenger") {
        try {
            $result = getPassengerLoginDetails($sanitizedInput["number"]);

            if ($result["passagiernummer"] === $sanitizedInput["number"] && strtolower($result["naam"]) === $sanitizedInput["name"]) {
                $_SESSION['role'] = "passenger";
                $_SESSION['passengerNumber'] = $sanitizedInput["number"];
                $_SESSION['name'] = $sanitizedInput["name"];

                activateCsrfToken();

               header('Location: ../startpage-passenger.php');
            } else {
                $_SESSION["messages"][] = "Geef geldige login gegevens";

            }
        } catch (Exception $error) {
            $_SESSION["messages"]["checkin"] = "Er is iets fout gegaan met de database, probeer het nog eens";
        }

    } else {
        $_SESSION["messages"][] = "Geef geldige login gegevens";

        header('Location: ../index.php');
    }
}


    function activateCSRFToken() {
        if (empty($_SESSION['token'])) {
            $_SESSION['token'] = bin2hex(random_bytes(32));
        }
    }





