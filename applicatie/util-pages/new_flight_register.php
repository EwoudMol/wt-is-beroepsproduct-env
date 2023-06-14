<?php
session_start();

require_once '../database/queries.php';


echo var_dump($_POST);

    $newFlightnumber = registerNewFlight($_POST);
    $_SESSION["newFlightnumber"] = $newFlightnumber;

    echo var_dump($newFlightnumber);
    echo var_dump($_SESSION["newFlightnumber"]);

header('location: ../new-flight.php');

//todo het nummer van de nieuwe vlucht komt nu terug op de pagina. Deze nog netjes renderen.