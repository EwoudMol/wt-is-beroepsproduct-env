<?php

    require_once './database/queries.php';
    require_once './util-pages/select-field-on-queryresult.php';

    $allDestinations = getAllDestinations();
    $allGates = getAllGates();
    $allAirlines = getAllAirlines();

    $selectAllDestinationField = generateSelectField($allDestinations, "destination","luchthavencode" ,true);
    $selectAllGates = generateSelectField($allGates, "gatecode","gatecode", true);
    $selectAllAirlines = generateSelectField($allAirlines, "airline", "Maatschappijcode",true);

function createNewFlightForm() {
    global $selectAllDestinationField;
    global $selectAllGates;
    global $selectAllAirlines;

    return <<<NEWFLIGHTFORM
        
            <div class='information-field'>
                    <h3>Vul onderstaande gegevens in voor nieuwe vlucht:</h3>
        
                    <form method="POST" action="../util-pages/new_flight_register.php">
                        <input type="hidden" name="csrf_token" value= {$_SESSION['token']}>
                        $selectAllDestinationField
                        $selectAllGates
                        <label for="max_passenger">Maximum passagiers:</label>
                        <input type="number" id="max_passenger" name="max_passenger" step="1" min="0" max="999" required>
                        <label for="max_weight_pp">Maximum gewicht bagage per passagier:</label>
                        <input type="number" id="max_weight_pp" name="max_weight_pp" step="0.01" min="0" max="9999.99" required>
                        <label for="max_totalweigth">Maximum totaalgewicht</label>
                        <input type="number" id="max_totalweigth" name="max_totalweigth" step="0.01" min="0" max="9999.99" required>
                        $selectAllAirlines
                         <label for="depart_time">Vertrektijd</label>
                        <input type="datetime-local" id="depart_time" name="depart_time">
                        <input class="button" type="submit" value="Vlucht registreren">
                    </form>
                </div>
NEWFLIGHTFORM;
}