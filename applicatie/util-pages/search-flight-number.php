<?php

require_once '../util-pages/session.php';
require_once '../database/queries.php';

unset($_SESSION['passengerDetails']);
unset($_SESSION['flightDetails']);


if(empty($_GET['flightnumber'])){
    $_SESSION["errors"][] = "Geef een geldig vluchtnummer";
} else {

    $cleanedSource = str_replace("/", "", $_GET["source"]);

    if ($cleanedSource === "book-ticket.php") {
        $_SESSION['flightDetails'] = getRemainingSpaceFlight($_GET['flightnumber']);

    } else {
        $_SESSION['flightDetails'] = getFlightInformation($_GET['flightnumber']);

        if (empty($_SESSION['flightDetails'])){
            $_SESSION["errors"][] = "Geen vlucht gevonden";
        }
    }
}

header("location: ../{$_GET["source"]}");

