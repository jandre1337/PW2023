
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
                <input id="estado" type="checkbox" name="estado" value="{{ $parque->estado }}"/>
            </div>

            <div>
                <input type="submit" value="Editar parque">
            </div>

        </form>
    </div>
    <div class="col-12 col-md-6 col-lg-6" style="padding-top:5%;padding-bottom:5%;">
        <div class="row" style="padding-top:5%;">

            <div class="col-12 col-sm-12">
                <h2> Pisos</h2>
                <div class="col-sm-12 ">
                    <a href="/pisos/{{ $parque->id }}/new" class="btn btn-success float-right">
                        <i class="fa fa-plus-circle fa-2x"></i> <span style="font-weight: bold;">Novo Piso</span>
                    </a>
                </div>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Nº Piso</th>
                        <th>Lugares</th>
                        <th>Estado</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($pisos as $piso)

                            <tr>
                                <td>{{ $piso->n_piso }}</td>
                                <td>{{ $piso->qtdd_lugares }}</td>
                                <td>{{ $piso->estado }}</td>
                                <td>
                                    <a href="/pisos/{{$piso->id}}" class="btn ">
                                        <i class="fa fa-edit fa-2x"></i>
                                    </a>
                                    <a href="/pisos/{{$piso->id}}/delete"  class="btn ">
                                        <i class="fa fa-trash fa-2x" ></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </div></table>
            </div>

        </div>
    </div>

@endsection
