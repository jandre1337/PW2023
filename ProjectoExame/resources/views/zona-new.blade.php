@extends('master')

@section('content')
    <div class="d-flex justify-content-center"> <h1>Nova Zona</h1> <br> </div>
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

        <form action="/zona/new" method="post">

            {{ csrf_field() }}

            <div>
                <label for="tipo_zona">Tipo zona:</label>
                <input id="tipo_zona" type="text" name="tipo_zona" value="{{ old('tipo_zona') }}">
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
                <input id="valor_zona" type="number" name="valor_zona" value="{{ old('valor_zona') }}"/>
            </div>

            <div>
                <input type="submit" value="Add Zona">
            </div>

        </form>
    </div>

@endsection
