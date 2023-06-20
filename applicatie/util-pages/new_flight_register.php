<?php

require_once '../util-pages/session.php';
require_once '../database/queries.php';
require_once 'sanitize_form_fields.php';

$postedToken = $_POST['csrf_token'];

if ($postedToken === $_SESSION['token']){
    $newFlight = sanatizeDataInput($_POST);

    $newFlight["depart_time"] = convertDatetimeToQuery($newFlight["depart_time"]);

    $newFlightnumber = registerNewFlight($newFlight);

    $_SESSION["messages"]["newFlightnumber"] = "Vlucht {$newFlightnumber} is opgenomen in het systeem";

    header('location: ../new-flight.php');

} else {

    die("Ongeldig verzoek. Probeer het opnieuw.");
}

