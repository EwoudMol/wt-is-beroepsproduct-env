<?php

function generateTicketForm()
{
    return <<<TICKETFORM

<section class="information-field">
            <h2>Ticket boeken</h2>
            <form method="POST" action="../util-pages/new_ticket_register.php">
                <label for="initials">Naam</label>
                <input type="text" id="namePassenger" name="namePassenger" required><br>
                <label for="flightnumber1">Vluchtnummer</label>
                <input type="number" id="flightnumber1" name="flightnumber1" required><br>

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
        </section>
TICKETFORM;
}
