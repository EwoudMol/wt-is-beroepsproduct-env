<?php

function generateRemainingSpaceInfo($flightDetails){
    return <<<REMAININGSPACE
            <div id="place-left-flight">
                <p>Vluchtnummer: {$flightDetails['vluchtnummer']}</p>
                <p>Bestemming: {$flightDetails['bestemming']}</p>
                <p>Vrije zitplaatsen vliegtuig: {$flightDetails['remaining_passengers']}</p>
                <p>Hoeveelheid bagage die nog meegenomen kan worden: {$flightDetails['remaining_weight']} kg.</p>
            </div>
REMAININGSPACE;




}