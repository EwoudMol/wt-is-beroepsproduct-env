<?php

require_once './util-pages/session.php';

function printMessages() {
    $text = '';

    if (isset($_SESSION["messages"])) {

        if (sizeof($_SESSION["messages"]) > 0) {
            $text .= '<div class= "information-field">
                       <h2>Meldingen</h2>';
            foreach ($_SESSION["messages"] as $message) {
                $text .= "<p class=\"message\">{$message}.<p>";
            }
            $text .= "</div>";
            unset($_SESSION["messages"]) ;
        }
    }
    return $text;
}