<?php

//TODO opknippen in meerdere functies?

    require_once '../util-pages/session.php';
    require_once '../database/queries.php';
    require_once 'sanitize_form_fields.php';

    $name = htmlspecialchars(strtolower($_POST["name"]));
    $number = htmlspecialchars($_POST["number"]);
    $_SESSION["messages"] = [];



if ($_POST["user"] === "staff" && $name === "test" && $number === '98765'){
    $_SESSION['role'] = "staff";
    $_SESSION['staffnumber'] = $_POST["$number"];
    $_SESSION['name'] = $_POST["name"];

    activateCsrfToken();

    header('Location: ../startpage-staff.php');

} elseif($_POST["user"] === "passenger") {

    try {
        $result = getPassengerLoginDetails($number);

        if ($result["passagiernummer"] === $number && strtolower($result["naam"]) === $name) {
            $_SESSION['role'] = "passenger";
            $_SESSION['passengerNumber'] = $number;
            $_SESSION['name'] = $name;

            activateCsrfToken();

            header('Location: ../startpage-passenger.php');
        } else {
            $_SESSION["messages"][] = "Geef geldige login gegevens";

        }
    } catch (Exception $error) {
        $_SESSION["messages"]["checkin"] = "Er is iets fout gegaan met de database, probeer het nog eens";
    }

} else {
    $_SESSION["messages"][]= "Geef geldige login gegevens";
}

header('Location: ../index.php');


function activateCSRFToken() {
    if (empty($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
};





