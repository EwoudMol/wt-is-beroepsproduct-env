<?php

    $homePage = false;
    $pageTitle = "Ticket boeken";
    $seatsAvailable= 0;
    $weightAvailableLuggage = 0;


    require './forms/search-flight-by-number.php';
    require './forms/ticket-passenger-info.php';
    require './content-blocks/remaining-space-flight.php';


    $pageContent = searchFlightByNumberForm();
    $pageContent .= generateRemainingSpaceInfo();
    $pageContent .= '</section>';
    $pageContent .= generateTicketForm();


include "./basic-elements/base-page.php";

?>






