@extends('master')

@section('content')
    <div class="d-flex justify-content-center"> <h1>Criar novo piso</h1> <br> </div>
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

        <form action="/pisos/{{$id}}/new" method="post">

            {{ csrf_field() }}

            <div>
                <label for="n_piso">Andar:</label>
                <input id="n_piso" type="number" name="n_piso" value="{{ old('n_piso') }}">
            </div>

            <div>
                <label for="lugares">Quantidade de Lugares:</label>
                <input id="lugares" type="number" name="lugares" value="{{ old('lugares') }}"/>
            </div>

            <div>
                <label for="estado">Estado:</label>
                <input id="estado" type="checkbox" name="estado" value="{{ old('estado') }}"/>
            </div>

            <div>
                <input type="submit" value="Criar piso">
            </div>

        </form>
    </div>

@endsection
