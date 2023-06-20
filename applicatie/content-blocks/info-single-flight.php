<?php

require_once './util-pages/sanitize_form_fields.php';


function generateSingleFlightInfomation($flightDetails) {
    $flightDetails['vertrektijd'] = convertDatetimeToApplication($flightDetails['vertrektijd']);


    return <<<SINGLEFLIGHTINFORMATION
        <div class="actual-information">
            <p>Vluchtnummer: {$flightDetails['vluchtnummer']}</p>
            <p>Bestemming: {$flightDetails['bestemming']}</p>
            <p>Gate: {$flightDetails['gatecode']}</p>
            <p>Vertrektijd: {$flightDetails['vertrektijd']}</p>
            <p>Maatschappij: {$flightDetails['maatschappij']}</p>
        </div>

SINGLEFLIGHTINFORMATION;
}