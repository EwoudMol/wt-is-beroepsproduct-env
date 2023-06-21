<?php



function requiredFieldsFilled($filledFormData, $requiredFields) {
    foreach ($requiredFields as $requiredField) {
        if(empty($filledFormData[$requiredField])){
            $_SESSION["messages"][$requiredField] = $requiredField . " is niet gevuld";

            return false;
        }
    }
   return true;
}


function validateNumericField($filledFormData, $numericFields)
{
    foreach ($numericFields as $requiredField) {
        if (!isset($filledFormData[$requiredField]) || !is_numeric($filledFormData[$requiredField])) {
            $_SESSION["messages"][$requiredField] = $requiredField . " is niet met een numerieke waarde gevuld.";
            return false;
        }
        return true;
    }
}