@extends('master')

@section('content')
    <div class="col-12 col-md-6 col-lg-12" style="padding-top:5%;padding-bottom:5%;">
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-9">
                    <h2>Gerir <b>Parques</b></h2>
                </div>
                <div class="col-sm-3">
                    <a href="/parques/new" class="btn btn-success">
                        <i class="fa fa-plus-circle fa-2x"></i> <span style="font-weight: bold;">Novo parque</span>
                    </a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Localização</th>
                <th>Estado</th>
            </tr>
            </thead>
            <tbody><div class="container bg-secondary text-white" >
            @foreach ($parques as $parque)

            <tr>
                <td>{{ $parque->nome }}</td>
                <td>{{ $parque->localizacao }}</td>
                <td>{{ $parque->estado }}</td>
                <td>
                    <a href="/parques/{{$parque->id}}" class="btn ">
                        <i class="fa fa-edit fa-2x"></i>
                    </a>
                    <a href="/parques/{{$parque->id}}/delete"  class="btn ">
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
