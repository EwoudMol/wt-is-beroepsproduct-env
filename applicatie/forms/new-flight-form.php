<?php



function createNewFlightForm() {
    return <<<NEWFLIGHTFORM
        
            <section class="information-field">
                    <h3>Maak hier een nieuwe vlucht aan:</h3>
        
                    <form>
                        <label for="destination">Bestemming:</label>
                        <input type="text" id="destination" name="destination" required><br>
                        <label for="gatecode">Vertrek gate:</label>
                        <input type="text" id="gatecode" name="gatecode"><br>
                        <label for="max_aantal">Maximum passagiers:</label>
                        <input type="number" id="max_aantal" name="max_aantal" required>
                        <label for="max_gewicht_pp">Maximum gewicht bagage per passagier:</label>
                        <input type="number" id="max_gewicht_pp" name="max_gewicht_pp" required>
                        <label for="max_totaalgewicht">Maximum totaalgewicht</label>
                        <input type="number" id="max_totaalgewicht" name="max_totaalgewicht" required>
                        <label for="maatschappij-code">Maatschappij</label>
                        <input type="text" id="maatschappij-code" name="maatschappij-code" required>
                        <label for="vertrektijd">Vertrektijd</label>
                        <input type="datetime-local" id="vertrektijd" name="vertrektijd">
                        <input class="button" type="submit" value="Vlucht registreren">
                    </form>
                </section>
            </section>
NEWFLIGHTFORM;
}