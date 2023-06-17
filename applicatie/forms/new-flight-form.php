<?php



function createNewFlightForm() {
    return <<<NEWFLIGHTFORM
        
            <div class='information-field'>
                    <h3>Maak hier een nieuwe vlucht aan:</h3>
        
                    <form method="POST" action="../util-pages/new_flight_register.php">
                        <input type="hidden" name="csrf_token" value= {$_SESSION['token']}>
                        <label for="destination">Bestemming:</label>
                        <input type="text" id="destination" name="destination" pattern="[A-Z]{3}" placeholder="ABC" required><br>
                        <label for="gatecode">Vertrek gate:</label>
                        <input type="text" id="gatecode" name="gatecode" pattern="[A-Z]{1}" placeholder="Z"><br>
                        <label for="max_passenger">Maximum passagiers:</label>
                        <input type="number" id="max_passenger" name="max_passenger" step="1" min="0" max="999" required>
                        <label for="max_weight_pp">Maximum gewicht bagage per passagier:</label>
                        <input type="number" id="max_weight_pp" name="max_weight_pp" step="0.01" min="0" max="999999.99" required>
                        <label for="max_totalweigth">Maximum totaalgewicht</label>
                        <input type="number" id="max_totalweigth" name="max_totalweigth" step="0.01" min="0" max="999999.99" required>
                        <label for="airline">Maatschappij</label>
                        <input type="text" id="airline" name="airline" pattern="[A-Z]{2}" placeholder="Z" required>
                        <label for="depart_time">Vertrektijd</label>
                        <input type="datetime-local" id="depart_time" name="depart_time">
                        <input class="button" type="submit" value="Vlucht registreren">
                    </form>
                </div>
NEWFLIGHTFORM;
}