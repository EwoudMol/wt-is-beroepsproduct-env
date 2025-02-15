<?php

//TODO moet deze niet naar een aparte functie en util page?


require_once './util-pages/session.php';
require_once './content-blocks/leaving-flights-table.php';
require_once './content-blocks/messages.php';
require_once './database/queries.php';
require_once './basic-elements/pager.php';

    date_default_timezone_set("Europe/Amsterdam");
    $displayFlightsFrom = time();

    $homePage = false;
    $pageTitle = "Vertrek Vluchten";

    $segments = explode("?", $_SERVER["REQUEST_URI"]);
    $pagesize = isset($_GET["p"]) ? $_GET["p"] : 20;
    $start = isset($_GET["s"]) ? $_GET["s"] : 0;
    $column = isset($_GET["column"]) ? $_GET["column"] : "vertrektijd";
    $sort = isset($_GET["order"]) ? $_GET["order"] : "ASC";

    try {
        $flightTimes = getLeavingFlights($displayFlightsFrom, $column, $sort, $pagesize, $start);

    } catch(Exception $error){
        $_SESSION["messages"]["checkin"] = "Er is een fout opgetreden bij het ophalen van de vluchten";
    }

if(!empty($_SESSION["messages"])) {
    $pageContent = printMessages();
}else {
    $pageContent = generateDepartureTable($flightTimes);
    $pageContent .= generatePager("Vlucht", $segments[0], $start, $pagesize, $displayFlightsFrom);
}


include "./basic-elements/base-page.php";


