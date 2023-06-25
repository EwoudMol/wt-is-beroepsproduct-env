<?php

require_once './util-pages/session.php';
require_once './database/queries.php';



function retrieveFlightInformation($flightNumber) {
    try {
        $result = getFlightInformation($flightNumber);

        if(!$result) {
            $_SESSION["messages"]["searchFlightNumber"] = "Geen vluchtgegevens gevonden.";
        }
        return $result;

        return getFlightInformation($flightNumber);
    } catch (Exception $error) {
        $_SESSION['messages']["searchFlightNumber"] = "Het ophalen van vluchtgegevens is fout gegaan";
    }
}






