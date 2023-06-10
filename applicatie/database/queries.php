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




function getAllLeavingFlight() {
    return executeQuery("SELECT CONVERT(smalldatetime, vertrektijd) as vertrektijd, vluchtnummer, gatecode, luchthaven.naam, maatschappij.naam
FROM [GelreAirport].[dbo].[Vlucht] AS vlucht
JOIN [GelreAirport].[dbo].[Luchthaven] AS luchthaven ON bestemming=luchthavencode
JOIN [GelreAirport].[dbo].[Maatschappij] as maatschappij ON vlucht.maatschappijcode = maatschappij.maatschappijcode
WHERE vlucht.vertrektijd > '2023-06-19 10:30';");

}