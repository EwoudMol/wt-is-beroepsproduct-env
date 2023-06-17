<?php

session_start();
//TODO geen opmerkingen in de W3C validator

require_once '../database/queries.php';

//var_dump($_GET);


unset($_SESSION['passengerDetails']);
unset($_SESSION['flightDetails']);

$_SESSION['passengerDetails'] = getPassengerDetails($_GET['passengernumber']);

    if (!empty($_SESSION["passengerDetails"])) {
        $vluchtnummer = $_SESSION["passengerDetails"]["vluchtnummer"];

        $_SESSION['flightDetails'] = getFlightInformation($vluchtnummer);
    }
    header("location: ../{$_GET["sourcePassengerForm"]}");

