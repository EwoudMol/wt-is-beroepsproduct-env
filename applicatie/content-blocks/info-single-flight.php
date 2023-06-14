<?php

function generateSingleFlightInfomation($flightDetails) {


    return <<<SINGLEFLIGHTINFORMATION
        <section class="actual-information">
            <p>Vluchtnummer: {$flightDetails['vluchtnummer']}</p>
            <p>Bestemming: {$flightDetails['bestemming']}</p>
            <p>Gate: {$flightDetails['gatecode']}</p>
            <p>Vertrektijd: {$flightDetails['vertrektijd']}</p>
            <p>Maatschappij: {$flightDetails['maatschappij']}</p>
        </section>

SINGLEFLIGHTINFORMATION;
}