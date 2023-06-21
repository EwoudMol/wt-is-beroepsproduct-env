<?php

function sanatizeDataInput($data){
    $sanatizedFields = [];

    foreach ($data as $key=> $value) {
        $sanatizedFieldInput = sanatizeField(strtolower($value));
        $sanatizedFields[$key] = $sanatizedFieldInput;
    }
    return $sanatizedFields;
}

function sanatizeField($fieldInput) {

    return  htmlspecialchars($fieldInput);
}

function convertDatetimeToQuery($originalTime) {
    $datetime = DateTime::createFromFormat("Y-m-d\TH:i", $originalTime);
    return $datetime->format("Y-m-d H:i");
}

function convertDatetimeToApplication($originalTime) {
    $datetime = DateTime::createFromFormat("Y-m-d H:i:s", $originalTime);
    return $datetime->format("d-m-Y H:i");
}
