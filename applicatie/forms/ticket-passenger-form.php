<?php

function generateTicketForm()
{
    return <<<TICKETFORM

<div class='information-field'>
            <h2>Ticket boeken</h2>
            <form method="POST" action="../util-pages/new_ticket_register.php">
                <input type="hidden" name="csrf_token" value= {$_SESSION['token']}>
                <label for="namePassenger">Naam</label>
                <input type="text" id="namePassenger" name="namePassenger" pattern="[A-Z][a-z]{0,34}" required><br>
                <label for="flightnumber1">Vluchtnummer</label>
                <input type="number" id="flightnumber1" name="flightnumber1" min="28761" max="50000" step="1" placeholder="12345" required><br>
                <label>Geslacht:</label>
                <div id="gender-choices">
                
                    <input type="radio" id="genderM" name="gender" value="M" required>
                    <label for="genderM">Man</label>
                    <input type="radio" id="genderF" name="gender" value="F">
                    <label for="genderF">Vrouw</label>
                    <input type="radio" id="genderX" name="gender" value="X">
                    <label for="genderX">Anders</label>
                </div>
                <input class="button" type="submit" value="Boek ticket">

            </form>
        </div>
TICKETFORM;
}
