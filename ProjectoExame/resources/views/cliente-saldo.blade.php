@extends('master')

@section('content')
    <div>
        <h1> Adicionar Fundos</h1>
        <form action="/clientes/saldo/{{$bilhete_id}}" method="post">
            @method('PUT')
            {{ csrf_field() }}
            <div>
                <label for="saldo">Montante:</label>
                <input id="saldo" type="currency" name="saldo" value="{{ $user->saldo }}">
            </div>

            <button type="submit">Adicionar fundos</button>
        </form>
    </div>
@endsection
