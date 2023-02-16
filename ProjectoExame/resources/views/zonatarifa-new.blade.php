@extends('master')

@section('content')
    <div class="d-flex justify-content-center"> <h1>Nova ficha de Zona Tarifa</h1> <br> </div>
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

        <form action="/zonas_tarifa/{{$tarifa_id}}/new" method="post">

            {{ csrf_field() }}

            <div>
                <label for="zona_id">Zona:</label>
                <select  name="zona_id">
                    @if ($zonas->count())
                        @foreach($zonas as $zona)
                            @if ($zona->piso != null and $zona->piso->parque != null )
                                <option value="{{ $zona->id }}" {{ $selectedZona == $zona->id ? 'selected="selected"' : '' }}>Parque: {{$zona->piso->parque->nome}} Piso: {{$zona->piso->n_piso}} Zona: {{$zona->tipo_zona}}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>

            <div>
                <label for="data_entrada">Data Entrada:</label>
                <input id="data_entrada" type="datetime-local" name="data_entrada" value="{{ old('data_entrada') }}">
            </div>

            <div>
                <label for="data_saida">Data Saida:</label>
                <input id="data_saida" type="datetime-local" name="data_saida" value="{{ old('data_saida') }}"/>
            </div>

            <div>
                <label for="modalidade">Modalidade:</label>
                <select  name="modalidade">
                    <option value="Diario" {{ $selectedModalidade == "Diario" ? 'selected="selected"' : '' }}>Diario</option>
                    <option value="Mensal" {{ $selectedModalidade == "Mensal" ? 'selected="selected"' : '' }}>Mensal</option>
                    <option value="Anual" {{ $selectedModalidade == "Anual" ? 'selected="selected"' : '' }}>Anual</option>
                    <option value="Sem Modalidade" {{ $selectedModalidade == "Sem Modalidade" ? 'selected="selected"' : '' }}>Sem Modalidade</option>
                </select>
            </div>

            <div>
                <label for="tamanho_frota">Tamanho Frota:</label>
                <input id="tamanho_frota" type="number" name="tamanho_frota" value="{{ old('tamanho_frota') }}"/>
            </div>

            <div>
                <input type="submit" value="Add Zona Tarifa">
            </div>

        </form>
    </div>


@endsection
