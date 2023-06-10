<?php

require_once("./database/db_connectie.php");


function executeQuery($query) {
    global $verbinding;
    return $verbinding ->query($query, PDO::FETCH_ASSOC) ->fetchAll();
}

function getPassengerLoginDetails($passengerNumber) {
    global $verbinding;
    $sql = "SELECT passagiernummer, naam
                                FROM [GelreAirport].[dbo].[Passagier]
                                WHERE passagiernummer = :passengerNumber";

    $query = $verbinding ->prepare($sql);
    $query-> execute([':passengerNumber' => intval($passengerNumber)]) ;

    return  $query -> fetch(PDO::FETCH_ASSOC);
}


function getLeavingFlights($displayFlightsFrom, $pagesize = 10, $skip = 0) {
    global $verbinding;
    $displayFlightsFrom = date("Y-m-d H:i", $displayFlightsFrom);

    $pagesize = intval($pagesize);
    $skip = intval($skip);

    var_dump($pagesize, $skip);

    $sql = "SELECT CONVERT(smalldatetime, vertrektijd) as vertrektijd, vluchtnummer, gatecode, luchthaven.naam, maatschappij.naam
            FROM [GelreAirport].[dbo].[Vlucht] AS vlucht
            JOIN [GelreAirport].[dbo].[Luchthaven] AS luchthaven ON bestemming=luchthavencode
            JOIN [GelreAirport].[dbo].[Maatschappij] as maatschappij ON vlucht.maatschappijcode = maatschappij.maatschappijcode
            WHERE vlucht.vertrektijd > :displayFlightsFrom
            ORDER BY vertrektijd ASC
            OFFSET :skip ROWS FETCH NEXT :pagesize ROWS ONLY";

    $query = $verbinding ->prepare($sql);

    var_dump($query->queryString);

    $query->bindParam(':displayFlightsFrom', $displayFlightsFrom, PDO::PARAM_STR);
    $query->bindParam(':skip', $skip, PDO::PARAM_INT);
    $query->bindParam(':pagesize', $pagesize, PDO::PARAM_INT);
    $query->execute();


    return  $query -> fetchAll(PDO::FETCH_ASSOC);
}

function getAmountTableRows($table){
    var_dump("TABEL" .$table);
    return executeQuery("SELECT COUNT(1) FROM $table");
}