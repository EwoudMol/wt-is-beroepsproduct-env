<?php

function searchFlightByNumberForm(){
    return <<<SEARCHFLIGHTFORM
        <section class="information-field">
            <h2>Vlucht zoeken</h2>
            <form id="search-flight-number" method="post" action="../util-pages/search-flight-number.php">
                <label for="flightnumber"> Vluchtnummer:</label>
                <input type="number" id="flightnumber" name="flightnumber" pattern="[0-9]{5}" placeholder="12345">
                <input type="hidden" name="fromPage" value={$_SERVER["REQUEST_URI"]}>
                <input class="button" type="submit" value="Zoeken">
            </form>

SEARCHFLIGHTFORM;
}
?>

