<?php
 //stao si na 12.3 vezbama i na 31.37 minutu
//sta o si u daminu da pises od i do

?>
<div class="card  ">
    <div class="card-header pb-0 text-left ">
        <div class="row">
            <div class="col-md-6">
                <h3 class="font-weight-bolder text-info text-gradient">Reports</h3>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <input type="date" class="form-control date-range-helper" id="date-from" placeholder="datum od">
                    </div>
                    <div class="col-md-6">
                        <input type="date" class="form-control date-range-helper" id="date-to" placeholder="datum do">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="chart">
            <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                </div>
                <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                </div>
            </div>
            <div id="rent-panel">
                <canvas id="rents"
                        style="min-height: 450px; height: 450px; max-height: 450px; max-width: 100%; display: block;
                         width: 634px;" width="634" height="250" class="chartjs-render-monitor"></canvas>
            </div><br><br><br>
            <div id="car-panel">
                <canvas id="cars"
                        style="min-height: 450px; height: 450px; max-height: 450px; max-width: 100%; display: block;
                         width: 634px;" width="634" height="250" class="chartjs-render-monitor"></canvas>
            </div><br><br><br>
            <div id="rez-panel">
                <canvas id="rez"
                        style="min-height: 450px; height: 450px; max-height: 450px; max-width: 100%; display: block;
                         width: 634px;" width="634" height="250" class="chartjs-render-monitor"></canvas>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function (){
        rents();

        $(".date-range-helper").change(function(){
            $("#rent-panel").empty();
            $("#rent-panel").append('<canvas id="rents"'+
                'style="min-height: 450px; height: 450px; max-height: 450px; max-width: 100%; display: block; width: 634px;"'+
                'width: 634px;" width="634" height="250" class="chartjs-render-monitor"></canvas>');
            rents();
        })
        $("#car-panel").empty();
        $("#car-panel").append('<canvas id="cars"'+
            'style="min-height: 450px; height: 450px; max-height: 450px; max-width: 100%; display: block; width: 634px;"'+
            'width: 634px;" width="634" height="250" class="chartjs-render-monitor"></canvas>');
        cars();

        $("#rez-panel").empty();
        $("#rez-panel").append('<canvas id="rez"'+
            'style="min-height: 450px; height: 450px; max-height: 450px; max-width: 100%; display: block; width: 634px;"'+
            'width: 634px;" width="634" height="250" class="chartjs-render-monitor"></canvas>');
        rez();
    });

    function rents(){
        var rentsUrl = "/api/rents"
        var data = { "dateFrom": $("#date-from").val() , "dateTo": $("#date-to").val() }
        $.getJSON(rentsUrl, data, function (result){
            var labels = result.map(function (e){
                return e.datum_uzimanja;
            });

            var dataValues = result.map(function (e){
                return e.iznos;
            });

            var graph = $("#rents").get(0).getContext('2d');

            createGraph(dataValues, labels, graph , "Ukupna zarada" ,"Izvestaj o rentovanjima", "line");
        });
    }

    function cars(){
        var rentsUrl = "/api/cars"
        $.getJSON(rentsUrl,  function (result){
            var labels = result.map(function (e){
                return e.model;
            });

            var dataValues = result.map(function (e){
                return e.iznos;
            });

            var graph = $("#cars").get(0).getContext('2d');

            createGraph(dataValues, labels, graph , "Zarada po vozilima" ,"Izvestaj za svako iznajmljeno vozilo", "bar");
        });
    }

    function rez(){
        var rentsUrl = "/api/rez"
        $.getJSON(rentsUrl,  function (result){
            var labels = result.map(function (e){
                return e.datum_uzimanja;
            });

            var dataValues = result.map(function (e){
                return e.iznos;
            });

            var graph = $("#rez").get(0).getContext('2d');

            createGraphic(dataValues, labels, graph , "Rezervacija po danu" ,"Izvestaj za broj rezervacija po danu", "bar");
        });
    }




    function createGraph(dataValues, labels, graph, dataSetLabel, reportLabel ,type){
        new Chart(graph, {
            type: type,
            data: {
                labels: labels,
                datasets: [{
                    data: dataValues,
                    label: dataSetLabel,
                    backgroundColor: 'rgb(255,111,0)',
                    borderColor: 'rgb(255,111,0)',
                    fill: false
                }]
            },
            options: {
                title: {
                    display: true,
                    text: reportLabel
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            max: 3000,
                            min: 0,
                        }
                    }]
                },
                legend: {
                    display: true
                }
            }
        });
    }
    function createGraphic(dataValues, labels, graph, dataSetLabel, reportLabel ,type){
        new Chart(graph, {
            type: type,
            data: {
                labels: labels,
                datasets: [{
                    data: dataValues,
                    label: dataSetLabel,
                    backgroundColor: 'rgb(255,111,0)',
                    borderColor: 'rgb(255,111,0)',
                    fill: false
                }]
            },
            options: {
                title: {
                    display: true,
                    text: reportLabel
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            max: 20,
                            min: 0,
                        }
                    }]
                },
                legend: {
                    display: true
                }
            }
        });
    }


</script>
