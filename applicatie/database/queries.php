<?php

require_once 'db_connectie.php';

//----------------------------------------------------------------------------------------------------
//Zorgt voor het uitvoeren van queries
    function executeQuery($query) {
        global $verbinding;
        $result = $verbinding ->prepare($query);
        $result -> execute();

        return $result ->fetchAll(PDO::FETCH_ASSOC);
}
//----------------------------------------------------------------------------------------------------
function getPassengerLoginDetails($passengerNumber) {
    global $verbinding;
    $sql = "SELECT passagiernummer, naam
            FROM [GelreAirport].[dbo].[Passagier]
            WHERE passagiernummer = :passengerNumber";

    $query = $verbinding ->prepare($sql);
    $query-> execute([':passengerNumber' => intval($passengerNumber)]);

    return  $query -> fetch(PDO::FETCH_ASSOC);
}

//----------------------------------------------------------------------------------------------------
//In deze query wordt afhankelijk van de sorteer keuze de query aangemaakt. Op deze manier omdat de ORDER BY
//niet via een prepared statement ingeladen wordt.
function getLeavingFlights($displayFlightsFrom, $column, $sort, $pagesize = 10, $skip = 0) {

    global $verbinding;
    $displayFlightsFrom = date("Y-m-d H:i", $displayFlightsFrom);

    $allowedColumns = ['vertrektijd', 'vluchtnummer', 'gatecode', 'bestemming', 'maatschappij'];
    $column = in_array($column,$allowedColumns) ? $column : 'vertrektijd' ;

    $allowedSorts = array('asc', 'desc');
    $sort = in_array($sort, $allowedSorts) ? $sort : 'asc';

    $pagesize = intval($pagesize);
    $skip = intval($skip);


    $sql = "SELECT CONVERT(smalldatetime, vertrektijd) as vertrektijd, vluchtnummer, gatecode, luchthaven.naam as bestemming, 
            maatschappij.naam as maatschappij
            FROM [GelreAirport].[dbo].[Vlucht] AS vlucht
            JOIN [GelreAirport].[dbo].[Luchthaven] AS luchthaven ON bestemming=luchthavencode
            JOIN [GelreAirport].[dbo].[Maatschappij] as maatschappij ON vlucht.maatschappijcode = maatschappij.maatschappijcode
            WHERE vlucht.vertrektijd > :displayFlightsFrom
            ORDER BY $column $sort
            OFFSET :skip ROWS FETCH NEXT :pagesize ROWS ONLY";

    $query = $verbinding ->prepare($sql);

    $query->bindParam(':displayFlightsFrom', $displayFlightsFrom, PDO::PARAM_STR);
    $query->bindParam(':skip', $skip, PDO::PARAM_INT);
    $query->bindParam(':pagesize', $pagesize, PDO::PARAM_INT);

    $query->execute();

    return  $query -> fetchAll(PDO::FETCH_ASSOC);
}
//----------------------------------------------------------------------------------------------------
function getAmountTableRows($table, $displayFlightsFrom){
    global $verbinding;
    $displayFlightsFrom = date("Y-m-d H:i", $displayFlightsFrom);

    $sql = "SELECT COUNT(1) FROM {$table}  WHERE vlucht.vertrektijd > :displayFlightsFrom";
    $query = $verbinding ->prepare($sql);

    $query->bindParam(':displayFlightsFrom', $displayFlightsFrom, PDO::PARAM_STR);
    $query -> execute();
    return $query -> fetch(PDO::FETCH_ASSOC);
}
//----------------------------------------------------------------------------------------------------
function getPassengerDetails($passengerNumber){
    global $verbinding;
   $sql = " SELECT passagier.passagiernummer, passagier.naam, geslacht, vlucht.vluchtnummer, 
            CONVERT(smalldatetime,passagier.inchecktijdstip) as inchecktijdstip, count(bagage.passagiernummer) as aantal, 
            sum(ISNULL(bagage.gewicht,0)) as gewicht_bagage
            FROM [GelreAirport].[dbo].[Passagier] AS passagier
            LEFT JOIN [GelreAirport].[dbo].[Vlucht] AS vlucht ON passagier.vluchtnummer = vlucht.vluchtnummer
            LEFT JOIN [GelreAirport].[dbo].[BagageObject] as bagage ON bagage.passagiernummer = passagier.passagiernummer
            WHERE passagier.passagiernummer = :passengerNumber
            GROUP BY passagier.passagiernummer, passagier.naam, geslacht, vlucht.vluchtnummer,passagier.inchecktijdstip";

    $query = $verbinding ->prepare($sql);
    $query -> execute([':passengerNumber' => $passengerNumber]);
    return  $query -> fetch(PDO::FETCH_ASSOC);

}
//----------------------------------------------------------------------------------------------------
function getFlightInformation($flightNumber){
    global $verbinding;
    $sql = "SELECT  vluchtnummer, CONVERT(smalldatetime, vertrektijd) as vertrektijd, gatecode, luchthaven.naam as bestemming, 
            maatschappij.naam as maatschappij
            FROM [GelreAirport].[dbo].[Vlucht] AS vlucht
            JOIN [GelreAirport].[dbo].[Luchthaven] AS luchthaven ON bestemming=luchthavencode
            JOIN [GelreAirport].[dbo].[Maatschappij] as maatschappij ON vlucht.maatschappijcode = maatschappij.maatschappijcode
            WHERE vlucht.vluchtnummer = :flightNumber";

    $query = $verbinding ->prepare($sql);
    $query -> execute([':flightNumber' => $flightNumber]);
    return  $query -> fetch(PDO::FETCH_ASSOC);
}
//----------------------------------------------------------------------------------------------------
function getRemainingSpaceFlight($flightNumber){
    global $verbinding;
    $sql = "SELECT Vlucht.vluchtnummer, luchthaven.naam as bestemming,  max_aantal as max_passagiers,  
            bookedpassengers.aantal as booked_passengers, max_aantal - bookedpassengers.aantal as remaining_passengers, 
            max_totaalgewicht - SUM(ISNULL(BagageObject.gewicht,0)) as remaining_weight
            FROM [GelreAirport].[dbo].[Vlucht] as Vlucht
            LEFT JOIN [GelreAirport].[dbo].[Luchthaven] AS luchthaven ON vlucht.bestemming=luchthavencode
            LEFT JOIN [GelreAirport].[dbo].[Passagier] ON Vlucht.vluchtnummer = Passagier.vluchtnummer
            LEFT JOIN [GelreAirport].[dbo].[BagageObject] ON Passagier.passagiernummer = BagageObject.passagiernummer
            LEFT JOIN (	SELECT vluchtnummer, count(passagiernummer) as aantal
                    FROM [GelreAirport].[dbo].[Passagier]
                    group by vluchtnummer) AS bookedpassengers
                    ON Vlucht.vluchtnummer = bookedpassengers.vluchtnummer
            WHERE Vlucht.vluchtnummer = :flightNumber
            GROUP BY Vlucht.vluchtnummer, max_aantal,max_totaalgewicht, bookedpassengers.aantal,luchthaven.naam";

    $query = $verbinding ->prepare($sql);
    $query -> execute([':flightNumber' => $flightNumber]);
    return $query -> fetch(PDO::FETCH_ASSOC);

}

