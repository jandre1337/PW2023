@extends('master')
@section('content')
    <div class="mt-12 d-flex justify-content-center m-5" >

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1> Efetuar Registo</h1>
            <div class="mt-6">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" class="w-full mt-1 py-1 px-3 rounded border border-gray-200"
                       value="{{ old('name') }}">

                @error('name')
                <span class="text-red-500 text-xs italic" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mt-6">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="w-full mt-1 py-1 px-3 rounded border border-gray-200"
                       value="{{ old('email') }}">

                @error('email')
                <span class="text-red-500 text-xs italic" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mt-6">
                <label for="email">CC/NIF</label>
                <input type="text" id="cc" name="cc" class="w-full mt-1 py-1 px-3 rounded border border-gray-200"
                       value="{{ old('cc') }}">

                @error('cc')
                <span class="text-red-500 text-xs italic" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mt-4">
                <label for="password">Password</label>
                <input type="password" id="password" name="password"
                       class="w-full mt-1 py-1 px-3 rounded border border-gray-200">

                @error('password')
                <span class="text-red-500 text-xs italic" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mt-4">
                <label for="password_confirmation">Confirmar Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                       class="w-full mt-1 py-1 px-3 rounded border border-gray-200">
            </div>

            <div class="flex justify-between items-center mt-6">
                <button type="submit" class="btn-success py-2 px-3 text-white rounded-lg hover:bg-blue-600">Registar</button>
                <a href="/" class="btn-warning py-2 px-3 text-white rounded-lg">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
