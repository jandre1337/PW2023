@extends('master')
'bilhete'=> $bilhete,
'hours'=> $hours,
'preco_a_pagar'=> $preco_a_pagar,
@section('content')
    <div>
        <h1> Pagamento Bilhete nº{{$bilhete->id}} </h1>
        <form action="/bilhete/pagar/{{$bilhete->id}}" method="post">
            @method('PUT')
            {{ csrf_field() }}
            <div>
                <label>Zona:{{$bilhete->zona->tipo_zona}}</label>
            </div>

            <div>
                <label>Matricula veiculo:{{ $bilhete->veiculo != null?$bilhete->veiculo->matricula:$bilhete->matricula}}</label>
            </div>

            <div>
                <label>Taxa da zona:{{$bilhete->zona->valor_zona}}</label>
            </div>

            <div>
                <label>Data Entrada:{{$bilhete->data_entrada}}</label>
            </div>

            <div>
                <label>Data Saida:{{$bilhete->data_saida}}</label>
            </div>

            <div>
                <label>Horas:{{$hours}}</label>
            </div>

            <div>
                <label><b>Preço a pagar:{{$preco_a_pagar}}</b></label>
            </div>

            <button type="submit">Pagar Bilhete</button>
        </form>
    </div>
@endsection
