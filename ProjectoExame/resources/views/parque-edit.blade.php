
@extends('master')

@section('content')
    <div class="col-12 col-md-6 col-lg-4" style="padding-top:5%;padding-bottom:5%;">
        <h1>Editar Parque</h1>

        <form action="{{ $parque->id  }}" method="POST">
            @method('PUT')
            {{ csrf_field() }}
            <div>
                <label for="nome">Nome do parque:</label>
                <input id="nome" type="text" name="nome" value="{{ $parque->nome }}">
            </div>

            <div>
                <label for="localizacao">Localização:</label>
                <input id="localizacao" type="text" name="localizacao" value="{{ $parque->localizacao }}"/>
            </div>

            <div>
                <label for="estado">Estado:</label>
                <input id="estado" type="checkbox" name="estado" value="{{ $parque->estado == 1 }}"/>
            </div>

            <div>
                <input type="submit" value="Editar parque">
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
                        <th>Piso ID</th>
                        <th>Nº Piso</th>
                        <th>Estado</th>
                        <th>Quantidade Lugares</th>
                    </tr>
                    </thead>
                    <tbody><div class="container bg-secondary text-white" >
                    @foreach ($parque->pisos() as $piso)

                        <tr>
                            <td>{{$piso->id}}</td>
                            <td>{{$piso->n_piso}}</td>
                            <td>{{$piso->estado}}</td>
                            <td>{{$piso->qtdd_lugares}}</td>
                        </tr>
                    @endforeach
                    </div></table>
            </div>

        </div>
    </div>

@endsection
