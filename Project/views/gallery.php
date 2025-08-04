<html>


<div id="naslovGallery">
    <h1 class="naslov">&bullet; V E H I C L E S &bullet;</h1>
</div>
<div id="gall">
<!--    <a href="assets/img/audi_A5.jpg"><img src="assets/img/audi_A5.jpg"/></a>-->
<!--    <a href="assets/img/audi_R8.jpg"><img src="assets/img/audi_R8.jpg"/></a>-->
<!--    <a href="assets/img/BMW_M3.jpg"><img src="assets/img/BMW_M3.jpg"/></a>-->
<!--    <a href="assets/img/BMW_M5.jpg"><img src="assets/img/BMW_M5.jpg"/></a>-->
<!--    <a href="assets/img/ferrari_488.jpg"><img src="assets/img/ferrari_488.jpg"/></a>-->
<!--    <a href="assets/img/porshe_gts.jpg"><img src="assets/img/porshe_gts.jpg"/></a>-->
<!--    <a href="assets/img/lamborgini_huracan.jpg"><img src="assets/img/lamborgini_huracan.jpg"/></a>-->
<!--    <a href="assets/img/maserati_granturismo.jpg"><img src="assets/img/maserati_granturismo.jpg"/></a>-->
<!--    <a href="assets/img/mercedes_amg63.jpg"><img src="assets/img/mercedes_amg63.jpg"/></a>-->
<!--    <a href="assets/img/mustang_gt.jpg"><img src="assets/img/mustang_gt.jpg"/></a>-->
<!--    <a href="assets/img/porshe_carrera.jpg"><img src="assets/img/porshe_carrera.jpg"/></a>-->
<!--    <a href="assets/img/porshe_panamera.jpg"><img src="assets/img/porshe_panamera.jpg"/></a>-->

<!--    assets/img/honda_civic.jpg-->
</div>



</body>

</html>

<script>
    $(document).ready(function (){
        $.get("/api/administration/pictures", function (result){
            $.each(JSON.parse(result),function (i,item){
                $("#gall").append(
                    "<a href="+ item.slika +">"+
                    "<img src=" +item.slika +">"+
                    "</a>"
                );

            });
        });

    });

</script>

<?php

use app\core\Application;

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

?>