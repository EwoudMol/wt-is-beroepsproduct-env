<?php

require './content-blocks/leaving-flights-table.php';
require_once('./database/queries.php');


    $homePage = false;
    $pageTitle = "Vertrek Vluchten";


    $flightTimes = getAllLeavingFlight();

    $pageContent = generateDepartureTable($flightTimes);

include "./basic-elements/base-page.php";

?>

