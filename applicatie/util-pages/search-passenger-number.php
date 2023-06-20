<?php

//TODO geen opmerkingen in de W3C validator
//TODO alle form validatie nog aan de server kant.


require_once '../util-pages/session.php';
require_once '../database/queries.php';

unset($_SESSION['passengerDetails']);
unset($_SESSION['flightDetails']);


if(empty($_GET['passengernumber'])){
    $_SESSION["messages"][] = "Geef een geldig passagiersnummer";
} else {

    $_SESSION['passengerDetails'] = getPassengerDetails($_GET['passengernumber']);

    if (!empty($_SESSION["passengerDetails"])) {
        $vluchtnummer = $_SESSION["passengerDetails"]["vluchtnummer"];
        $_SESSION['flightDetails'] = getFlightInformation($vluchtnummer);

    }else {
            $_SESSION["messages"][] = "Geen passagier gevonden";
        }
    }

header("location: ..{$_GET["sourcePassengerForm"]}");

