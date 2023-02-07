
@extends('master')

@section('content')
    <div class="col-12 col-md-6 col-lg-4" style="padding-top:5%;padding-bottom:5%;">
        <h1>Editar Cliente</h1>

        <form action="{{ $cliente->cc}}" method="POST">
            @method('PUT')
            {{ csrf_field() }}
            <div>
                <label for="name">Nome:</label>
                <input id="name" type="text" name="name" value="{{ $cliente->name}}">
            </div>

            <div>
                <label for="cc">NIF:</label>
                <input id="cc" type="number" name="cc" value="{{ $cliente->cc }}"/>
            </div>

            <div>
                <label for="email">Email:</label>
                <input id="email" type="text" name="email" value="{{ $cliente->email}}"/>
            </div>

            <div>
                <input type="submit" value="Edit customer">
            </div>

        </form>
    </div>
    <div class="col-12 col-md-6 col-lg-8" style="padding-top:5%;padding-bottom:5%;">
        <div class="row" style="padding-top:5%;">
            <div class="col-12 col-sm-6">
                <div class="col-sm-9">
                    <h2><b>Frotas</b></h2>
                </div>
                <div class="col-sm-12 ">
                    <a href="/frotas/new" class="btn btn-success float-right">
                        <i class="fa fa-plus-circle fa-2x"></i> <span style="font-weight: bold;">Nova Frota</span>
                    </a>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">Nº de frota</th>
                        <th class="text-center align-middle">Proprietário</th>
                        <th class="text-center">Quantidade de veiculos</th>
                    </tr>
                    </thead>
                    <tbody><div class="container bg-secondary text-white" >
                    @foreach ($frotas as $frota)
                        <tr>
                            <td>{{$frota->id }} </td>
                            <td>{{$frota->user()}}</td>
                            <td>{{$frota->tamanho_frota}}</td>
                        </tr>
                    @endforeach
                    </div></table>
            </div>

        </div>
    </div>

@endsection
