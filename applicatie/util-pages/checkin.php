<?php

require_once '../util-pages/session.php';
require_once '../database/queries.php';

$cleanedSource = str_replace("/", "", $_POST["source"]);
$postedToken = $_POST['csrf_token'];

if ($postedToken === $_SESSION['token']){
    try {
        registerCheckin($_POST["passengerNumber"]);

        if ($cleanedSource === "startpage-staff.php") {
            $_SESSION["messages"]["checkin"] = "De passagier is ingecheckt";
        } else {
            $_SESSION["messages"]["checkin"] = "U bent ingecheckt";
        }
    } catch (Exception $error) {
        $_SESSION["messages"]["checkin"] = "Er is een fout opgetreden bij het inchecken";
    }

    header("location: ../{$cleanedSource}");
} else {

    die("Ongeldig verzoek. Probeer het opnieuw.");
}