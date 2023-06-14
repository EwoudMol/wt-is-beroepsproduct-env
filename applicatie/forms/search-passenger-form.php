<?php

require './content-blocks/info-passenger.php';
function searchPassengerByNumberForm(){
  return <<<SEARCHPASSENGERFORM
    <section class="information-field">
        <h2>Persoongegevens</h2>
        <form id="search-passenger-number" action="../util-pages/search-passenger-number.php">
            <label for="passengernumber"> Passagiersnummer:</label>
            <input type="number" id="passengernumber" name="passengernumber" pattern="[0-9]{5}" placeholder="12345">
            <input class="button" type="submit" value="Zoeken">
        </form>
SEARCHPASSENGERFORM;

}
?>
