<?php

function generateTicketForm()
{
    return <<<TICKETFORM

<section class="information-field">
            <h3>Ticketgegevens</h3>
            <form>
                <label for="initials">Naam</label>
                <input type="text" id="initials" name="initials" required><br>
                <label for="flightnumber1">Vluchtnummer</label>
                <input type="number" id="flightnumber1" name="flightnumber1" required><br>

                <div id="gender-choices">
                    <input type="radio" id="genderM" name="gender" value="M">
                    <label for="genderM">Man</label>
                    <input type="radio" id="genderF" name="gender" value="F">
                    <label for="genderF">Vrouw</label>
                    <input type="radio" id="genderE" name="gender" value="A">
                    <label for="genderE">Anders</label>
                </div>
                <input class="button" type="submit" value="Boek ticket">

            </form>
        </section>
TICKETFORM;
}
