@extends('master')

@section('content')
    <div class="col-12 col-md-6 col-lg-4" style="padding-top:5%;padding-bottom:5%;">
        <h1>Edit Zona Tarifa</h1>

        <form action="{{ $zonatarifa->id  }}" method="POST">
            @method('PUT')
            {{ csrf_field() }}
            <div>
                <label for="name">Name:</label>
                <input id="name" type="text" name="name" value="{{ $zonatarifa->name}}">
            </div>

            <div>
                <label for="cc">CC:</label>
                <input id="cc" type="number" name="cc" value="{{ $zonatarifa->CC }}"/>
            </div>

            <div>
                <label for="email">Email:</label>
                <input id="email" type="text" name="email" value="{{ $zonatarifa->Email}}"/>
            </div>

            <div>
                <input type="submit" value="Edit Zona Tarifa">
            </div>

        </form>
    </div>

@endsection
