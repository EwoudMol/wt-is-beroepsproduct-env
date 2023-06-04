<?php

require './content-blocks/info-passenger.php';
function searchPassengerByNumberForm(){
    $block =  <<<SEARCHPASSENGERFORM
    <section class="information-field">
        <h2>Persoongegevens</h2>
        <form>
            <label for="passengernumber"> Passagiersnummer:</label>
            <input type="number" id="passengernumber" name="passengernumber">
            <input class="button" type="submit" value="Zoeken">
        </form>

SEARCHPASSENGERFORM;

    $block .= generatePassengerInformation();

    return $block;
}
?>
