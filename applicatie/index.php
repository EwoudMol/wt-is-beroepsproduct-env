<?php
require_once './forms/login-form.php';
require_once './content-blocks/messages.php';


    $homePage = true;
    $pageTitle = "Welkom bij Gelre Airport";
    $pageContent = createLoginForm();

    $pageContent .= printMessages();

    include "./basic-elements/base-page.php";





