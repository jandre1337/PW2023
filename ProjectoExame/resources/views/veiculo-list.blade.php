@extends('master')

@section('content')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-9">
                        <h2>Gerir <b>Tarifas</b></h2>
                    </div>
                    <div class="col-sm-3">
                        <a href="/clientes/new" class="btn btn-success">
                            <i class="fa fa-plus-circle fa-2x"></i> <span style="font-weight: bold;">Novo Veiculo</span>
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
                    @foreach ($veiculo as $veiculos)

                        <tr>
                            <td>{{ $veiculos->name }}</td>
                            <td>{{ $veiculos->preco }}</td>
                            <td>{{ $veiculos->desconto }}</td>
                            <td>
                                <a href="/clientes/{{$veiculos->cc}}" class="btn ">
                                    <i class="fa fa-edit fa-2x"></i>
                                </a>
                                <a href="/clientes/{{$veiculos->cc}}/delete"  class="btn ">
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
