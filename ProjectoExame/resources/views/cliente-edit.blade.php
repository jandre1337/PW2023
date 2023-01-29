<?php
@extends('master')

@section('content')
    <div class="col-12 col-md-6 col-lg-4" style="padding-top:5%;padding-bottom:5%;">
        <h1>Edit Customer</h1>

        <form action="{{ $cliente->cc  }}" method="POST">
            @method('PUT')
            {{ csrf_field() }}
            <div>
                <label for="name">Name:</label>
                <input id="name" type="text" name="name" value="{{ $cliente->name}}">
            </div>

            <div>
                <label for="cc">CC:</label>
                <input id="cc" type="number" name="cc" value="{{ $cliente->CC }}"/>
            </div>

            <div>
                <label for="email">Email:</label>
                <input id="email" type="text" name="email" value="{{ $cliente->Email}}"/>
            </div>

            <div>
                <input type="submit" value="Edit customer">
            </div>

        </form>
    </div>
    <div class="col-12 col-md-6 col-lg-6" style="padding-top:5%;padding-bottom:5%;">
        <div class="row" style="padding-top:5%;">
            <div class="col-12 col-sm-6">
                <h2>Veiculos</h2>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Sale ID</th>
                        <th></th>
                        <th>Product ID</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Total Sale</th>
                    </tr>
                    </thead>
                    <tbody><div class="container bg-secondary text-white" >
                    @foreach ($frotas as $frota)

                        <tr>
                            <td><a class="btn btn-success" data-toggle="collapse" href="#frota{{$frota->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">+</a></td>
                            <td>{{$frota->id }} </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{$frota->tamanho_frota}}</td>
                        </tr>
                        @foreach ($frota->veiculo as $veiculo)
                            <tr class="collapse multi-collapse" id="frota{{$frota->id}}">
                                <td><a class="btn btn-warning" data-toggle="collapse" href="#veiculo{{$frota->id}}{{$veiculo->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">+</a></td>
                                <td>{{$frota->id}}</td>
                                <td>{{$veiculo->id}}</td>
                                <td>{{$veiculo->matricula}}</td>
                                <td>{{$veiculo->marca}}</td>
                                <td>{{$veiculo->modelo}}</td>
                                <td>{{$veiculo->ano}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    @endforeach
                    </div></table>
            </div>

        </div>
    </div>

@endsection
