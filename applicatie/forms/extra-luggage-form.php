<?php

function extraLuggageForm()
{
    return <<<EXTRALUGGAGEFORM


    <section class="information-field" >
        <h2 > Extra koffer </h2 >
        <form >
            <label for="weight-extra-luggage" > Gewicht extra koffer:</label >
            <input type = "number" id = "weight-extra-luggage" name = "gewicht-koffer" >
            <input class="button" type = "submit" value = "Extra bagage inboeken" >
        </form >
    </section >
 EXTRALUGGAGEFORM;


    }
    ?>
