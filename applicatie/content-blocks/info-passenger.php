<?php


//TODO wellicht het balienummer en de inchecktijd opnemen.


function generatePassengerInformation($passengerDetails){
    return <<<PASSENGERINFO



       <section class="actual-information">
           <p>Passagiersnummer:  {$passengerDetails['passagiernummer']}</p>
            <p>naam passagier: {$passengerDetails['naam']}</p>
            <p>Geslacht: {$passengerDetails['geslacht']}</p>
           <p>Hoeveelheid bagage: {$passengerDetails['aantal']}</p>
      </section>

PASSENGERINFO;
}



