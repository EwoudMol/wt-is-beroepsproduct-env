<?php


function createLoginForm() {
    return <<<LOGINFORM
                <section class="page-content">
                    <section class="information-field">
                        <h2>Inloggen</h2>  
                        <form id="login-form" method="post" >
                            <label for="user">Soort gebruiker:</label>
                            <select id="user" name="user">
                                <option value="passenger">Passagier</option>
                                <option value="operator">Medewerker</option>
                            </select><br>
                            <label for="passengernumber"> Passagiersnummer:</label>
                            <input type="text" id="passengernumber" name="passengernumber" pattern="[0-9]{6}" placeholder="123456"><br>
                            <input class="button" type="submit" value="Inloggen">
                        </form>
                    </section>
                </section>
LOGINFORM;
}

