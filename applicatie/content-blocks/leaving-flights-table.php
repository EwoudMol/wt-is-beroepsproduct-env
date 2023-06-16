<?php
//TODO deze nog aanpassen aan responsive design.
//TODO moet hier de balie nog bij?


function generateDepartureTable($flightTimes) {
    $flightTable =
        <<<FLIGHTTABLE
    <section id="page-content-flight">
        <h2>Overzicht van de vertrekkende vluchten</h2>
        <table>
            <thead>
            <tr>
                <th class="prio-1">Vertrektijd</th>
                <th class="prio-1">Vlucht</th>
                <th class="prio-1">Gate</th>
                <th class="prio-1">Bestemming</th>
                <th class="prio-3">Maatschappij</th>
            </tr>
            </thead>
            <tbody>
   FLIGHTTABLE;

    foreach ($flightTimes as $flightTime){
        $flightTable .= "
           
            <tr>
     
                <td class=\"prio-1\">" . $flightTime["vertrektijd"] . "</td>
                <td class=\"prio-1\">" . $flightTime["vluchtnummer"] . "</td>
                <td class=\"prio-1\">" . $flightTime["gatecode"] . "</td>
                <td class=\"prio-1\">" . $flightTime["bestemming"] . "</td>
                <td class=\"prio-3\">" . $flightTime["maatschappij"] . "</td>
            </tr>";
};

    $flightTable .= "
            </tbody>
        </table>
    </section>";

return $flightTable;
}






