@extends('master')

@section('content')
    <div class="col-12 col-md-6 col-lg-4" style="padding-top:5%;padding-bottom:5%;">
        <h1>Edit Zona</h1>

        <form action="{{ $zona->id  }}" method="POST">
            @method('PUT')
            {{ csrf_field() }}
            <div>
                <label for="tipo_zona">Tipo zona:</label>
                <input id="tipo_zona" type="text" name="tipo_zona" value="{{ $piso->tipo_zona }} ">
            </div>

            <div>
                <label for="piso_id">Piso:</label>
                <select  name="piso_id">
                    @if ($pisos->count())
                        @foreach($pisos as $piso)
                            <option value="{{ $piso->id }}" {{ $selectedPiso == $piso->id ? 'selected="selected"' : '' }}>{{ $piso->n_piso }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div>
                <label for="valor_zona">Valor Zona:</label>
                <input id="valor_zona" type="number" name="valor_zona" value="{{ $piso->valor_zona }}"/>
            </div>
            <div>
                <input type="submit" value="Edit Zona">
            </div>

        </form>
    </div>

@endsection
