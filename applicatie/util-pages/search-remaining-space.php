<?php

require_once './util-pages/session.php';
require_once './database/queries.php';

function retrieveRemainingSpaceFlight($flightNumber) {
    try {
        return getRemainingSpaceFlight($flightNumber);
    } catch (Exception $error) {
        $_SESSION["messages"]["remaining-space"] = "Het ophalen van beschikbare ruimte is fout gegaan";
    }
}