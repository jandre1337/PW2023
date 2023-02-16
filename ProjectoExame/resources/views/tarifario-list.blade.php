@extends('master')

@section('content')
    <div class="col-12 col-md-6 col-lg-12" style="padding-top:5%;padding-bottom:5%;">
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-9">
                    <h2>Gerir <b>Tarifas</b></h2>
                </div>
                <div class="col-sm-3">
                    <a href="/tarifarios/new" class="btn btn-success">
                        <i class="fa fa-plus-circle fa-2x"></i> <span style="font-weight: bold;">Nova Tarifa</span>
                    </a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Tarifa</th>
                <th>Preço / hora</th>
                <th>Taxa Extra</th>
                <th>Desconto</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody><div class="container bg-secondary text-white" >
            @foreach ($tarifario as $tarifas)

            <tr>
                <td>{{ $tarifas->nome }}</td>
                <td>{{ $tarifas->preco }} €</td>
                <td>{{ $tarifas->taxa_extra }} €</td>
                <td>{{ $tarifas->desconto }}  %</td>
                <td>
                    <a href="/tarifarios/{{$tarifas->id}}" class="btn ">
                        <i class="fa fa-edit fa-2x"></i>
                    </a>
                    <a href="/tarifarios/{{$tarifas->id}}/delete"  class="btn ">
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
