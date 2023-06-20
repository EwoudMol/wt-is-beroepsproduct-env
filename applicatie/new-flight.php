<?php
require_once './util-pages/session.php';
require_once './content-blocks/messages.php';
require_once './forms/new-flight-form.php';

if(!isset ($_SESSION["role"])) {
    header('Location: ../index.php');
}

    $homePage = false;
    $pageTitle = "Nieuwe vlucht";

    $pageContent = createNewFlightForm();
    $pageContent .= printMessages();

include "./basic-elements/base-page.php";



