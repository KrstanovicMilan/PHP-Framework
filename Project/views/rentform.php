<?php
/** @var $params \app\models\RegistrationModel
 */


?>
<html>
<head>
</head>
<body>
<div id="rentdiv">
    <form method="POST" action="/rentProcess">
        <div id="rent">
            <select name="model" required>
                <option value="" disabled selected>Choose a car model</option>
                <?php

                foreach ($params as $value){
                    echo'<option value="'.$value .'">'. $value.'</option>';
                }
                ?>

            </select>
            <br/>
            <label>Datum preuzimanja : </label>
            <input type="date"   name="datum_preuzimanja" required>

            <label>Datum vracanja : </label>
            <input type="date"   name="datum_vracanja" required>

            <label>Broj vozacke dozvole : </label>
            <input type="text"   name="broj_vozacke" required>

            <label>Na ime : </label>
            <input type="text"   name="na_ime" required>


            <button type="submit" id="rentsubmit">Posalji</button>
<!--            <p name="dane"></p>-->
        </div>
    </form>

</div>
</body>

</html>