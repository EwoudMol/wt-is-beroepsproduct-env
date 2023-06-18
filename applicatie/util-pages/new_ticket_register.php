<?php


//TODO verwerk het nieuwe ticket nummer nog netjes
//TODO alle form validatie nog aan de server kant.
//TODO opnemen in de documentatie dat er een AK zit op de combinatie van vlucht en stoel niet dubbel.
require_once '../util-pages/session.php';
require_once '../util-pages/sanitize_form_fields.php';
require_once '../database/queries.php';

$postedToken = $_POST['csrf_token'];
$error = [];


if ($postedToken === $_SESSION['token']){
    if($_SESSION["remaining_places"] < 1) {
        $_SESSION["errors"][] = "Er is geen plaats op deze vlucht. Het ticket is niet geboekt.";
    }


    $newTicketDetails = sanatizeDataInput($_POST);
//        echo var_dump($newTicketDetails);

        $newTicketDetails["deskNumber"] = "";
        $newTicketDetails["seat"] = rand(50,100);




        $newTicketnumber = registerNewTicket($newTicketDetails);
        $_SESSION["newTicketnumber"] = $newTicketnumber;

 //       echo var_dump($newTicketnumber);
 //       echo var_dump($_SESSION["newTicketnumber"]);

header('location: ../book-ticket.php');


} else {
    die("Ongeldig verzoek. Probeer het opnieuw.");
}






