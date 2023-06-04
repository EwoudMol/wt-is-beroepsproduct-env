<?php

function generateDepartureTable($flightTimes)
{
    $block = "<table>";
    $block .= "<tr><th>" . implode("</th><th>", array_keys($flightTimes[0])) . "</th></tr>";

    foreach ($flightTimes as $flightTime) {
        $block .= "<tr><td>" . implode("</td><td>", $flightTime) . "</td></tr>";
    }
    $block .= "</table>";

    return $block;
}




