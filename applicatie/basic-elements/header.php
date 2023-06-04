<?php

?>


<h1><?php  echo $pageTitle ?></h1>
<nav>
    <div class="nav-icon">
        <?php if(isset($homePage)) : ?>
            <a href="../leaving-flights.php">
            <img src="../images/departure-icon.png" alt="Vertrekkende vlucht">
            <p>Vertrek vlucht</p>
        <?php else : ?>
            <a href="../index.php">
            <img src="../images/sign-out-icon.png" alt="Uitloggen">
            <p>Uitloggen</p>
        <?php endif; ?>
        </a>
    </div>
</nav>

