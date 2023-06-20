<?php

require_once '../util-pages/session.php';
require_once '../database/queries.php';

unset($_SESSION['passengerDetails']);
unset($_SESSION['flightDetails']);

$cleanedSource = str_replace("/", "", $_GET["source"]);

if(empty($_GET['flightnumber'])){
    $_SESSION["messages"][] = "Geef een geldig vluchtnummer";
} else {

    if ($cleanedSource === "book-ticket.php") {
        try {
            $_SESSION['flightDetails'] = getRemainingSpaceFlight($_GET['flightnumber']);
        }catch (Exception $error) {
            $_SESSION['messages'] = "Het ophalen van gegevens is fout gegaan";
        }
    } else {
        try {
            $_SESSION['flightDetails'] = getFlightInformation($_GET['flightnumber']);
        }catch (Exception $error) {
            $_SESSION['messages'] = "Het ophalen van vluchtgegevens is fout gegaan";
        }

        if (empty($_SESSION['flightDetails'])){
            $_SESSION["messages"][] = "Geen vlucht gevonden";
        }
    }
}

header("location: ../{$cleanedSource}");

