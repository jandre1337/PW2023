@extends('master')

@section('content')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-9">
                        <h2>Gerir <b>Veiculos</b></h2>
                    </div>
                    <div class="col-sm-3">
                        <a href="/veiculos/new" class="btn btn-success">
                            <i class="fa fa-plus-circle fa-2x"></i> <span style="font-weight: bold;">Adicionar novo veiculo</span>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Matricula</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>ano</th>
                </tr>
                </thead>
                <tbody><div class="container bg-secondary text-white" >
                    @foreach ($veiculos as $veiculo)
                        <tr>
                            <td>{{ $veiculo->matricula }}</td>
                            <td>{{ $veiculo->marca }}</td>
                            <td>{{ $veiculo->modelo }}</td>
                            <td>{{ $veiculo->ano }}</td>
                            <td>
                                <a href="/veiculos/{{$veiculo->id}}" class="btn ">
                                    <i class="fa fa-edit fa-2x"></i>
                                </a>
                                <a href="/veiculos/{{$veiculo->id}}/delete"  class="btn ">
                                    <i class="fa fa-trash fa-2x" ></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach </div>


                </tbody>
            </table>

        </div>
    </div>

@endsection
