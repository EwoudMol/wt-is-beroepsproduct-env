<?php

require_once "./database/queries.php";

function generatePager($table, $url, $start, $pagesize) {
    $pageback = $start - $pagesize;
    $pageback = $pageback < 0 ? 0 : $pageback;

    //TODO kijken of dit mooier verwerkt kan worden.
    //TODO opmaak van de pagenummers en ruimte rond de nummers.
    //TODO kijken of de nummer afgekapt kunnen worden.

    $totalrows = getAmountTableRows($table)[0];

    $pagefw = $start + $pagesize;
    $pagefw = $pagefw > $totalrows[""] ? $start : $pagefw;

    $numberOfPages = ceil((int)$totalrows[""] / (int)$pagesize);


    $result = "<a href='$url?p=$pagesize&s=$pageback'>previous</a> &nbsp;";
    $result .= pageLinks($numberOfPages, $url, $pagesize);
    $result .= "<a href='$url?p=$pagesize&s=$pagefw'>next</a>";

    return $result;
}

function pageLinks($numberOfPages, $url, $pagesize){
    $pageLinks = '';
    for($page = 1; $page<= $numberOfPages; $page++) {
        $start = ($page - 1) * $pagesize;

        $pageLinks .= "<a href='$url?p=$pagesize&s=$start'>$page</a>";
    }
    return $pageLinks;

}