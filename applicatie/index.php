<?php
require_once './forms/login-form.php';
require_once './content-blocks/error_messages.php';


    $homePage = true;
    $pageTitle = "Welkom bij Gelre Airport";
    $pageContent = createLoginForm();

    $pageContent .= printErrorMessages();

    include "./basic-elements/base-page.php";





