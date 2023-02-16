
@extends('master')

@section('content')
    <div class="col-12 col-md-6 col-lg-4" style="padding-top:5%;padding-bottom:5%;">
        <h1>Editar Frota</h1>

        <form action="{{ $frota->id}}" method="POST">
            @method('PUT')
            {{ csrf_field() }}
            <div>
                <label for="name">Nome:</label>
                <input id="name" type="text" name="name" value="{{ $frota->name}}">
            </div>

            <div>
                <label for="modalidade">Modalidade:</label>
                <select  name="modalidade">
                    <option value="Diario" {{ $selectedModalidade == "Diario" ? 'selected="selected"' : '' }}>Diario</option>
                    <option value="Mensal" {{ $selectedModalidade == "Mensal" ? 'selected="selected"' : '' }}>Mensal</option>
                    <option value="Anual" {{ $selectedModalidade == "Anual" ? 'selected="selected"' : '' }}>Anual</option>
                    <option value="Sem Modalidade" {{ $selectedModalidade == "Sem Modalidade" ? 'selected="selected"' : '' }}>Sem Modalidade</option>
                </select>
            </div>

            <div>
                <input type="submit" value="Edit frota">
            </div>

        </form>
    </div>
    <div class="col-12 col-md-6 col-lg-8" style="padding-top:5%;padding-bottom:5%;">
        <div class="row" style="padding-top:5%;">
            <div class="col-12 col-sm-6">
                <div class="col-sm-9">
                    <h2><b>Veiculos</b></h2>
                </div>
                <div class="col-sm-12 ">
                    <a href="/veiculos/new" class="btn btn-success float-right">
                        <i class="fa fa-plus-circle fa-2x"></i> <span style="font-weight: bold;">Novo Veiculo</span>
                    </a>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">Matricula</th>
                        <th class="text-center ">Marca</th>
                        <th class="text-center ">Modelo</th>
                        <th class="text-center ">Ano</th>
                        <th class="text-center ">Ações</th>
                    </tr>
                    </thead>
                    <tbody><div class="container bg-secondary text-white" >
                    @foreach ($veiculos as $veiculo)
                        <tr>
                            <td>{{$veiculo->matricula }} </td>
                            <td>{{$veiculo->marca }} </td>
                            <td>{{$veiculo->modelo }} </td>
                            <td>{{$veiculo->ano }} </td>
                            <td>
                                <a href="/veiculos/{{$veiculo->id}}" class="btn ">
                                    <i class="fa fa-edit fa-2x"></i>
                                </a>
                                <a href="/veiculos/{{$veiculo->id}}/delete"  class="btn ">
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
