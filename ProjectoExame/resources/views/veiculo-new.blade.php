@extends('master')

@section('content')
    <div class="d-flex justify-content-center"> <h1>Nova veiculo para o cliente </h1> <br> </div>
    <div class="col-12 col-md-6 col-lg-12 d-flex justify-content-between" style="padding-top:5%;padding-bottom:5%;background-color:#e0e0e0;">


        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/veiculo/new" method="post">

            {{ csrf_field() }}

            <div>
                <label for="matricula">Matricula:</label>
                <input id="matricula" type="text" name="matricula" value="{{ old('matricula') }}">
            </div>

            <div>
                <label for="marca">Marca:</label>
                <input id="marca" type="text" name="marca" value="{{ old('marca') }}"/>
            </div>

            <div>
                <label for="modelo">Modelo:</label>
                <input id="modelo" type="text" name="modelo" value="{{ old('modelo') }}"/>
            </div>
            <div>
                <label for="ano">Ano:</label>
                <input id="ano" type="text" name="ano" value="{{ old('ano') }}"/>
            </div>

            <div>
                <input type="submit" value="Adicionar Carro">
            </div>

        </form>
    </div>

@endsection
