@extends('master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm">
                Total de Clientes Registados
                <b>{{$count_clients}}</b>
            </div>
            <div class="col-sm">
                % de ocupação do parque
            </div>
            <div class="col-sm">
                Receitas semanais
            </div>
        </div>
    </div>
   <h1>Gráficos</h1>
    <div class="container">
        <div>
            <script>
                window.onload = function() {

                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        title: {
                            text: "Hourly Average CPU Utilization"
                        },
                        axisX: {
                            title: "Time"
                        },
                        axisY: {
                            title: "Percentage",
                            suffix: "%",
                            includeZero: true
                        },
                        data: [{
                            type: "line",
                            name: "CPU Utilization",
                            connectNullData: true,
                            //nullDataLineDashType: "solid",
                            xValueType: "dateTime",
                            xValueFormatString: "DD MMM hh:mm TT",
                            yValueFormatString: "#,##0.##\"%\"",
                            dataPoints: [
                                { x: 1501048673000, y: 35.939 },
                                { x: 1501052273000, y: 40.896 },
                                { x: 1501055873000, y: 56.625 },
                                { x: 1501059473000, y: 26.003 },
                                { x: 1501063073000, y: 20.376 },
                                { x: 1501066673000, y: 19.774 },
                                { x: 1501070273000, y: 23.508 },
                                { x: 1501073873000, y: 18.577 },
                                { x: 1501077473000, y: 15.918 },
                                { x: 1501081073000, y: null }, // Null Data
                                { x: 1501084673000, y: 10.314 },
                                { x: 1501088273000, y: 10.574 },
                                { x: 1501091873000, y: 14.422 },
                                { x: 1501095473000, y: 18.576 },
                                { x: 1501099073000, y: 22.342 },
                                { x: 1501102673000, y: 22.836 },
                                { x: 1501106273000, y: 23.220 },
                                { x: 1501109873000, y: 23.594 },
                                { x: 1501113473000, y: 24.596 },
                                { x: 1501117073000, y: 31.947 },
                                { x: 1501120673000, y: 31.142 }
                            ]
                        }]
                    });
                    chart.render();

                }
            </script>
        </div>
        <div>
        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>
    </div>
    <div class="container">
        <div>
            <script>
                window.onload = function () {

                    var chart2 = new CanvasJS.Chart("chartContainer2", {
                        animationEnabled: true,
                        exportEnabled: true,
                        theme: "light1", // "light1", "light2", "dark1", "dark2"
                        title:{
                            text: "Simple Column Chart with Index Labels"
                        },
                        axisY: {
                            includeZero: true
                        },
                        data: [{
                            type: "column", //change type to bar, line, area, pie, etc
                            //indexLabel: "{y}", //Shows y value on all Data Points
                            indexLabelFontColor: "#5A5757",
                            indexLabelFontSize: 16,
                            indexLabelPlacement: "outside",
                            dataPoints: [
                                { x: 10, y: 71 },
                                { x: 20, y: 55 },
                                { x: 30, y: 50 },
                                { x: 40, y: 65 },
                                { x: 50, y: 92, indexLabel: "\u2605 Highest" },
                                { x: 60, y: 68 },
                                { x: 70, y: 38 },
                                { x: 80, y: 71 },
                                { x: 90, y: 54 },
                                { x: 100, y: 60 },
                                { x: 110, y: 36 },
                                { x: 120, y: 49 },
                                { x: 130, y: 21, indexLabel: "\u2691 Lowest" }
                            ]
                        }]
                    });
                    chart2.render();

                }
            </script>
        </div>
        <div>
            <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>
    </div>

@endsection
