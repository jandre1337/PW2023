@extends('master')

@section('content')


    <div>
        <h1> Entrada de Veiculo</h1>
        <form action="/action_page.php">
            <label for="matricula">Matricula:</label>
            <input type="text" id="matricula" name="matricula"><br><br>
        </form>
    </div>
    <div>
        <h1> Saida de Veiculo</h1>
        <form action="/action_page.php">
            <p> Preço a pagar</p>
        </form>
    </div>

@endsection
