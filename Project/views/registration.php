<?php
/** @var $params \app\models\RegistrationModel
 */

use app\core\Application;

?>
<div id="registrovanje">
    <p>REGISTER</p>
    <form method="POST" action="/registrationProcess" >
        <div id="reg">
            <input name="fname" type="text" placeholder="First name"/>
            <input name="lname" type="text" placeholder="Last name"/>
            <input name="username" type="text" placeholder="Username"/>
            <input name="email" type="email" placeholder="Email"/>
            <?php

            if($params !== null && $params->errors !== null){
                foreach ($params->errors as $objectNum => $item){
                    if($objectNum == "email"){
                        echo "<span class='mesage' >$item[0]</span>";
                    }
                }
            }


            ?>
            <input name="password" type="password" placeholder="Password"/>
            <?php
            if($params !== null && $params->errors !== null){
                foreach ($params->errors as $objectNum => $item){
                    if($objectNum == "password"){
                        echo "<span class='mesage'>$item[0]</span>";
                    }
                }
            }
            ?>
            <input name="phone" type="text" placeholder="0691812097"/>
            <select name="gender" >
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><br/>

            <input id="submitR" name="submit" type="submit" value="REGISTRATION"/>
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