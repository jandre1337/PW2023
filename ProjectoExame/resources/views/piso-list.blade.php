@extends('master')

@section('content')
    <div class="col-12 col-md-6 col-lg-12" style="padding-top:5%;padding-bottom:5%;">
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-9">
                    <h2>Gerir <b>Pisos</b></h2>
                </div>
                <div class="col-sm-3">

                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Parque</th>
                <th>Nº Piso</th>
                <th>Qtd de Lugares</th>
                <th>Estado</th>
            </tr>
            </thead>
            <tbody><div class="container bg-secondary text-white" >
            @foreach ($pisos as $piso)

            <tr>
                <td>{{ $piso->parque->nome }}</td>
                <td>{{ $piso->n_piso }}</td>
                <td>{{ $piso->qtdd_lugares }}</td>
                <td>{{ $piso->estado }}</td>
                <td>
                    <a href="/pisos/{{$piso->id}}" class="btn ">
                        <i class="fa fa-edit fa-2x"></i>
                    </a>
                    <a href="/pisos/{{$piso->id}}/delete"  class="btn ">
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
