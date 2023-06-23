<?php

require_once './util-pages/sanitize_form_fields.php';

//-----------------------------------------------------------------------------------------
//In deze functie zijn de kolomkoppen dynamisch gemaakt zodat het pijltje reageert op de sorteervolgorde.
function generateColumnHead($column, $sortColumn, $sortOrder){
    $headColumn = $column;
    if($column === $sortColumn) {
        if ($sortOrder === 'asc') {
            $headColumn .='&#9650;';
        } else {
            $headColumn .='&#9660;';
        }
    }
    return $headColumn;
}
//-----------------------------------------------------------------------------------------
//In deze functie wordt de vertrek tabel gemaakt. Hier wordt eerst bepaald op welke kolom er gesorteerd is,
//als deze niet bekend is, wordt er een standaard sorteervolgorde toegekend.
function generateDepartureTable($flightTimes) {
    $sortColumn = isset($_GET['column']) ? $_GET['column'] : 'vertrektijd';
    $sortOrder = isset($_GET['order']) && $_GET['order'] === 'desc' ? 'desc' : 'asc';
    $sortNew = $sortOrder === 'asc' ? 'desc' : 'asc';

    $flightTable = '<div id="page-content-flight">
        <table>
            <thead>
            <tr>
                <th class="prio-1"><a href="?column=vertrektijd&order=' . $sortNew . '">' . generateColumnHead("vertrektijd", $sortColumn, $sortOrder) . '</a></th>
                <th class="prio-1"><a href="?column=vluchtnummer&order=' . $sortNew . '">' . generateColumnHead("vluchtnummer", $sortColumn, $sortOrder) . '</a></th>
                <th class="prio-1"><a href="?column=gatecode&order=' . $sortNew . '">' . generateColumnHead("gatecode", $sortColumn, $sortOrder) . '</a></th>
                <th class="prio-1"><a href="?column=bestemming&order=' . $sortNew . '">' . generateColumnHead("bestemming", $sortColumn, $sortOrder) . '</a></th>
                <th class="prio-3"><a href="?column=maatschappij&order=' . $sortNew . '">' . generateColumnHead("maatschappij", $sortColumn, $sortOrder) . '</a></th>
            </tr>
            </thead>
            <tbody>';

    foreach ($flightTimes as $flightTime){
        $flightTime["vertrektijd"] = convertDatetimeToApplication($flightTime["vertrektijd"]);
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
    </div>";

return $flightTable;
}






