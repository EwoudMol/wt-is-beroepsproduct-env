<?php
//TODO Renderen van het ticketnummer nog inrichten.
session_start();


if(!isset ($_SESSION["role"])) {
    header('Location: ../index.php');
}






require_once './forms/search-flight-form.php';
require_once './forms/ticket-passenger-form.php';
require_once './content-blocks/remaining-space-flight.php';


if (isset($_SESSION["newTicketnumber"])) {
//    var_dump($_SESSION["newTicketnumber"]);
};

    $homePage = false;
    $pageTitle = "Ticket boeken";


    $pageContent = searchFlightByNumberForm();

if(!empty($_SESSION["flightDetails"])){
    $pageContent .= generateRemainingSpaceInfo($_SESSION["flightDetails"]);
}



    $pageContent .= generateTicketForm();
    $pageContent .= '</div>';


include "./basic-elements/base-page.php";

?>






