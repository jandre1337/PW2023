
@extends('master')

@section('content')
    <div class="col-12 col-md-6 col-lg-4" style="padding-top:5%;padding-bottom:5%;">
        <h1>Editar Veiculo nº {{ $veiculo->id  }}</h1>

        <form action="{{ $veiculo->id  }}" method="POST">
            @method('PUT')
            {{ csrf_field() }}

            <div>
                <label for="frota_id">Frota:</label>
                <select  name="frota_id">
                    @if ($frotas->count())
                        @foreach($frotas as $frota)
                            <option value="{{ $frota->id }}" {{ $selectedFrota == $frota->id ? 'selected="selected"' : '' }}>{{ $frota->nome }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div>
                <label for="matricula">Matricula:</label>
                <input id="matricula" type="text" name="matricula" value="{{ $veiculo->matricula }}">
            </div>

            <div>
                <label for="marca">Marca:</label>
                <input id="marca" type="text" name="marca" value="{{ $veiculo->marca }}"/>
            </div>

            <div>
                <label for="modelo">Modelo:</label>
                <input id="modelo" type="text" name="modelo" value="{{ $veiculo->modelo }}"/>
            </div>
            <div>
                <label for="ano">Ano:</label>
                <input id="ano" type="number" name="ano" value="{{ $veiculo->ano }}"/>
            </div>

            <div>
                <input type="submit" value="Editar veiculo">
            </div>

        </form>
    </div>
@endsection