//----------------------------------------------------------------------------------------------------

function registerNewFlight($newFlightDetails){
    global $verbinding;
    $sql = "INSERT INTO [GelreAirport].[dbo].[Vlucht] (vluchtnummer, bestemming, gatecode, max_aantal, max_gewicht_pp, 
            max_totaalgewicht, vertrektijd, maatschappijcode) 
            VALUES ((SELECT MAX(vluchtnummer) 
            FROM [GelreAirport].[dbo].[Vlucht])+1, :destination, :gatecode, :max_passenger,:max_weight_pp,
                :max_totalweigth, :depart_time, :airline);";

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
//----------------------------------------------------------------------------------------------------
function registerNewTicket($ticketInformation){
    global $verbinding;
    $sql ="  INSERT INTO [GelreAirport].[dbo].[Passagier] (passagiernummer, naam, vluchtnummer, stoel, geslacht)
            VALUES ((SELECT MAX(passagiernummer) 
                    FROM [GelreAirport].[dbo].[Passagier])+1,:namePassenger, :flightNumber, :seat, :gender);";

    $query = $verbinding ->prepare($sql);
    $query->execute([
        ':namePassenger' => $ticketInformation["namePassenger"],
        ':flightNumber' => $ticketInformation["flightnumber1"],
        ':seat' => $ticketInformation["seat"],
        ':gender' => $ticketInformation["gender"]
    ]);

    $newTicketnumber = $verbinding->query("SELECT TOP (1) [passagiernummer]
                                                  FROM [GelreAirport].[dbo].[Passagier]
                                                  ORDER BY passagiernummer desc")->fetchColumn();
    return $newTicketnumber;
}
//----------------------------------------------------------------------------------------------------
function getLuggageFlightInfo($flightNumber){
    global $verbinding;
    $sql = "SELECT vlucht.vluchtnummer, vlucht.bestemming, vlucht.max_gewicht_pp, maatschappij.max_objecten_pp
            FROM [GelreAirport].[dbo].[Vlucht] AS vlucht
            JOIN [GelreAirport].[dbo].[Maatschappij] AS maatschappij ON vlucht.maatschappijcode = maatschappij.maatschappijcode
            WHERE vlucht.vluchtnummer = :flightNumber;";

    $query = $verbinding ->prepare($sql);
    $query -> execute([':flightNumber' => $flightNumber]);
    return  $query -> fetch(PDO::FETCH_ASSOC);
}

//----------------------------------------------------------------------------------------------------
//Om een koffer te registeren, moet eerste het hoogste koffer nummer opgehaald worden. Vervolgens
//wordt de koffer ingeboekt met een opvolgend opbjectnummer om, vervolgens met een query het objectnummer
//van de nieuwe koffer op te halen en terug te geven.
function registerNewLuggage($luggageInformation){
    global $verbinding;

    $passengerNumber = intval($luggageInformation["passengerNumber"]);
    $weight = $luggageInformation["weight"];

    $objectVolgnummerQuery = "SELECT MAX(objectvolgnummer) FROM [GelreAirport].[dbo].[BagageObject] 
                            WHERE passagiernummer = :passengerNumber";

    $objectVolgnummerStatement = $verbinding->prepare($objectVolgnummerQuery);
    $objectVolgnummerStatement->execute([':passengerNumber' => $passengerNumber]);
    $maxObjectVolgnummer = $objectVolgnummerStatement->fetchColumn();

    $sql = "INSERT INTO [GelreAirport].[dbo].[BagageObject] (passagiernummer, objectvolgnummer, gewicht)
            VALUES (:passengerNumber, :objectVolgnummer, :weight);";
    $query = $verbinding->prepare($sql);
    $query->execute([
        ':passengerNumber' => $passengerNumber,
        ':objectVolgnummer' => $maxObjectVolgnummer + 1,
        ':weight' => $weight
    ]);

    $newLuggageObject = $verbinding->query("  SELECT MAX(objectvolgnummer) luggageNumber
                                                  FROM [GelreAirport].[dbo].[BagageObject] 
                                                  WHERE passagiernummer = {$passengerNumber};") ->fetchColumn();

    return $newLuggageObject;
}
//---------------------------------------------------------------------------------------------

function getAllDestinations(){
    $sql="SELECT luchthavencode FROM [GelreAirport].[dbo].[Luchthaven]";
    return executeQuery($sql);
}

//---------------------------------------------------------------------------------------------

function getAllAirlines(){
    $sql="SELECT Maatschappijcode FROM [GelreAirport].[dbo].[Maatschappij]";
    return executeQuery($sql);
}

//---------------------------------------------------------------------------------------------

function getAllGates(){
    $sql="SELECT gatecode FROM [GelreAirport].[dbo].[Gate]";
    return executeQuery($sql);
}

//---------------------------------------------------------------------------------------------

function registerCheckin($passengerNumber){
    global $verbinding;

    $sql="UPDATE [GelreAirport].[dbo].[Passagier]
          SET inchecktijdstip = GETDATE()
          WHERE passagiernummer = :passengerNumber";

    $query = $verbinding->prepare($sql);
    $query->execute([':passengerNumber' => $passengerNumber]);
}

