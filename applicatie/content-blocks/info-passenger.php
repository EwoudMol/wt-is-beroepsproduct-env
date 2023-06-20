<?php

function generatePassengerInformation($passengerDetails){

    return <<<PASSENGERINFO
       <div class="actual-information">
           <p>Passagiersnummer:  {$passengerDetails['passagiernummer']}</p>
           <p>Naam: {$passengerDetails['naam']}</p>
           <p>Geslacht: {$passengerDetails['geslacht']}</p>
           <p>Aantal stuks bagage: {$passengerDetails['aantal']}</p>
           <p>Gewicht totale bagage: {$passengerDetails['gewicht_bagage']} kilo</p>
           <p>Incheck tijd: {$passengerDetails['inchecktijdstip']}</p>
      </div>

PASSENGERINFO;

}



