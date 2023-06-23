<?php

function createCheckinButton($passengerNumber){

return <<<CHECKINBUTTON
    <form method="POST" action="../util-pages/checkin.php">
    <input type="hidden" name="csrf_token" value= {$_SESSION['token']}>
    <input type="hidden" id="source" name="source" value="{$_SERVER["REQUEST_URI"]}">
    <input type="hidden" name="passengerNumber" value= {$passengerNumber}>
    <button class="button" type="submit">Inchecken</button>
    </form>

CHECKINBUTTON;
}
