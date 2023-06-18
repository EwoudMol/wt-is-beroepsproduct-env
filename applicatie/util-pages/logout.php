<?php
    require_once '../util-pages/session.php';

session_unset();
session_destroy();

header('Location: /index.php');

?>