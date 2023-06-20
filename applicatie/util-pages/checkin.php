<?php

session_start();
require_once '../database/queries.php';

    registerCheckin($_POST["passengerNumber"]);



$cleanedSource = str_replace("/", "", $_POST["source"]);

if ($cleanedSource === "startpage-staff.php") {
    $_SESSION["messages"]["checkin"] = "De passagier is ingecheckt";
} else{
    $_SESSION["messages"]["checkin"] = "U bent ingecheckt";
}


header("location: ../{$_POST["source"]}");