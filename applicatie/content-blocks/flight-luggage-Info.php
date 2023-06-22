<?php

function flightLugggageInfo($luggageDetails) {

    return <<<FLIGHTLUGGAGEINFO
               <h2>Bagage gegevens</h2>
                    <div class="actual-information">
                        <p>Vluchtnummer: {$luggageDetails['vluchtnummer']}</p>
                        <p>Bestemming: {$luggageDetails['bestemming']}</p>
                        <p>Maximum kilo's per passagier: {$luggageDetails['max_gewicht_pp']}</p>
                        <p>Maximum aantal stuks bagage per passagier: {$luggageDetails['max_objecten_pp']}</p>
                    </div>
                

FLIGHTLUGGAGEINFO;
}
