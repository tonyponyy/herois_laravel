<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/css.css') }}" />
        <!-- Titulo pagina -->
        <title> @yield('titol') </title>
    </head>
    <body>
        <div id="container_cabecera">
            <div id="logo" class="primary c_gray"> <img src="{{ asset('images/logo.png') }}"><img></div>
            <div id="cabecera" class="primary">
                <div id="titulo_cabecera">
                  <!-- Titulo cabecera -->
                    <h3>@yield('titol') </h3>
                </div>
                <div id="links_cabecera">
                  <!-- Links cabecera -->
                    <ul>
                        @yield('links_de_capcelera')
                        <li>//</li>
                        @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" ></a>
                        

                          
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    ⭐ {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                
                            
                        
                   
                    @else
                        <a href="{{ route('login') }}" >Inciar sesió</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registre</a>
                        @endif
                    @endauth
            @endif




                    </ul>
                </div>
            </div>
        </div>
        <div id="container_pag">
            <div class="primary c_dark" id="barra_izquierda">
              <!-- Links izquierda -->
                <ul>
                @auth
                    @if(Auth::user()->is_admin)
                        <li> <a href="{{ route('planets.index') }}">Planetes</a></li>
                        <li> <a href="{{ route('superPower.index') }}">Super poders</a></li>
                    @endif
                    <li> <a href="{{ route('superhero.index') }}">Super herois</a></li>
                    <li> <a href="{{ route('mysuperhero.index') }}">Els meus super herois</a></li>
                @endauth
                </ul>
            </div>
            <div id="centro">
                <!-- Contenido de la pagina -->
                @yield('contingut')
              <!-- Contenido de la pagina -->    
            </div>
        </div>
    </body>
</html>