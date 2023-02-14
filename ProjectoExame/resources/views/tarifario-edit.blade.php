@extends('master')

@section('content')
    <div class="col-12 col-md-6 col-lg-4" style="padding-top:5%;padding-bottom:5%;">
        <h1>Edit Tarifas</h1>

        <form action="{{ $tarifa->id  }}" method="POST">
            @method('PUT')
            {{ csrf_field() }}

            <div>
                <label for="nome">Nome:</label>
                <input id="nome" type="text" name="nome" value="{{ $tarifa->nome }}">
            </div>

            <div>
                <label for="preco">Preço:</label>
                <input id="preco" type="currency" name="preco" value="{{ $tarifa->preco }}"/>
            </div>

            <div>
                <label for="taxa_extra">Taxa Extra:</label>
                <input id="taxa_extra" type="currency" name="taxa_extra" value="{{ $tarifa->taxa_extra }}"/>
            </div>
            <div>
                <label for="desconto">Desconto:</label>
                <input id="desconto" type="number" name="desconto" value="{{ $tarifa->desconto }}"/>
            </div>

            <div>
                <input type="submit" value="Edit Tarifa">
            </div>

        </form>
    </div>
    <div class="col-12 col-md-6 col-lg-6" style="padding-top:5%;padding-bottom:5%;">
        <div class="row" style="padding-top:5%;">
            <div class="col-12 col-sm-6">
                <h2> Zonas </h2>
                <div class="col-sm-12 ">
                    <a href="/zonas_tarifa/{{ $tarifa->id }}/new" class="btn btn-success float-right">
                        <i class="fa fa-plus-circle fa-2x"></i> <span style="font-weight: bold;">Nova Zona</span>
                    </a>
                </div>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Data Entrada</th>
                        <th>Data Saida</th>
                        <th>Modalidade</th>
                        <th>Tamanho Frota</th>
                        <th>Preço</th>
                        <th>Taxa Extra</th>
                        <th>Desconto</th>
                    </tr>
                    </thead>
                    <tbody>
                        <div class="container bg-secondary text-white" >
                            @foreach ($tarifa->zona_tarifas as $zona_tarifa)

                                <tr>
                                    <td>{{ $zona_tarifa->data_entrada }}</td>
                                    <td>{{ $zona_tarifa->data_saida }}</td>
                                    <td>{{ $zona_tarifa->modalidade }}</td>
                                    <td>{{ $zona_tarifa->tamanho_frota }}</td>
                                    <td>{{ $zona_tarifa->tarifa->preco}}</td>
                                    <td>{{ $zona_tarifa->tarifa->taxa_extra}}</td>
                                    <td>{{ $zona_tarifa->tarifa->desconto}}</td>
                                    <td>
                                        <a href="/zonas_tarifa/{{$zona_tarifa->id}}" class="btn ">
                                            <i class="fa fa-edit fa-2x"></i>
                                        </a>
                                        <a href="/zonas_tarifa/{{$zona_tarifa->id}}/delete"  class="btn ">
                                            <i class="fa fa-trash fa-2x" ></i>
                                        </a>
                                    </td>
                                </tr>
                          @endforeach
                        </div>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
