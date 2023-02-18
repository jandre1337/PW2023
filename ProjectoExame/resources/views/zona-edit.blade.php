@extends('master')

@section('content')
    <div class="col-12 col-md-6 col-lg-4" style="padding-top:5%;padding-bottom:5%;">
        <h1>Editar Zona</h1>

        <form action="{{ $zona->id  }}" method="POST">
            @method('PUT')
            {{ csrf_field() }}

            <div>
                <label for="tipo_zona">Tipo zona:</label>
                <input id="tipo_zona" type="text" name="tipo_zona" value="{{ $zona->tipo_zona }}">
            </div>

            <div>
                <label for="piso_id">Piso:</label>
                <select  name="piso_id">
                    @if ($pisos->count())
                        @foreach($pisos as $piso)

                            <option value="{{ $piso->id }}" {{ $selectedPiso == $piso->id ? 'selected="selected"' : '' }}></option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div>
                <label for="valor_zona">Valor Zona:</label>
                <input id="valor_zona" type="currency" name="valor_zona" value="{{ $zona->valor_zona }}"/>
            </div>
            <div>
                <input type="submit" value="Editar Zona">
            </div>

        </form>
    </div>
    <div class="col-12 col-md-6 col-lg-8" style="padding-top:5%;padding-bottom:5%;">
        <div class="row" style="padding-top:5%;">
            <div class="col-sm-12">
                <h2><b>Lugares</b></h2>
            </div>
            <div class="col-12">
                <div class="row">
                @foreach ($zona->lugares as $lugar)
                    <div class="col-2" style="text-align: center;margin:2px;padding: 30px;background-color: {{ $lugar->estado ? $lugar->bemparado ? 'green' : 'orange': 'grey' }}  ;">
                        <a class="text-light" href="/lugar/{{$lugar->id}}">
                            <div>{{$lugar->n_lugar }}{{ $lugar->vip ? '(VIP)' : '' }}</div>
                            <div>{{$lugar->veiculo != null ? $lugar->veiculo->matricula : '' }}</div>
                        </a>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection
