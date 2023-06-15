<?php
session_start();

//TODO verwerk het nieuwe ticket nummer nog netjes
//TODO alle form validatie nog aan de server kant.

require_once '../database/queries.php';

$error = [];


$newTicketDetails = $_POST;
echo var_dump($newTicketDetails);

$newTicketDetails["deskNumber"] = "";
$newTicketDetails["seat"] = "";
$newTicketDetails["seat"] = "";



$newTicketnumber = registerNewTicket($_POST);
$_SESSION["newTicketnumber"] = $newTicketnumber;

echo var_dump($newTicketnumber);
echo var_dump($_SESSION["newTicketnumber"]);

header('location: ../book-ticket.php');





