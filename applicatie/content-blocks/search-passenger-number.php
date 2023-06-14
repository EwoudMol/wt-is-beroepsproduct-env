<?php

session_start();


require '../database/queries.php';

//TODO vragen aan John of het logischer is om 1 of twee queries te doen in dit geval?

    $_SESSION['passengerDetails'] = getPassengerDetails($_GET['passengernumber']);

    if (!empty($_SESSION["passengerDetails"])) {
        $vluchtnummer = $_SESSION["passengerDetails"]["vluchtnummer"];

        $_SESSION['flightDetails'] = getFlightInformation($vluchtnummer);
    }

    header('location: ../startpage-staff.php');

?>

