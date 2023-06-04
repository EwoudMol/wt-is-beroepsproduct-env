<?php


function searchFlightByNumberForm(){
    return <<<SEARCHFLIGHTFORM
        <section class="information-field">
            <h2>Vlucht zoeken blaat</h2>
            <form>
                <label for="flightnumber"> Vluchtnummer:</label>
                <input type="number" id="flightnumber" name="flightnumber">
                <input class="button" type="submit" value="Zoeken">
            </form>

SEARCHFLIGHTFORM;
}
?>

