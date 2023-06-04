<?php

function generatePassengerInformation(){
    return <<<PASSENGERINFO

       <section class="actual-information">
           <p>Passagiersnummer: <?php echo $numberPassenger ?></p>
            <p>naam passagier: <?php echo $namePassenger ?></p>
            <p>Geslacht: <?php echo $genderPassenger ?></p>
           <p>Hoeveelheid bagage: <?php echo $amountLuggage ?></p>
      </section>

PASSENGERINFO;
}



