<?php





function extraLuggageForm() {

    return <<<EXTRALUGGAGEFORM


    <div class='information-field' >
        <h2 > Extra koffer </h2 >
        <form method="POST" action="../util-pages/new_luggage_register.php">
            <input type="hidden" name="csrf_token" value= {$_SESSION['token']}>
            <input type="hidden" name="passengerNumber" value= {$_SESSION['passengerDetails']['passagiernummer']}>
            <label for="weight-extra-luggage" > Gewicht extra koffer:</label >
            <input type = "number" id = "weight-extra-luggage" name = "weight-extra-luggage" >
            <input class="button" type = "submit" value = "Extra bagage inboeken" >
        </form >
    </div >
 EXTRALUGGAGEFORM;


    }
    ?>
