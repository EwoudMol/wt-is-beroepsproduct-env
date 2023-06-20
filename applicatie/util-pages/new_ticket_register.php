<?php

//TODO alle form validatie nog aan de server kant.

require_once '../util-pages/session.php';
require_once '../util-pages/sanitize_form_fields.php';
require_once '../database/queries.php';

$postedToken = $_POST['csrf_token'];
$messages = [];


function randomSeatGenerator(){
    $letters =['A', 'B', 'C', 'D', 'E', 'F','G','H','I'];
    $randomLetter = $letters[array_rand($letters)];
    $randomNumber = str_pad(rand(1,36),2,'0', STR_PAD_LEFT);
    return $randomLetter . $randomNumber;
}



if ($postedToken === $_SESSION['token']){
    if($_SESSION["remaining_places"] < 1) {
        $_SESSION["messages"][] = "Er is geen plaats op deze vlucht. Het ticket is niet geboekt.";
    }


    $newTicketDetails = sanatizeDataInput($_POST);


    $newTicketDetails["deskNumber"] = "";
    $newTicketDetails["seat"] = randomSeatGenerator();

    $newPassengernumber = registerNewTicket($newTicketDetails);

    $_SESSION["messages"]["newTicketnumber"] = "Voor passagier {$newPassengernumber} is het ticket opgenomen in het systeem";


header('location: ../book-ticket.php');


} else {
    die("Ongeldig verzoek. Probeer het opnieuw.");
}






