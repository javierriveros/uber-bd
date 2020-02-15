<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="https://d3i4yxtzktqr9n.cloudfront.net/uber-sites/04e09deee72d5fce182103961d90edb8.svg" class="img-fluid" style="height: 26px;" alt="Uber Logo">
            {{-- {{ config('app.name', 'Uber App') }} --}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @auth
                    @if(Auth::user()->esAdministrador())
                        <li class="nav-item dropdown">
                            <a id="adminDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Administrar <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminDropdown">
                                <a class="dropdown-item"
                                   href="{{ route('facturas.index') }}"><i class="fa fa-calculator"></i> {{ __('Facturas') }}</a>
                                <a class="dropdown-item"
                                   href="{{ route('vehiculos.index') }}"><i class="fa fa-car"></i> {{ __('Vehículos') }}</a>
                                <a class="dropdown-item"
                                   href="{{ route('usuarios.index') }}"><i class="fa fa-users"></i> {{ __('Usuarios') }}</a>
                                <a class="dropdown-item"
                                   href="{{ route('tarifas.index') }}"><i class="fa fa-money-bill-wave"></i> {{ __('Tarifas') }}</a>
                                <a class="dropdown-item"
                                   href="{{ route('metodos_pago.index') }}"><i class="fa fa-credit-card"></i> {{ __('Métodos de pago') }}</a>
                                <a class="dropdown-item"
                                   href="{{ route('ubicaciones.index') }}"><i class="fa fa-map-marker"></i> {{ __('Ubicaciones') }}</a>
                            </div>
                        </li>
                    @endif
                    @if(Auth::user()->esConductor() && $vehiculo == null)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vehiculos.create') }}">{{ __('Agregar mi vehículo') }}</a>
                        </li>
                    @endif

                @endauth
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name . " " . Auth::user()->apellido }} <span class="badge badge-info text-white font-weight-normal">{{Auth::user()->rol()}}</span> <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a
                                class="dropdown-item"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i>  {{ __('Cerrar sesión') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
