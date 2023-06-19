<?php
require_once './util-pages/session.php';

require_once './content-blocks/error_messages.php';

if(!isset ($_SESSION["role"])) {
    header('Location: ../index.php');
}




if (isset($_SESSION["newFlightnumber"])) {
};

require_once './forms/new-flight-form.php';

    $homePage = false;
    $pageTitle = "Nieuwe vlucht";

    $pageContent = createNewFlightForm();
    $pageContent .= printErrorMessages();

include "./basic-elements/base-page.php";



