<img class="img-responsive" src="/img/logo.jpg" style="height:300px;width:100%;" >
<nav class="navbar navbar-expand-sm" style="background-color:#a2c4c9;">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link font-weight-bold" style="color:black" href="/dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link font-weight-bold" style="color:black"; href="/clientes">Clientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link font-weight-bold" style="color:black"; href="/parques">Parques</a>
        </li>
        <li class="nav-item">
            <a class="nav-link font-weight-bold" style="color:black"; href="/tarifarios">Tarifarios</a>
        </li>
        <li class="nav-item">
            <a class="nav-link font-weight-bold" style="color:black"; href="/frotas">Frotas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link font-weight-bold" style="color:black"; href="/pisos">Pisos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link font-weight-bold" style="color:black"; href="/bilhete">Testes</a>
        </li>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')"
                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
    </ul>


</nav>
