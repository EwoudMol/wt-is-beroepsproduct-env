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
    var_dump($originalTime);
    $convertedTime= DateTime::createFromFormat("Y-m-d\TH:i", $originalTime);
    return $convertedTime->format("Y-m-d H:i");
}

function convertDatetimeToApplication($originalTime) {
    $convertedTime = DateTime::createFromFormat("Y-m-d H:i:s", $originalTime);
    return $convertedTime->format("d-m-Y H:i");
}
