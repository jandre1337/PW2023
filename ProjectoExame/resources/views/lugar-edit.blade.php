
@extends('master')

@section('content')
    <div class="col-12 col-md-6 col-lg-4" style="padding-top:5%;padding-bottom:5%;">
        <h1>Editar Lugar</h1>

        <form action="{{ $lugar->id  }}" method="POST">
            @method('PUT')
            {{ csrf_field() }}

            <div>
                <label>Nº do lugar: {{ $lugar->n_lugar }}</label>s
            </div>

            <div>
                <label>Zona: {{ $lugar->zona->tipo_zona }}</label>
            </div>

            <div>
                <label for="veiculo_id">Veiculo:</label>
                <select  name="veiculo_id">
                    @if ($veiculos->count())
                        @foreach($veiculos as $veiculo)
                            <option value="{{ $veiculo->id }}" }}>{{ $veiculo->matricula }}</option>
                        @endforeach
                    @endif
                </select>
            </div>



            <div>
                <label for="estado">Estado:</label>
                <input id="estado" type="checkbox" name="estado" value="{{ $lugar->estado}}"/>
            </div>

            <div>
                <label for="vip">VIP:</label>
                <input id="vip" type="checkbox" name="vip" value="{{ $lugar->vip}}"/>
            </div>

            <div>
                <input type="submit" value="Editar lugar">
            </div>

        </form>
    </div>

@endsection
