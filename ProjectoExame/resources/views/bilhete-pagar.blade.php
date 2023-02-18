@extends('master')

@section('content')
    <div class="mb-4">
        <h1> Pagamento Bilhete nº{{$bilhete->id}} </h1>
        <form action="{{$tem_saldo_suficiente?"/bilhete/pagar/":"/clientes/saldo/" }}{{$bilhete->id}}" method="post">

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

            <div>
                <label><b>Saldo:{{$saldo}}</b></label>
            </div>

            <input type="hidden" id="preco_a_pagar" name="preco_a_pagar" value="{{$preco_a_pagar}}">

            <button type="submit">{{$tem_saldo_suficiente? "Pagar Bilhete":"Adicionar Saldo"}}</button>
        </form>
    </div>
@endsection
