<?php

require_once './util-pages/session.php';
require_once './forms/search-flight-form.php';
require_once './util-pages/array-from-url.php';
require_once './util-pages/search-remaining-space.php';
require_once './forms/ticket-passenger-form.php';
require_once './content-blocks/remaining-space-flight.php';
require_once './content-blocks/messages.php';

if(!isset ($_SESSION["role"])) {
    header('Location: ../index.php');
}

if(isset($_SERVER["QUERY_STRING"])) {
    $searchedNumber = getArrayFromURL($_SERVER["QUERY_STRING"]);
}

    $homePage = false;
    $pageTitle = "Ticket boeken";

    $pageContent = searchFlightByNumberForm();

if(!empty($searchedNumber["flightnumber"])){
    $remainingSpace = retrieveRemainingSpaceFlight($searchedNumber["flightnumber"]);

    if(!empty($remainingSpace)) {
        $pageContent .= generateRemainingSpaceInfo($remainingSpace);
    }
}
    $pageContent .= '</div>';
    $pageContent .= generateTicketForm();
    $pageContent .= printMessages();
//    $pageContent .= '</div>';

include "./basic-elements/base-page.php";







