<?php

require_once './util-pages/session.php';

function printErrorMessages() {
    $errorText = '';

    if (isset($_SESSION["errors"])) {

        if (sizeof($_SESSION["errors"]) > 0) {
            $errorText .= '<div class= "information-field">
    <h2>Fouten in het formulier</h2>';
            foreach ($_SESSION["errors"] as $error) {
                $errorText .= "<p class=\"error\">{$error}.<p>";
               unset($_SESSION["errors"]) ;
            }
        }

    }
    return $errorText;
}