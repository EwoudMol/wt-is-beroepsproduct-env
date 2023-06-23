<?php

require_once './util-pages/session.php';
require_once './database/queries.php';

function retrieveRemainingSpaceFlight($flightNumber) {


    $result = getRemainingSpaceFlight($flightNumber);
    var_dump($result);

    try {
        return getRemainingSpaceFlight($flightNumber);
    } catch (Exception $error) {
        $_SESSION["messages"]["remaining-space"] = "Het ophalen van beschikbare ruimte is fout gegaan";
    }
}