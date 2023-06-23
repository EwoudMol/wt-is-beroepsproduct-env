<?php

require_once './util-pages/session.php';
require_once './util-pages/array-from-url.php';
require_once './util-pages/search-passenger-number.php';
require_once './util-pages/search-flight-number.php';
require_once './forms/search-passenger-form.php';
require_once './forms/search-flight-form.php';
require_once './content-blocks/info-single-flight.php';
require_once './content-blocks/messages.php';
require_once './forms/check-in-button.php';


if(!isset($_SESSION["role"])) {
   header('Location: ../index.php');
}
    if(isset($_SERVER["QUERY_STRING"])) {
        $searchedNumber = getArrayFromURL($_SERVER["QUERY_STRING"]);

    }



    $homePage = false;
    $pageTitle = "Passagiersdetails";
    $pageContent = searchPassengerByNumberForm();

if (!empty($searchedNumber["passengernumber"])) {
    $passengerDetails = retrievePassengerInformation($searchedNumber["passengernumber"]);

    if(!empty($passengerDetails)) {
        $pageContent .= generatePassengerInformation($passengerDetails);
    }
}

    $pageContent .= '</div>';
    $pageContent .= searchFlightByNumberForm();

if (!empty($searchedNumber["flightnumber"]) || !empty($passengerDetails["vluchtnummer"])) {
    $flightnumber = (!empty($searchedNumber["flightnumber"])) ? $searchedNumber["flightnumber"] : $passengerDetails["vluchtnummer"];

    $flightDetails = retrieveFlightInformation($flightnumber);
    $pageContent .= generateSingleFlightInfomation($flightDetails);

}

if (!empty($passengerDetails)){
        if(is_null($passengerDetails["inchecktijdstip"])) {
            $pageContent .= createCheckinButton($passengerDetails["passagiernummer"]);
      }
}
    $pageContent .= '</div>';
    $pageContent .= printMessages();



include './basic-elements/base-page.php';



