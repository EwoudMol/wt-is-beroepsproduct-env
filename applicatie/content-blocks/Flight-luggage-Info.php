<?php


function flightLugggageInfo()
{
    return <<<FLIGHTLUGGAGEINFO

            <section class="information-field">
               <h2>Vluchtgegevens</h2>
                <section class="actual-information">
                    <p>Vluchtnummer:<?php //echo $flightNumber ?></p>
                    <p>Bestemming:<?php //echo $destination ?></p>
                    <p>Resterende kilo's:<?php //echo $weightAvailableLuggageLeft ?></p>
                    <p>Maximum aantal stuks bagage per passagier: <?php //echo $maxAmountLuggageAirline?></p>
                </section>
            </section>
FLIGHTLUGGAGEINFO;
}
