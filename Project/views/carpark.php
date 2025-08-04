<div id="naslov">
    <h1 class="naslov">&bullet; V E H I C L E S &bullet;</h1>
</div>
<div id="sortiranje">
    <ul>
        <li id="sort" >SORT BY:</li>
        <button><li class="mostp" onclick="popular()">MOST POPULAR</li></button>
        <button><li class="alphabetical">ALPHABETICAL</li></button>
        <button><li class="highprice">HIGHEST PRICE</li></button>
        <button><li class="lowprice">LOWEST PRICE</li></button>

    </ul>
</div>

<div id="box">


</div>

<script>
    $(document).ready(function (){
        $.get("/api/administration/products", function (result){
            $.each(JSON.parse(result),function (i,item){
                $("#box").append(
                    "<div class='modeli'>"+
                    "<img src=" +item.slika +">"+
                    "<div class='simpletxt'>"+
                    "<h3>" + item.model  +"</h3>"+
                    "<p>"+
                    "Vrsta goriva: "+ item.gorivo +"<br><br>"+
                    "Vrsta menjaca:"+ item.menjac +"<br><br>"+
                    "Broj mesta za sedenje: "+ item.brojSedista  + " <br><br>"+
                    "klima:"+ item.klima +"<br><br>"+
                    "Kubikaza: "+ item.kubikaza +"cm3<br><br>"+
                    "</p>"+
                    "<h4 class='price'> "+ item.cena +"/day&euro;</h4>"+
                    "<button>" +
                    "<a href='/rentform'>RENT</a>" +
                    "</button><br>"+
                    "</div>"+
                    "</div>"
                );

            });
        });

    });

</script>