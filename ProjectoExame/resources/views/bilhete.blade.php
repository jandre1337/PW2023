@extends('master')

@section('content')
    <div>
        <h1> Entrada de Veiculo</h1>
        <form action="bilhete" method="post">
            @method('POST')
            {{ csrf_field() }}
            <div>
                <label for="matricula">Matricula:</label>
                <input id="matricula" type="text" name="matricula" value="{{ old('matricula') }}">
            </div>
            <div>
                <label for="zona_id">Zona:</label>
                <select  name="zona_id">
                    @if ($zonas->count())
                        @foreach($zonas as $zona)
                            <option value="{{ $zona->id }}">{{ $zona->piso->parque->nome }} Piso:{{ $zona->piso->n_piso }} Zona:{{ $zona->tipo_zona }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <button type="submit">Registar entrada</button>
        </form>
    </div>
    <div>
        <h1> Saida de Veiculo</h1>
        <form action="/action_page.php">
            <p> Preço a pagar</p>
            <div>
                <label for="bilhete_id">Bilhete:</label>
                <select  name="bilhete_id">
                    @if ($bilhetes->count())
                        @foreach($bilhetes as $bilhete)
                            @if ($bilhete->data_saida == null)
                                <option value="{{ $bilhete->id }}">Nº: {{ $bilhete->id }} Veiculo:{{ $bilhete->veiculo->matricula }} </option>
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>
        </form>
    </div>

@endsection
