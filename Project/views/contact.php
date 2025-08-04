<?php
/** @var $params \app\models\RegistrationModel
 */

use app\core\Application;

?>
<div id="contact">
    <p>CONTACT US</p>
    <form method="POST" action="/contactProcess">
        <div id="cont">
            <input type="text" class="form-control name-form" placeholder="Ime" name="ime">
            <?php

            if($params !== null && $params->errors !== null){
                foreach ($params->errors as $objectNum => $item){
                    if($objectNum == "ime"){
                        echo "<span class='mesage' >$item[0]</span>";
                    }
                }
            }


            ?>

            <input type="text" class="form-control email-form" placeholder="E-mail" name="email">
            <?php

            if($params !== null && $params->errors !== null){
                foreach ($params->errors as $objectNum => $item){
                    if($objectNum == "email"){
                        echo "<span class='mesage' >$item[0]</span>";
                    }
                }
            }


            ?>

            <input type="text" class="form-control subject-form" placeholder="Naslov" name="naslov">

            <textarea rows="4" cols="50" class="message-form" placeholder="Poruka" name="poruka"></textarea>
            <?php

            if($params !== null && $params->errors !== null){
                foreach ($params->errors as $objectNum => $item){
                    if($objectNum == "poruka"){
                        echo "<span class='mesage' >$item[0]</span>";
                    }
                }
            }


            ?>

            <button type="submit" id="kontakt">Posalji</button>
            <p name="dane"></p>
        </div>
    </form>

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