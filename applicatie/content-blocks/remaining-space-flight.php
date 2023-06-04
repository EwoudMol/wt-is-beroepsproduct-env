<?php

function generateRemainingSpaceInfo(){
    return <<<REMAININGSPACE
            <div id="place-left-flight">
                <p>Vrije zitplaatsen vliegtuig: <?php echo $seatsAvailable ?></p>
                <p>Hoeveelheid bagage die nog meegenomen kan worden: <?php echo $weightAvailableLuggage ?></p>
            </div>
REMAININGSPACE;




}