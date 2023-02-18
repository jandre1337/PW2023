@extends('master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3 text-light" style="text-align: center;margin:2px;padding: 20px;background-color:cornflowerblue;">
                Total de Clientes Registados
                <b>{{$count_clients}}</b>

            </div>

            <div class="col-3 text-light" style="text-align: center;margin:2px;padding: 20px;background-color:cornflowerblue;">
                Total de Veiculos Registados
                <b>{{$count_veiculos}}</b>

            </div>
            <div class="col-3 text-light" style="text-align: center;margin:2px;padding: 20px;background-color:cornflowerblue;">
                Quantidade de frotas
                <b>{{$count_frotas}} </b>

            </div>
            <div class="col-2 text-light" style="text-align: center;margin:2px;padding: 20px;background-color:cornflowerblue;">
                Receitas totais
                <b>{{$receitas}}€</b>

            </div>

        </div>
    </div>

    <div class="container mb-5">
        <h1>Gráficos</h1>
        <div class="row">
            <script>
                window.onload = function() {

                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        title: {
                            text: "Total bilhetes por dia"
                        },
                        axisX: {
                            title: "Dia"
                        },
                        axisY: {
                            title: "Total",
                            suffix: "",
                            includeZero: true
                        },
                        data: [{
                            type: "line",
                            name: "adesão",
                            connectNullData: true,
                            //nullDataLineDashType: "solid",
                            xValueType: "dateTime",
                            xValueFormatString: "DD MMM hh:mm TT",
                            yValueFormatString: "#,##0.##\" bilhetes\"",
                            dataPoints: [
                                @foreach($weekOfdays as $wod)
                                    { x : {{ $wod[0] }} , y : {{ $wod[1] }} },
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
                                    { label : "{{ $bpp["nome_parque"] }}" , y : {{ $bpp["count"] }}},
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
    </div >
    {{json_encode($weekOfdays )}}

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection
