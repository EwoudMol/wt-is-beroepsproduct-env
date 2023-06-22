<?php

require_once './util-pages/session.php';
require_once './database/queries.php';



function retrievePassengerInformation($passengerNumber) {

    try {
        return getPassengerDetails($passengerNumber);
    }catch(Exception $error) {
        $_SESSION['messages']["searchPassengerNumber"] = "Het ophalen van passagiersgegevens is fout gegaan";
    }
}





