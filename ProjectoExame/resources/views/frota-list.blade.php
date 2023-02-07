@extends('master')

@section('content')
    <div class="col-12 col-md-6 col-lg-12" style="padding-top:5%;padding-bottom:5%;">
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-9">
                    <h2>Gerir <b>Frotas</b></h2>
                </div>
                <div class="col-sm-3">
                    <a href="/frotas/new" class="btn btn-success">
                        <i class="fa fa-plus-circle fa-2x"></i> <span style="font-weight: bold;">Novo Frota</span>
                    </a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Nome Frota</th>
                <th># Frota</th>
                <th>Quantidade Veiculos</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody><div class="container bg-secondary text-white" >
            @foreach ($frotas as $frota)

            <tr>
                <td>{{ $frota->nome }}</td>
                <td>{{ $frota->id }}</td>
                <td>{{ $tamanho_frota[$frota->id]  }}</td>
                <td>
                    <a href="/frotas/{{$frota->id}}" class="btn ">
                        <i class="fa fa-edit fa-2x"></i>
                    </a>
                    <a href="/frotas/{{$frota->id}}/delete"  class="btn ">
                        <i class="fa fa-trash fa-2x" ></i>
                    </a>
                </td>
            </tr>
                @endforeach </div>


            </tbody>
        </table>

    </div>
</div>
    </div>
@endsection
