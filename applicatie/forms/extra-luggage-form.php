<?php

function extraLuggageForm($passengerNumber, $maxLuggageLeftPassenger) {

    return <<<EXTRALUGGAGEFORM

        <h2 > Extra koffer </h2 >
        <form method="POST" action="../util-pages/new_luggage_register.php">
            <input type="hidden" name="csrf_token" value= {$_SESSION['token']}>
            <input type="hidden" name="passengerNumber" value= {$passengerNumber}>
            <input type="hidden" name="max_luggage_left" value = {$maxLuggageLeftPassenger};

            <label for="weight-extra-luggage" > Gewicht extra koffer:</label >
            <input type = "number" id = "weight-extra-luggage" name = "weight-extra-luggage" min="0.1" max="20" step="0.1" required>
            <input class="button" type = "submit" value = "Extra bagage inboeken" >
        </form >

 EXTRALUGGAGEFORM;
}

