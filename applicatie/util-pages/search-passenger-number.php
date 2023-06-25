<?php

require_once './util-pages/session.php';
require_once './database/queries.php';

function retrievePassengerInformation($passengerNumber) {

    try {
        $result = getPassengerDetails($passengerNumber);

        if(!$result) {
            $_SESSION["messages"]["searchPassengerNumber"] = "Geen passagiersgegevens gevonden.";
        }
        return $result;

    }catch(Exception $error) {
        $_SESSION['messages']["searchPassengerNumber"] = "Het ophalen van passagiersgegevens is fout gegaan";
    }
}





