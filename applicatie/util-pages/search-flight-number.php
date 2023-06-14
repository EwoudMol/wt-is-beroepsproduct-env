<?php

session_start();


require '../database/queries.php';

unset($_SESSION['passengerDetails']);
unset($_SESSION['flightDetails']);


if($_POST["fromPage"] === "/book-ticket.php"){
    $_SESSION['flightDetails'] = getRemainingSpaceFlight($_POST['flightnumber']);
} else {
    $_SESSION['flightDetails'] = getFlightInformation($_POST['flightnumber']);
}

header('location:' .$_POST["fromPage"]);


