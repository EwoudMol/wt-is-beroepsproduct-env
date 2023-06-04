<?php

    require './forms/new-flight-form.php';

    $homePage = false;
    $pageTitle = "Nieuwe vlucht";

    $pageContent = createNewFlightForm();

include "./basic-elements/base-page.php";



