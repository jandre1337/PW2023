@extends('master')

@section('content')
    <div class="d-flex justify-content-center"> <h1>Nova ficha de cliente</h1> <br> </div>
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

        <form action="/clientes/new" method="post">

            {{ csrf_field() }}

            <div>
                <label for="designation">Nome:</label>
                <input id="designation" type="text" name="name" value="{{ old('name') }}">
            </div>

            <div>
                <label for="vatNumber">CC:</label>
                <input id="vatNumber" type="number" name="cc" value="{{ old('cc') }}"/>
            </div>

            <div>
                <label for="email">Email:</label>
                <input id="email" type="text" name="email" value="{{ old('email') }}"/>
            </div>
            <div>
                <label for="password">Password:</label>
                <input id="password" type="password" name="password" value="{{ old('email') }}"/>
                https://laravel.com/docs/9.x/hashing
            </div>

            <div>
                <input type="submit" value="Add Cliente">
            </div>

        </form>
    </div>

@endsection
