<?php

require_once '../util-pages/session.php';
//TODO geen opmerkingen in de W3C validator

require_once '../database/queries.php';

//var_dump($_GET);


unset($_SESSION['passengerDetails']);
unset($_SESSION['flightDetails']);

if(empty($_GET['passengernumber'])){
    $_SESSION["errors"][] = "Geef een geldig passagiersnummer";
} else {

    $_SESSION['passengerDetails'] = getPassengerDetails($_GET['passengernumber']);

    if (!empty($_SESSION["passengerDetails"])) {
        $vluchtnummer = $_SESSION["passengerDetails"]["vluchtnummer"];

        $_SESSION['flightDetails'] = getFlightInformation($vluchtnummer);
    }

}
header("location: ..{$_GET["sourcePassengerForm"]}");

