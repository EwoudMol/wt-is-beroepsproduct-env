<?php

require_once '../util-pages/session.php';
require_once '../util-pages/validate-form-fields.php';
require_once '../database/queries.php';
require_once 'sanitize_form_fields.php';

$sanitizedInput = sanatizeDataInput($_POST);
$_SESSION["messages"] = [];
$requiredFormFields = ["user", "number","name"];
$numericFormFields = ["number"];

if (!requiredFieldsFilled($_POST, $requiredFormFields) || !validateNumericField($_POST, $numericFormFields)) {
    $_SESSION["messages"][] = "Geef geldige login gegevens";
    header('Location: ../index.php');
    exit;
}

if ($sanitizedInput["user"] === "staff" && $sanitizedInput["name"] === "test" && $sanitizedInput["number"] === '98765') {
    $_SESSION['role'] = "staff";
    $_SESSION['staffnumber'] = $sanitizedInput["number"];
    $_SESSION['name'] = $sanitizedInput["name"];

    activateCsrfToken();

    header('Location: ../startpage-staff.php');
    exit;
}

if ($sanitizedInput["user"] === "passenger") {
        try {
            $result = getPassengerLoginDetails($sanitizedInput["number"]);

            if (!empty($result) && $result["passagiernummer"] === $sanitizedInput["number"] && strtolower($result["naam"]) === $sanitizedInput["name"]) {
                $_SESSION['role'] = "passenger";
                $_SESSION['passengerNumber'] = $sanitizedInput["number"];
                $_SESSION['name'] = $sanitizedInput["name"];

                activateCsrfToken();

                header('Location: ../startpage-passenger.php');
                exit;
            } else {
                $_SESSION["messages"][] = "Geef geldige login gegevens";
            }
        } catch (Exception $error) {
            $_SESSION["messages"]["checkin"] = "Er is iets fout gegaan met de database, probeer het nog eens";
        }
}
$_SESSION["messages"]["checkin"] = "Er is iets fout gegaan met de database, probeer het nog eens";
header('Location: ../index.php');
exit;

function activateCSRFToken() {
    if (empty($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
}




