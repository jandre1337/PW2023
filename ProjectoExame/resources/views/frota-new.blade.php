@extends('master')

@section('content')
    <div class="d-flex justify-content-center"> <h1>Nova frota</h1> <br> </div>
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

        <form action="/frotas/new" method="post">

            {{ csrf_field() }}

            <div>
                <label for="nome">Nome:</label>
                <input id="nome" type="text" name="nome" value="{{ old('nome') }}">
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
                <input type="submit" value="Adicionar Frota">
            </div>

        </form>
    </div>

@endsection
