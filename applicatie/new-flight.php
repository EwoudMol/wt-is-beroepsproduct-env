<?php

session_start();

if (isset($_SESSION["newFlightnumber"])) {
    var_dump($_SESSION["newFlightnumber"]);
};

    require './forms/new-flight-form.php';

    $homePage = false;
    $pageTitle = "Nieuwe vlucht";

    $pageContent = createNewFlightForm();

include "./basic-elements/base-page.php";



