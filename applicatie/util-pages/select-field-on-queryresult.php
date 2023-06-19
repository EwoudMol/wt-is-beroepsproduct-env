<?php

function generateSelectField($options, $name,$fieldname, $required) {
    $selectField = '<label for="' . $name . '"> ' . $fieldname . '</label>';
    $selectField .= '<select name="' . $name . '">';
    $selectField .= '<option selected value = "">Maak een keuze</option>';

    foreach ($options as $option) {
        $id = $option[$fieldname];
        $naam = $option[$fieldname];
        $selectField .= '<option value="' . $id . '">' . $naam . '</option>';
    }

    if ($required){
        $selectField .= 'required';
    }

    $selectField .= '</select>';

    return $selectField;
}