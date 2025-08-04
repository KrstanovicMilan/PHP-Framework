<?php
/** @var $params \app\models\ProductModel
 */

use app\core\Application;

?>
<div class="card ms-9 me-9 ">
    <div class="card-header pb-0 text-left ">
        <h3 class="font-weight-bolder text-info text-gradient">Insert new vehicle</h3>
    </div>
    <div class="card-body">
        <form action="/createProductProcess" method="post" role="form">
<!--            <label>Model</label>-->
            <div class="mb-3">

                <input type="text" class="form-control" name="model" placeholder="Model" aria-label="Email" aria-describedby="email-addon">
                <?php

                if($params !== null && $params->errors !== null){
                    foreach ($params->errors as $objectNum => $item){
                        if($objectNum == "model"){
                            echo "<span class='text-danger'>$item[0]</span>";
                        }
                    }
                }


                ?>
            </div>
<!--            <label>Vrsta goriva</label>-->
            <div class="mb-3">

                <input type="text" class="form-control" name="gorivo" placeholder="Vrsta goriva" aria-label="Email" aria-describedby="email-addon">
                <?php

                if($params !== null && $params->errors !== null){
                    foreach ($params->errors as $objectNum => $item){
                        if($objectNum == "gorivo"){
                            echo "<span class='text-danger'>$item[0]</span>";
                        }
                    }
                }


                ?>
            </div>
<!--            <label>Vrsta menjaca</label>-->
            <div class="mb-3">

                <input type="text" class="form-control" name="menjac" placeholder="Vrsta menjaca" aria-label="Email" aria-describedby="email-addon">
                <?php

                if($params !== null && $params->errors !== null){
                    foreach ($params->errors as $objectNum => $item){
                        if($objectNum == "menjac"){
                            echo "<span class='text-danger'>$item[0]</span>";
                        }
                    }
                }


                ?>
            </div>
<!--            <label>Broj sedista</label>-->
            <div class="mb-3">

                <input type="text" class="form-control" name="brojSedista" placeholder="Broj sedista" aria-label="Email" aria-describedby="email-addon">
                <?php

                if($params !== null && $params->errors !== null){
                    foreach ($params->errors as $objectNum => $item){
                        if($objectNum == "brojSedista"){
                            echo "<span class='text-danger'>$item[0]</span>";
                        }
                    }
                }


                ?>
            </div>
<!--            <label>Klima</label>-->
            <div class="mb-3">

                <input type="text" class="form-control" name="klima" placeholder="Klima " aria-label="Email" aria-describedby="email-addon">
                <?php

                if($params !== null && $params->errors !== null){
                    foreach ($params->errors as $objectNum => $item){
                        if($objectNum == "klima"){
                            echo "<span class='text-danger'>$item[0]</span>";
                        }
                    }
                }


                ?>
            </div>
<!--            <label>Kubikaza</label>-->
            <div class="mb-3">

                <input type="number"  class="form-control" name="kubikaza" placeholder="Kubikaza" aria-label="Email" aria-describedby="email-addon">
                <?php

                if($params !== null && $params->errors !== null){
                    foreach ($params->errors as $objectNum => $item){
                        if($objectNum == "kubikaza"){
                            echo "<span class='text-danger'>$item[0]</span>";
                        }
                    }
                }


                ?>
            </div>
<!--            <label>Cena/danu</label>-->
            <div class="mb-3">

                <input type="number" class="form-control" name="cena" placeholder="Cena / danu" aria-label="Email" aria-describedby="email-addon">
                <?php

                if($params !== null && $params->errors !== null){
                    foreach ($params->errors as $objectNum => $item){
                        if($objectNum == "cena"){
                            echo "<span class='text-danger'>$item[0]</span>";
                        }
                    }
                }


                ?>
            </div>
<!--            <label>Slika vozila</label>-->
            <div class="mb-3">

                <input type="text" class="form-control" name="slika" placeholder="Slika vozila" aria-label="Email" aria-describedby="email-addon">
                <?php

                if($params !== null && $params->errors !== null){
                    foreach ($params->errors as $objectNum => $item){
                        if($objectNum == "slika"){
                            echo "<span class='text-danger '>$item[0]</span>";
                        }
                    }
                }


                ?>
            </div>

            <div class="text-center">
                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Insert product</button>
            </div>
        </form>
    </div>

</div>

<?php
$success = Application::$app->session->getFlash(Application::$app->session->FLASH_MESSAGE_SUCCESS);

if ($success !== false) {
    echo "
        <script>
                $(document).ready(function (){
                    //toastr.error('$success');
                    toastr.success('$success');
                });
            </script> 
        ";
}


$error = Application::$app->session->getFlash(Application::$app->session->FLASH_MESSAGE_ERROR);

if ($error !== false) {
    echo "
        <script>
                $(document).ready(function (){
                    toastr.error('$error');
                    //toastr.success('$success');
                });
            </script> 
        ";
}
?>
