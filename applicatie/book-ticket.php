<?php
//TODO Renderen van het ticketnummer nog inrichten.
require_once './util-pages/session.php';


if(!isset ($_SESSION["role"])) {
    header('Location: ../index.php');
}

require_once './forms/search-flight-form.php';
require_once './forms/ticket-passenger-form.php';
require_once './content-blocks/remaining-space-flight.php';
require_once './content-blocks/error_messages.php';


    $homePage = false;
    $pageTitle = "Ticket boeken";

    $pageContent = searchFlightByNumberForm();

if(isset($_SESSION["flightDetails"])){
    $pageContent .= generateRemainingSpaceInfo($_SESSION["flightDetails"]);
    $_SESSION["remaining_places"] = $_SESSION["flightDetails"]["remaining_passengers"];
    unset($_SESSION["flightDetails"]);


}
    $pageContent .= '</div>';
    $pageContent .= generateTicketForm();
    $pageContent .= printErrorMessages();
    $pageContent .= '</div>';


if (isset($_SESSION["newTicketnumber"])) {
};

include "./basic-elements/base-page.php";

?>






