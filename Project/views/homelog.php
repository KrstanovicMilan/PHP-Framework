<html>
<head>
    <title>Pocetna</title>
    <link rel="stylesheet" href="css/index.css">

</head>

<body>
<div id="header">

    <img src="images/logo.jpg" >

    <div id="navbar">
        <a href="home.php" id="home">HOME</a>
        <a href="galerija.php">GALLERY</a>
        <a href="carpark.php">CAR PARK</a>
        <a href="contact.html">CONTACT</a>
        <div id="navbar2">
            <?php
            session_start();
            //cista provera da li je logovan ili nije
            if(isset($_SESSION['userName']) && !empty($_SESSION['userName'])){
                echo '<ul>
                               <li style="margin-left:290px"><a href="dashbor.php">'. $_SESSION['userName'].'<a/></li>
                                <li style="margin-left:-150px"><a href="logout.php">Logout</a></li>
                            </ul>';
            }else{
                echo '<ul>
                        <li style="margin-left:300px"><a href="login.html">Log in</a></li>
                        <li style="margin-left:-25px"><a href="register.html">Register</a></li>
                    </ul>';
            }
            ?>
        </div>
    </div>
</div>



<div id="opis">
    <div id="okvir">
        <p class="naslov">-Rent a Car AMG-</p>
        <p class="p1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae cumque temporibus rem. Perferendis
            aspernatur nulla ducimus impedit. Suscipit ratione ipsum repellendus a aspernatur fugiat doloribus quia,
            minima quasi itaque voluptatum? Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, in. Laborum soluta eius architecto
            neque eum repellendus magnam, dicta eaque animi sequi placeat modi rerum aperiam deleniti pariatur aspernatur illum.</p>
        <p id="p2" class="naslov">-Why AMG rent a car-</p>
        <p class="p1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae cumque temporibus rem. Perferendis
            aspernatur nulla ducimus impedit. Suscipit ratione ipsum repellendus a aspernatur fugiat doloribus quia,
            minima quasi itaque voluptatum? Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, in. Laborum soluta eius architecto
            neque eum repellendus magnam, dicta eaque animi sequi placeat modi rerum aperiam deleniti pariatur aspernatur illum.</p>
    </div>
</div>

<div id="location">
    <div class="divnav">
        <p>We have large selection of vehicle</p>
        <hr>
        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae cumque temporibus rem.</h3>
        <a href="/gallery">Learn more</a>
    </div>
    <div class="divnav">
        <p>You can find us on this location</p>
        <hr>
        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae cumque temporibus rem.</h3>
        <a href="/lokacija">Learn more</a>
    </div>
    <div class="divnav">
        <p>You can rent any of those for low price</p>
        <hr>
        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae cumque temporibus rem.</h3>
        <a href="/carpark">Learn more</a>
    </div>
</div>

<div id="logo">
    <img src="images/logo1.jpg" alt="logo"  />
</div>
<div id="car">
    <p>The best super car in town</p>
</div>

<div id="footer">
    <div class="footer"><p>Maksima Gorkog 3 <br/>11000 Belgrade </p></div>
    <div class="footer"><p>www.AMGrentAcar.com</p></div>
    <div class="footer">
        <p>
            <a class="widget" href="https://www.facebook.com/" target="_blank"><img src="images/facebook.jpg" alt="FB" /> </a>
            <a class="widget" href="https://www.instagram.com/" target="_blank"><img  src="images/instagram.jpg" alt="IG" />  </a>
            <a class="widget" href="https://www.twitter.com/" target="_blank"><img  src="images/twiter.jpg" alt="TW" />  </a>
        </p>
    </div>
</div>


</body>

</html>