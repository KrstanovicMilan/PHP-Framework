<?php
/** @var $params \app\models\RentModel
 */


?>
<html>
<head></head>
<body>
<div id="ispisinfo"  >
<h1>Uspesno ste rentali vozilo</h1>
<?php
    foreach ($params as $key => $value){
        if($key == "fname"){
            echo"<span>Ime : ". $params["fname"]." </span></br></br>";
        }
        if($key == "lname"){
            echo"<span>Prezime : ". $params["lname"]." </span></br></br>";
        }
        if($key == "email"){
            echo"<span>Email : ". $params["email"]." </span></br></br>";
        }
        if($key == "broj_vozacke"){
            echo"<span>Broj vozacke : ". $params["broj_vozacke"]." </span></br></br>";
        }
        if($key == "na_ime"){
            echo"<span>Na ime : ". $params["na_ime"]." </span></br></br>";
        }
        if($key == "datum_uzimanja"){
            echo"<span>Datum uzimanja : ". $params["datum_uzimanja"]." </span></br></br>";
        }
        if($key == "datum_vracanja"){
            echo"<span>Datum vracanja : ". $params["datum_vracanja"]." </span></br></br>";
        }
        if($key == "model"){
            echo"<span>Model : ". $params["model"]." </span></br></br>";
        }
        if($key == "rezultat"){
            echo"<span>Iznos za uplatu : ". $params["rezultat"]."&euro; </span>";
        }


    }
    ?>
<span></span>
<span></span>
<span></span>
<span></span>
</div>
</body>
</html>

