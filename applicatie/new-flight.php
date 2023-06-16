<?php

session_start();

if (isset($_SESSION["newFlightnumber"])) {
    var_dump($_SESSION["newFlightnumber"]);
};

require_once './forms/new-flight-form.php';

    $homePage = false;
    $pageTitle = "Nieuwe vlucht";

    $pageContent = createNewFlightForm();

include "./basic-elements/base-page.php";



