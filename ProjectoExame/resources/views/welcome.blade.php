@extends('master')

@section('content')
    <div class="container">
        <div class="row" style = "background:#86b7fe"><h1> Bem-vindo ao UAÇ Parques</h1></div>
        <div class="row">
            <div class="col-6">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1> Iniciar Sessão</h1>
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Guardar password') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4 mb-4">


                        <x-primary-button class="ml-3 btn-success">
                            {{ __('Entrar') }}
                        </x-primary-button>
                        <a class="btn btn-info" href="/register" role="button"> Registo</a>


                    </div>



                </form></div>
            <div class="col-6"><h2> Tabela de Preços</h2> <table style="border: 1px solid;">
                    <tr style="border: 1px solid; text-align: center;">
                        <th STYLE="border: 1px solid;">Nome   </th>
                        <th STYLE="border: 1px solid;">Horário</th>
                        <th STYLE="border: 1px solid;">Preço  </th>
                    </tr>
                    <tr style="padding:2px;">
                        <td STYLE="border: 1px solid;">Diurno </td>
                        <td STYLE="border: 1px solid;"> 8:00 às 20:00H</td>
                        <td STYLE="border: 1px solid;"> 0,30 €/hora</td>
                    </tr>
                    <tr STYLE="border: 1px solid; padding:2px;">
                        <td STYLE="border: 1px solid;">Noturno </td>
                        <td STYLE="border: 1px solid;">20:00 às 8:00H</td>
                        <td STYLE="border: 1px solid;">0,20 €/hora</td>
                    </tr>
                </table> <br>
                <p style="font-weight: bold;">  O registo permite usufruir de promoções e outras combinações de tarifário.</p>
            </div>
        </div>
    </div>
@endsection
