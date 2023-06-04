<?php

function generateSingleFlightInfomation()
{
    return <<<SINGLEFLIGHTINFORMATION
        <section class="actual-information">
            <p>Vluchtnummer: <?php echo $flightNumber ?></p>
            <p>Bestemming: <?php echo $destination ?></p>
            <p>Gate: <?php echo $gate ?></p>
            <p>Vertrektijd: <?php echo $departureTime ?></p>
            <p>Maatschappij: <?php echo $airline ?></p>
        </section>

SINGLEFLIGHTINFORMATION;
}