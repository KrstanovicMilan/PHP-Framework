<html>
<head>
    <title>Pocetna</title>
    <link rel="stylesheet" href="assets/css/index.css">
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

            echo '<ul><li style="margin-left:350px"><a href="/logout">Logout</a></li></ul>';

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