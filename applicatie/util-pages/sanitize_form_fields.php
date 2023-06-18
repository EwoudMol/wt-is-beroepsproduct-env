<?php

function sanatizeDataInput($data){
    $sanatizedFields = [];

    foreach ($data as $key=> $value) {
        $sanatizedFieldInput = sanatizeField($value);
        $sanatizedFields[$key] = $sanatizedFieldInput;
    }
    return $sanatizedFields;
}

function sanatizeField($fieldInput) {
    return  htmlspecialchars($fieldInput);
}
