<?php

require_once './util-pages/session.php';
require_once './database/queries.php';

function retrieveRemainingSpaceFlight($flightNumber) {

    try {
        $result = getRemainingSpaceFlight($flightNumber);

        if(!$result) {
            $_SESSION["messages"]["remaining-space"] = "Geen vluchtgegevens gevonden, voer een bestaande vlucht in.";
        }

        return $result;
    } catch (Exception $error) {
        $_SESSION["messages"]["remaining-space"] = "Het ophalen van beschikbare ruimte is fout gegaan";
    }
}