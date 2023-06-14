<?php
    session_start();

    require_once './database/queries.php';

    $name = htmlspecialchars(strtolower($_POST["name"]));
    $number = htmlspecialchars($_POST["number"]);


if ($_POST["user"] === "staff" && $name === "test" && $number === '98765'){
    $_SESSION['role'] = "staff";
    $_SESSION['number'] = $_POST["number"];
    $_SESSION['name'] = $_POST["name"];

    header('Location: /startpage-staff.php');

} elseif($_POST["user"] === "passenger") {
    $result = getPassengerLoginDetails($number);


    if($result["passagiernummer"] === $number && strtolower($result["naam"]) === $name ) {
        $_SESSION['role'] = "passenger";
        $_SESSION['number'] = $number;
        $_SESSION['name'] = $name;

        header('Location: /startpage-passenger.php');
    } else {
        header('Location: /index.php');
    }

} else {
    header('Location: /index.php');
}






