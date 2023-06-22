<?php

require_once '../util-pages/session.php';
require_once '../util-pages/validate-form-fields.php';
require_once '../util-pages/sanitize_form_fields.php';
require_once '../database/queries.php';

$postedToken = $_POST['csrf_token'];
$newTicketDetails = sanatizeDataInput($_POST);
$requiredFormFields = ["namePassenger", "flightnumber1","gender"];
$numericFormFields = ["flightnumber1"];
$remainingSpace = getRemainingSpaceFlight($_POST["flightnumber1"]);

function randomSeatGenerator(){
    $letters =['A', 'B', 'C', 'D', 'E', 'F','G','H','I'];
    $randomLetter = $letters[array_rand($letters)];
    $randomNumber = str_pad(rand(1,36),2,'0', STR_PAD_LEFT);
    return $randomLetter . $randomNumber;
}

if ($postedToken === $_SESSION['token']){
    if (requiredFieldsFilled($newTicketDetails, $requiredFormFields) && validateNumericField($_POST, $numericFormFields)) {
        try {
            if ($remainingSpace['remaining_passengers'] <1){
                $_SESSION["messages"][] = "Er is geen plaats op deze vlucht. Het ticket is niet geboekt.";
            } else {

                $newTicketDetails["deskNumber"] = "";
                $newTicketDetails["seat"] = randomSeatGenerator();

                $newPassengernumber = registerNewTicket($newTicketDetails);

                $_SESSION["messages"]["newTicketnumber"] = "Voor passagier {$newPassengernumber} is het ticket opgenomen in het systeem";
            }
        } catch (Exception $error) {
            $_SESSION["messages"]["newTicketnumber"] = "Er is iets misgegaan bij het boeken van het ticket";
        }
    }

   header('location: ../book-ticket.php');


} else {
    die("Ongeldig verzoek. Probeer het opnieuw.");
}






