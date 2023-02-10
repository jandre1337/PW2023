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
                Receitas totais
            </div>
        </div>
    </div>

    <div class="container">
        <h1>Gráficos</h1>
        <div class="row">
            <script>
                window.onload = function() {

                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        title: {
                            text: "Hourly Average CPU Utilization"
                        },
                        axisX: {
                            title: "Day"
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
                            xValueFormatString: "DD MMM",
                            yValueFormatString: "#,##0.##\"%\"",
                            dataPoints: [
                                @foreach($weekOfdays as $wod)
                                    { x : {{ $wod["date"] }} , y : {{ $wod["count"] }} }
                                @endforeach
                            ]
                        }]
                    });
                    chart.render();

                    var chart2 = new CanvasJS.Chart("chartContainer2", {
                        animationEnabled: true,
                        exportEnabled: true,
                        theme: "light1", // "light1", "light2", "dark1", "dark2"
                        title:{
                            text: "Entradas por parque"
                        },
                        data: [{
                            type: "column",
                            dataPoints:  [
                                @foreach($bilhetes_por_parque as $bpp)
                                    { label : "{{ $bpp["nome_parque"] }}" , y : {{ $bpp["count"] }}}
                                @endforeach
                            ]
                        }]
                    });
                    chart2.render();
                }
            </script>

            <div id="chartContainer" class="col" style="height: 300px; width: 100%;"></div>
            <div id="chartContainer2" class="col" style="height: 300px; width: 100%;"></div>
        </div>
    </div>

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection
