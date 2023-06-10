<?php

require_once "./database/queries.php";

function generatePager($table, $url, $start, $pagesize) {
    $pageback = $start - $pagesize;
    $pageback = $pageback < 0 ? 0 : $pageback;
    $totalrows = getAmountTableRows($table);


    $pagefw = $start + $pagesize;
    $pagefw = $pagefw > $totalrows ? $start : $pagefw;

    $result = "<a href='$url?p=$pagesize&s=$pageback'>previous</a> &nbsp; <a href='$url?p=$pagesize&s=$pagefw'>next</a>";
    return $result;
}

