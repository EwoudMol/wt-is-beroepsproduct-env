<?php


function createLoginForm() {
    return <<<LOGINFORM
                <section class="page-content">
                    <section class="information-field">
                        <h2>Inloggen</h2>  
                        <form id="login-form" method="POST" action="../login.php">
                            <label for="user">Soort gebruiker:</label>
                            <select id="user" name="user">
                                <option value="passenger">Passagier</option>
                                <option value="staff">Medewerker</option>
                            </select><br>
                            <label for="number"> Nummer:</label>
                            <input type="text" id="number" name="number" pattern="[0-9]{5}" placeholder="123456"><br>
                            <label for="name"> Naam:</label>
                            <input type="text" id="name" name="name" pattern="[A-Za-z]{*}"><br>
                            <input class="button" type="submit" value="Inloggen" name="inloggen">
                        </form>
                    </section>
                </section>
LOGINFORM;
}

