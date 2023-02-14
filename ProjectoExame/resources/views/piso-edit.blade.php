
@extends('master')

@section('content')
    <div class="col-12 col-md-6 col-lg-4" style="padding-top:5%;padding-bottom:5%;">
        <h1>Editar Piso</h1>

        <form action="{{ $piso->id  }}" method="POST">
            @method('PUT')
            {{ csrf_field() }}
            <div>
                <label for="n_piso">Nº do piso:</label>
                <input id="n_piso" type="number" name="n_piso" value="{{ $piso->n_piso }}">
            </div>

            <div>
                <label for="parque_id">Parque:</label>
                <select  name="parque_id">
                    @if ($parques->count())
                        @foreach($parques as $parque)
                            <option value="{{ $parque->id }}" {{ $selectedParque == $parque->id ? 'selected="selected"' : '' }}>{{ $parque->nome }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div>
                <label for="qtdd_lugares">Qtdd. de Lugares:</label>
                <input id="qtdd_lugares" type="number" name="qtdd_lugares" value="{{ $piso->qtdd_lugares }}"/>
            </div>

            <div>
                <label for="estado">Estado:</label>
                <input type="checkbox" name="estado" {{ $piso->estado==1 ? 'checked': '' }}/>

            </div>

            <div>
                <input type="submit" value="Editar piso">
            </div>

        </form>
    </div>
    <div class="col-12 col-md-6 col-lg-6" style="padding-top:5%;padding-bottom:5%;">
        <div class="row" style="padding-top:5%;">
            <div class="col-12 col-sm-12">
                <div class="col-sm-9">
                    <h2><b>Zonas</b></h2>
                </div>
                <div class="col-sm-12 ">
                    <a href="/zonas/new" class="btn btn-success float-right">
                        <i class="fa fa-plus-circle fa-2x"></i> <span style="font-weight: bold;">Nova Zona</span>
                    </a>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Piso </th>
                        <th>Tipo </th>
                        <th>Valor </th>
                        <th>Ações </th>
                    </tr>
                    </thead>
                    <tbody><div class="container bg-secondary text-white" >
                    @foreach ($zonas as $zona)

                        <tr>
                            <td>{{$zona->piso_id}}</td>
                            <td>{{$zona->tipo_zona}}</td>
                            <td>{{$zona->valor_zona}}</td>
                            <td>
                                <a href="/zonas/{{$zona->id}}" class="btn ">
                                    <i class="fa fa-edit fa-2x"></i>
                                </a>
                                <a href="/zonas/{{$zona->id}}/delete"  class="btn ">
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
