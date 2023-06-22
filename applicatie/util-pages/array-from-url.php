<?php

function getArrayFromURL($queryString) {
    parse_str($queryString, $parameters);

    $result = [];

    foreach ($parameters as $parameter => $value) {
        $result[$parameter] = $value;
    }

    return $result;


}
