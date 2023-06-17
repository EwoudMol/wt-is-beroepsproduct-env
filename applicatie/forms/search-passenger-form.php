<?php

require_once './content-blocks/info-passenger.php';
function searchPassengerByNumberForm(){

  return <<<SEARCHPASSENGERFORM
    
    <div class='information-field'>
        <h2>Persoongegevens</h2>
        <form id="search-passenger-number" action="../util-pages/search-passenger-number.php">
            <input type="hidden" id="sourcePassengerForm" name="sourcePassengerForm" value={$_SERVER["REQUEST_URI"]}>
            <label for="passengernumber"> Passagiersnummer:</label>
            <input type="number" id="passengernumber" name="passengernumber" min="23452" max="60000" step="1" placeholder="12345">
            <input class="button" type="submit" value="Zoeken">
        </form>
SEARCHPASSENGERFORM;

}

