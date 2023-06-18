<?php
//TODO geen opmerkingen in de W3C validator

require_once '../util-pages/session.php';
require_once '../database/queries.php';

unset($_SESSION['passengerDetails']);
unset($_SESSION['flightDetails']);


if(empty($_GET['passengernumber'])){
    $_SESSION["errors"][] = "Geef een geldig passagiersnummer";
} else {

    $_SESSION['passengerDetails'] = getPassengerDetails($_GET['passengernumber']);

    if (!empty($_SESSION["passengerDetails"])) {
        $vluchtnummer = $_SESSION["passengerDetails"]["vluchtnummer"];
        $_SESSION['flightDetails'] = getFlightInformation($vluchtnummer);

    }else {
            $_SESSION["errors"][] = "Geen passagier gevonden";
        }
    }

header("location: ..{$_GET["sourcePassengerForm"]}");

