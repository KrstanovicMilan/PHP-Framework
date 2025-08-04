<?php
/** @var $params \app\models\LoginModel
 */

use app\core\Application;
?>

<div id="logovanje">
    <p>LOGIN</p>
    <form action="/loginProcess" method="POST">
        <div id="fade-box">
            <input type="text" name="email" id="username" placeholder="Username" >
            <?php
            if($params !== null && $params->errors !== null){
                foreach ($params->errors as $objectNum => $item){
                    if($objectNum == "email"){
                        echo "<span class='mesage' >$item[0]</span>";
                    }
                }
            }
            ?>


            <input type="password" name="password" placeholder="Password" >
            <?php
            if($params !== null && $params->errors !== null){
                foreach ($params->errors as $objectNum => $item){
                    if($objectNum == "password"){
                        echo "<span class='mesage' >$item[0]</span>";
                    }
                }
            }
            ?>


            <input id="submitR" id="sub"  type="submit" value="LOG IN" />
        </div>
    </form>

</div>


<?php
$error = Application::$app->session->getFlash(Application::$app->session->FLASH_MESSAGE_ERROR);

if ($error !== false) {
    echo "
        <script>
                $(document).ready(function (){
                    toastr.error('$error');
                    
                });
        </script> 
        ";
}
?>