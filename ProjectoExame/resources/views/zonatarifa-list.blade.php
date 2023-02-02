@extends('master')

@section('content')
    <div class="col-12 col-md-6 col-lg-12" style="padding-top:5%;padding-bottom:5%;">
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-9">
                    <h2>Gerir <b>Zona Tarifa</b></h2>
                </div>
                <div class="col-sm-3">
                    <a href="/clientes/new" class="btn btn-success">
                        <i class="fa fa-plus-circle fa-2x"></i> <span style="font-weight: bold;">Nova Zona Tarifa</span>
                    </a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Tarifa</th>
                <th>Preço</th>
                <th>Desconto</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody><div class="container bg-secondary text-white" >
            @foreach ($zonatarifario as $zonatarifas)

            <tr>
                <td>{{ $zonatarifas->name }}</td>
                <td>{{ $zonatarifas->preco }}</td>
                <td>{{ $zonatarifas->desconto }}</td>
                <td>
                    <a href="/zonatarifarios/{{$zonatarifas->id}}" class="btn ">
                        <i class="fa fa-edit fa-2x"></i>
                    </a>
                    <a href="/zonatarifarios/{{$zonatarifas->id}}/delete"  class="btn ">
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
