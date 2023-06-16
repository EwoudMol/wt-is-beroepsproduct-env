<?php

session_start();
//TODO de links van de verschillende pagina's zijn niet leesbaar.

require_once './content-blocks/leaving-flights-table.php';
require_once('./database/queries.php');
require_once './basic-elements/pager.php';

    date_default_timezone_set("Europe/Amsterdam");
    $displayFlightsFrom = time();

    $homePage = false;
    $pageTitle = "Vertrek Vluchten";

    $segments = explode("?", $_SERVER["REQUEST_URI"]);
    $pagesize = isset($_GET["p"]) ? $_GET["p"] : 20;
    $start = isset($_GET["s"]) ? $_GET["s"] : 0;



    $flightTimes = getLeavingFlights($displayFlightsFrom,$pagesize,$start);

    $pageContent = generateDepartureTable($flightTimes);
    $pageContent .=generatePager("Vlucht", $segments[0],$start,$pagesize, $displayFlightsFrom);

include "./basic-elements/base-page.php";

?>

