@extends('master')

@section('content')
    <div class="d-flex justify-content-center"> <h1>Criar novo parque</h1> <br> </div>
    <div class="col-12 col-md-6 col-lg-12" style="padding-top:5%;padding-bottom:5%;background-color:#e0e0e0;">


        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/parques/new" method="post">

            {{ csrf_field() }}

            <div>
                <label for="nome">Nome do parque:</label>
                <input id="nome" type="text" name="nome" value="{{ old('nome') }}">
            </div>

            <div>
                <label for="localizacao">Localização:</label>
                <input id="localizacao" type="text" name="localizacao" value="{{ old('localizacao') }}"/>
            </div>

            <div>
                <label for="estado">Estado:</label>
                <input id="estado" type="checkbox" name="estado" value="{{ old('estado') }}"/>
            </div>

            <div>
                <input type="submit" value="Criar parque">
            </div>

        </form>
    </div>

@endsection
