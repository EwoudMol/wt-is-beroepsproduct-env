<?php
require_once './util-pages/session.php';
//var_dump($_SESSION);

//TODO geen opmerkingen meer in W3 validator

if(!isset($_SESSION["role"])) {
   header('Location: ../index.php');
}

require_once './forms/search-passenger-form.php';
require_once './forms/search-flight-form.php';
require_once './content-blocks/info-single-flight.php';
require_once './content-blocks/error_messages.php';

$homePage = false;
$pageTitle = "Passagiersdetails";


$pageContent = searchPassengerByNumberForm($_SERVER["REQUEST_URI"]);

if (!empty($_SESSION["passengerDetails"])) {
    $pageContent .= generatePassengerInformation($_SESSION["passengerDetails"]);
    unset($_SESSION["passengerDetails"]);
}
$pageContent .= '</div>';

$pageContent .= searchFlightByNumberForm();

if (!empty($_SESSION["flightDetails"])) {
    $pageContent .= generateSingleFlightInfomation($_SESSION["flightDetails"]);
    unset($_SESSION["flightDetails"]);

}
$pageContent .= printErrorMessages();
$pageContent .= '</div>';

//$pageContent .='<button class="button" type="button" onclick="alert("Checkt passagier in")">Inchecken</button>';
//$pageContent .= '</section>';



include './basic-elements/base-page.php';

?>


