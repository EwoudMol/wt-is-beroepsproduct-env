<?php

session_start();

require_once '../database/queries.php';

unset($_SESSION['passengerDetails']);
unset($_SESSION['flightDetails']);

//var_dump($_GET);

if($_GET["source"] === "/book-ticket.php"){
    $_SESSION['flightDetails'] = getRemainingSpaceFlight($_GET['flightnumber']);
} else {
    $_SESSION['flightDetails'] = getFlightInformation($_GET['flightnumber']);
}

//var_dump($_SESSION['flightDetails']);

header("location: ../{$_GET["source"]}");

