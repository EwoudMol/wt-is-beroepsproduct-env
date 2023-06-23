<?php

function generateSelectField($options, $name,$fieldname, $required) {
    $selectField = '<label for="' . $name . '"> ' . ucfirst($fieldname) . '</label>';
    $selectField .= '<select id = "' . $name . '" name="' . $name . '" required>';
    $selectField .= '<option selected value = "" disabled>Maak een keuze</option>';

    foreach ($options as $option) {
        $id = $option[$fieldname];
        $naam = $option[$fieldname];
        $selectField .= '<option value="' . $id . '">' . $naam . '</option>';
    }



    $selectField .= '</select>';

    return $selectField;
}