<?php
    session_start();

    require_once '../database/queries.php';

    $name = htmlspecialchars(strtolower($_POST["name"]));
    $number = htmlspecialchars($_POST["number"]);



if ($_POST["user"] === "staff" && $name === "test" && $number === '98765'){
    $_SESSION['role'] = "staff";
    $_SESSION['staffnumber'] = $_POST["$number"];
    $_SESSION['name'] = $_POST["name"];

    activateCsrfToken();

    header('Location: ../startpage-staff.php');

} elseif($_POST["user"] === "passenger") {
    $result = getPassengerLoginDetails($number);


    if($result["passagiernummer"] === $number && strtolower($result["naam"]) === $name ) {
        $_SESSION['role'] = "passenger";
        $_SESSION['passengerNumber'] = $number;
        $_SESSION['name'] = $name;

        activateCsrfToken();

        header('Location: ../startpage-passenger.php');
    } else {
        header('Location: ../index.php');
    }

} else {
    header('Location: ../index.php');
}


function activateCSRFToken() {
    if (empty($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
};





