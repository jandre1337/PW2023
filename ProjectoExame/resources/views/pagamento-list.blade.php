@extends('master')

@section('content')
    <div class="col-12 col-md-6 col-lg-12" style="padding-top:5%;padding-bottom:5%;">
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-9">
                    <h2>Gerir <b>Pagamento</b></h2>
                </div>
                <div class="col-sm-3">
                    <a href="/clientes/new" class="btn btn-success">
                        <i class="fa fa-plus-circle fa-2x"></i> <span style="font-weight: bold;">Nova Pagamento</span>
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
            @foreach ($pagamentos as $pagamento)

            <tr>
                <td>{{ $pagamento->name }}</td>
                <td>{{ $pagamento->preco }}</td>
                <td>{{ $pagamento->desconto }}</td>
                <td>
                    <a href="/pagamentos/{{$pagamento->id}}" class="btn ">
                        <i class="fa fa-edit fa-2x"></i>
                    </a>
                    <a href="/pagamentos/{{$pagamento->id}}/delete"  class="btn ">
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
