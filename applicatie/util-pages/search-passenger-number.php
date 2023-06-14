<?php

session_start();


require '../database/queries.php';

unset($_SESSION['passengerDetails']);
unset($_SESSION['flightDetails']);

$_SESSION['passengerDetails'] = getPassengerDetails($_GET['passengernumber']);

    if (!empty($_SESSION["passengerDetails"])) {
        $vluchtnummer = $_SESSION["passengerDetails"]["vluchtnummer"];

        $_SESSION['flightDetails'] = getFlightInformation($vluchtnummer);
    }

    header('location: ../startpage-staff.php');

?>

