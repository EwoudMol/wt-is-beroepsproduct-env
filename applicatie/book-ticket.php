<?php

session_start();
//TODO Renderen van het ticketnummer nog inrichten.
if (isset($_SESSION["newTicketnumber"])) {
    var_dump($_SESSION["newTicketnumber"]);
};

    $homePage = false;
    $pageTitle = "Ticket boeken";

    require './forms/search-flight-form.php';
    require './forms/ticket-passenger-form.php';
    require './content-blocks/remaining-space-flight.php';


    $pageContent = searchFlightByNumberForm();
    $pageContent .= generateRemainingSpaceInfo($_SESSION["flightDetails"]);
    $pageContent .= '</section>';
    $pageContent .= generateTicketForm();


include "./basic-elements/base-page.php";

?>






