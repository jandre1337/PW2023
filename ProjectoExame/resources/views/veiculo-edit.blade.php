
@extends('master')

@section('content')
    <div class="col-12 col-md-6 col-lg-4" style="padding-top:5%;padding-bottom:5%;">
        <h1>Editar Parque</h1>

        <form action="{{ $veiculo->id  }}" method="POST">
            @method('PUT')
            {{ csrf_field() }}
            <div>
                <label for="nome">Matricula:</label>
                <input id="nome" type="text" name="matricula" value="{{ $veiculo->matricula }}">
            </div>

            <div>
                <label for="localizacao">Marca:</label>
                <input id="localizacao" type="text" name="marca" value="{{ $veiculo->marca }}"/>
            </div>

            <div>
                <label for="estado">Modelo:</label>
                <input id="estado" type="checkbox" name="modelo" value="{{ $veiculo->modelo }}"/>
            </div>
            <div>
                <label for="estado">Ano:</label>
                <input id="estado" type="checkbox" name="ano" value="{{ $veiculo->ano }}"/>
            </div>

            <div>
                <input type="submit" value="Editar veiculo">
            </div>

        </form>
    </div>
    <div class="col-12 col-md-6 col-lg-6" style="padding-top:5%;padding-bottom:5%;">
        <div class="row" style="padding-top:5%;">
            <div class="col-12 col-sm-6">
                <h2>Pisos</h2>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Matricula</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Ano</th>
                        <th>Dono</th>
                        <th># de Frota</th>
                    </tr>
                    </thead>
                    <tbody><div class="container bg-secondary text-white" >
                        @foreach ($veiculo as $veiculos)

                            <tr>
                                <td>{{$veiculos->matricula}}</td>
                                <td>{{$veiculos->marca}}</td>
                                <td>{{$veiculos->modelo}}</td>
                                <td>{{$veiculos->ano}}</td>
                                <td> user _ id </td>
                                <td>frota  _ id </td>
                            </tr>
                        @endforeach
                    </div></table>
            </div>

        </div>
    </div>

@endsection
