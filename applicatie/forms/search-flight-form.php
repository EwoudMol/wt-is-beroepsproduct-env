<?php

function searchFlightByNumberForm(){
    return <<<SEARCHFLIGHTFORM



        <div class='information-field'>
            <h2>Vluchtgegevens</h2>
            <form id="search-flight-number"  action="../util-pages/search-flight-number.php">
                <label for="flightnumber"> Vluchtnummer:</label>
                <input type="number" id="flightnumber" name="flightnumber" min="28761" max="50000" step="1" placeholder="12345">
                <input type="hidden" id="source" name="source" value={$_SERVER["REQUEST_URI"]}>
                <input class="button" type="submit" value="Zoeken">
            </form>

SEARCHFLIGHTFORM;
}
?>

