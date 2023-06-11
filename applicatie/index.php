<?php

var_dump($_POST);

    require './forms/login-form.php';

    $homePage = true;
    $pageTitle = "Welkom bij Gelre Airport";
    $pageContent = createLoginForm();

    include "./basic-elements/base-page.php";





