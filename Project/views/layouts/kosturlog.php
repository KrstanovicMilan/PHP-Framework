<?php
/** @var $params \app\models\LoginModel
 */

?>
<html>
<head>
    <title>Pocetna</title>
    <link  href="assets/css/index.css"  rel="stylesheet">



    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
            crossorigin="anonymous">

    </script>


    <script  src="../assets/js/plugins/toastr/toastr.min.js"></script>
    <link href="../assets/js/plugins/toastr/toastr.min.css"  rel="stylesheet"/>
</head>

<body>
<div id="header">

    <img src="assets/img/logo.jpg" >

    <div id="navbar">
        <a href="/home" id="home">HOME</a>
        <a href="/gallery">GALLERY</a>
        <a href="/carpark">CAR PARK</a>
        <a href="/contact">CONTACT</a>
        <div id="navbar2">
            {{ renderNavBar }}
            <?php

            //cista provera da li je logovan ili nije && $params->errors !== null   stao si na 7.2 na pola negde
//            $sess = "";
//            if($params !== null ){
//            foreach ($params as $key => $value){
//                if($key == "username"){
//                    $sess = $value;
//
//
//                }
//            }
//            }
            echo '<ul><li style="margin-left:350px"><a href="/logout">Logout</a></li></ul>';

//            echo '<ul>
//                        <li style="margin-left:300px"><a href="login.html">Log in</a></li>
//                        <li style="margin-left:-25px"><a href="register.html">Register</a></li>
//                    </ul>';

            ?>
        </div>
    </div>
</div>


{{  renderPartialView  }}

<div id="logo">
    <img src="assets/img/logo1.jpg" alt="logo"  />
</div>
<div id="car">
    <p>The best super car in town</p>
</div>

<div id="footer">
    <div class="footer"><p>Maksima Gorkog 3 <br/>11000 Belgrade </p></div>
    <div class="footer"><p>www.AMGrentAcar.com</p></div>
    <div class="footer">
        <p>
            <a class="widget" href="https://www.facebook.com/" target="_blank"><img src="assets/img/facebook.jpg" alt="FB" /> </a>
            <a class="widget" href="https://www.instagram.com/" target="_blank"><img  src="assets/img/instagram.jpg" alt="IG" />  </a>
            <a class="widget" href="https://www.twitter.com/" target="_blank"><img  src="assets/img/twiter.jpg" alt="TW" />  </a>
        </p>
    </div>
</div>
</body>

</html>