
@extends('master')

@section('content')
    <div class="col-12 col-md-6 col-lg-4" style="padding-top:5%;padding-bottom:5%;">
        <h1>Editar Lugar</h1>

        <form action="{{ $lugar->id  }}" method="POST">
            @method('PUT')
            {{ csrf_field() }}
            <div>
                <label for="nome">Nome do lugar:</label>
                <input id="nome" type="text" name="nome" value="{{ $lugar->nome }}">
            </div>

            <div>
                <label for="localizacao">Localização:</label>
                <input id="localizacao" type="text" name="localizacao" value="{{ $lugar->localizacao }}"/>
            </div>

            <div>
                <label for="estado">Estado:</label>
                <input id="estado" type="checkbox" name="estado" value="{{ $lugar->estado == 1 }}"/>
            </div>

            <div>
                <input type="submit" value="Editar lugar">
            </div>

        </form>
    </div>

@endsection
