<?php

//TODO het naam veld nog omzetten naar password. Wel in de documentatie opnemen dat het password niet gehashed in de database staat.



function createLoginForm() {
    return <<<LOGINFORM
                    <div class='information-field'>
                        <h2>Inloggen</h2>  
                        <form id="login-form" method="POST" action="./util-pages/login.php">
                            <label for="user">Soort gebruiker:</label>
                            <select id="user" name="user">
                                <option value="passenger">Passagier</option>
                                <option value="staff">Medewerker</option>
                            </select><br>
                            <label for="number"> Nummer:</label>
                            <input type="text" id="number" name="number" pattern="[0-9]{5}" placeholder="12345"><br>
                            <label for="name"> Naam:</label>
                            <input type="text" id="name" name="name" pattern="[A-Za-z]{*}"><br>
                            <input class="button" type="submit"  name="inloggen">
                        </form>
                    </div>
LOGINFORM;
}

