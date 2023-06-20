<?php

require_once "./database/queries.php";

function generatePager($table, $url, $start, $pagesize, $displayFlightsFrom) {
    $pageback = $start - $pagesize;
    $pageback = $pageback < 0 ? 0 : $pageback;




    $totalrows = getAmountTableRows($table, $displayFlightsFrom);
    $pagefw = $start + $pagesize;
    $pagefw = $pagefw > $totalrows[""] ? $start : $pagefw;

    $numberOfPages = ceil((int)$totalrows[""] / (int)$pagesize);

    $result = '<div class="page-links">';
    $result .= "<a href='$url?p=$pagesize&s=$pageback'>previous</a> &nbsp;";
    $result .= pageLinks($numberOfPages, $url, $pagesize);
    $result .= "<a href='$url?p=$pagesize&s=$pagefw'>next</a>";
    $result .= '</div>';

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