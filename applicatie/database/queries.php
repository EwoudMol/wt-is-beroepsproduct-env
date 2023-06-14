<?php

require_once 'db_connectie.php';


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

    $sql = "SELECT CONVERT(smalldatetime, vertrektijd) as vertrektijd, vluchtnummer, gatecode, luchthaven.naam, maatschappij.naam
            FROM [GelreAirport].[dbo].[Vlucht] AS vlucht
            JOIN [GelreAirport].[dbo].[Luchthaven] AS luchthaven ON bestemming=luchthavencode
            JOIN [GelreAirport].[dbo].[Maatschappij] as maatschappij ON vlucht.maatschappijcode = maatschappij.maatschappijcode
            WHERE vlucht.vertrektijd > :displayFlightsFrom
            ORDER BY vertrektijd ASC
            OFFSET :skip ROWS FETCH NEXT :pagesize ROWS ONLY";

    $query = $verbinding ->prepare($sql);

    $query->bindParam(':displayFlightsFrom', $displayFlightsFrom, PDO::PARAM_STR);
    $query->bindParam(':skip', $skip, PDO::PARAM_INT);
    $query->bindParam(':pagesize', $pagesize, PDO::PARAM_INT);
    $query->execute();

    return  $query -> fetchAll(PDO::FETCH_ASSOC);
}

function getAmountTableRows($table){
    return executeQuery("SELECT COUNT(1) FROM $table");
}

function getPassengerDetails($passengerNumber){
    global $verbinding;
   $sql = " SELECT passagier.passagiernummer, passagier.naam, geslacht, vlucht.vluchtnummer, count(*) as aantal
            FROM [GelreAirport].[dbo].[Passagier] AS passagier
            JOIN [GelreAirport].[dbo].[Vlucht] AS vlucht ON passagier.vluchtnummer = vlucht.vluchtnummer
            JOIN [GelreAirport].[dbo].[BagageObject] as bagage ON bagage.passagiernummer = passagier.passagiernummer
            WHERE passagier.passagiernummer = :passengerNumber
            GROUP BY passagier.passagiernummer, passagier.naam, geslacht, vlucht.vluchtnummer";

    $query = $verbinding ->prepare($sql);
    $query -> execute([':passengerNumber' => $passengerNumber]);
    return  $query -> fetch(PDO::FETCH_ASSOC);

}

function getFlightInformation($flightNumber){
    global $verbinding;
    $sql = "SELECT  vluchtnummer, CONVERT(smalldatetime, vertrektijd) as vertrektijd, gatecode, luchthaven.naam as bestemming, maatschappij.naam as maatschappij
            FROM [GelreAirport].[dbo].[Vlucht] AS vlucht
            JOIN [GelreAirport].[dbo].[Luchthaven] AS luchthaven ON bestemming=luchthavencode
            JOIN [GelreAirport].[dbo].[Maatschappij] as maatschappij ON vlucht.maatschappijcode = maatschappij.maatschappijcode
            WHERE vlucht.vluchtnummer = :flightNumber";

    $query = $verbinding ->prepare($sql);
    $query -> execute([':flightNumber' => $flightNumber]);
    return  $query -> fetch(PDO::FETCH_ASSOC);
}

function getRemainingSpaceFlight($flightNumber){
    global $verbinding;
    $sql = "SELECT Vlucht.vluchtnummer, luchthaven.naam as bestemming,  max_aantal as max_passagiers,  bookedpassengers.aantal as booked_passengers, max_aantal - bookedpassengers.aantal as remaining_passengers, max_totaalgewicht, SUM(BagageObject.gewicht) as gewicht_bagage, max_totaalgewicht - SUM(BagageObject.gewicht) as remaining_weight
            FROM [GelreAirport].[dbo].[Vlucht] as Vlucht
            JOIN [GelreAirport].[dbo].[Luchthaven] AS luchthaven ON vlucht.bestemming=luchthavencode
            JOIN [GelreAirport].[dbo].[Passagier] ON Vlucht.vluchtnummer = Passagier.vluchtnummer
            JOIN [GelreAirport].[dbo].[BagageObject] ON Passagier.passagiernummer = BagageObject.passagiernummer
            JOIN (	SELECT vluchtnummer, count(passagiernummer) as aantal
                    FROM [GelreAirport].[dbo].[Passagier]
                    group by vluchtnummer) AS bookedpassengers
                    ON Vlucht.vluchtnummer = bookedpassengers.vluchtnummer
            WHERE Vlucht.vluchtnummer = :flightNumber
            GROUP BY Vlucht.vluchtnummer, max_aantal,max_totaalgewicht, bookedpassengers.aantal,luchthaven.naam";

    $query = $verbinding ->prepare($sql);
    $query -> execute([':flightNumber' => $flightNumber]);
    return  $query -> fetch(PDO::FETCH_ASSOC);
}
//TODO deze afmaken. Komt vanuit het nieuwe ticket.
function registerNewFlight($newFlightDetails){
    global $verbinding;
    $sql = "INSERT INTO [GelreAirport].[dbo].[Vlucht] (vluchtnummer, bestemming, gatecode, max_aantal, max_gewicht_pp, max_totaalgewicht, vertrektijd, maatschappijcode) 
            VALUES ((SELECT MAX(vluchtnummer) FROM [GelreAirport].[dbo].[Vlucht])+1, :destination, :gatecode, :max_passenger,:max_weight_pp,:max_totalweigth, :depart_time, :airline);";


    $query = $verbinding ->prepare($sql);
    $query->execute([
        ':destination' => $newFlightDetails["destination"],
        ':gatecode' => $newFlightDetails["gatecode"],
        ':max_passenger' => $newFlightDetails["max_passenger"],
        ':max_weight_pp' => $newFlightDetails["max_weight_pp"],
        ':max_totalweigth' => $newFlightDetails["max_totalweigth"],
        ':depart_time' => $newFlightDetails["depart_time"],
        ':airline' => $newFlightDetails["airline"]
    ]);
    $newFlightnumber = $verbinding->query("SELECT TOP (1) [vluchtnummer]
                                                  FROM [GelreAirport].[dbo].[Vlucht]
                                                  ORDER BY vluchtnummer desc")->fetchColumn();
    return $newFlightnumber;
}