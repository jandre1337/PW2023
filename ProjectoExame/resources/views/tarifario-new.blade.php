@extends('master')

@section('content')
    <div class="d-flex justify-content-center"> <h1>Nova ficha de Tarifa</h1> <br> </div>
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

        <form action="/tarifarios/new" method="post">

            {{ csrf_field() }}

            <div>
                <label for="nome">Nome:</label>
                <input id="nome" type="text" name="nome" value="{{ old('nome') }}">
            </div>

            <div>
                <label for="preco">Preço:</label>
                <input id="preco" type="currency" name="preco" value="{{ old('preco') }}"/>
            </div>

            <div>
                <label for="taxa_extra">Taxa Extra:</label>
                <input id="taxa_extra" type="currency" name="taxa_extra" value="{{ old('taxa_extra') }}"/>
            </div>
            <div>
                <label for="desconto">Desconto:</label>
                <input id="desconto" type="number" name="desconto" value="{{ old('desconto') }}"/>
            </div>

            <div>
                <input type="submit" value="Add Tarifa">
            </div>

        </form>
    </div>

@endsection
