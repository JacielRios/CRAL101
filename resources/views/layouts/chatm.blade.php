<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') . '?version=' . Str::random() }}" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/chat.css') . '?version=' . Str::random() }} }}" />
    @stack('css')
    @livewireStyles

</head>

<body>
    @if (Auth::user()->role == 'user')
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark ps-3 p-lg-2">
                <div class="container-fluid">
                    <a class="navbar-brand d-lg-none m-auto pb-3" href="#">
                        <img style="height: 50px; width:140px;" id="main-logo" class="ps-lg-5 ms-lg-5"
                            src="{{ asset('images/Logo-Cral.png') }}" alt="Logo CRAL101" />
                    </a>
                    <a class="navbar-brand d-none d-lg-block" href="#">
                        <img id="main-logo" class="ps-lg-5 ms-lg-5" src="{{ asset('images/Logo-Cral.png') }}"
                            alt="Logo CRAL101" />
                    </a>
                    <button class="navbar-toggler" id="position" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active lg-ps-2" aria-current="page"
                                    href="{{ url('home') }}">Informaci??n general</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-lg-5" href="{{ route('homeworks.index') }}">Tareas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-lg-5" href="{{ route('grades-user') }}">Historial de
                                    calificaciones</a>
                            </li>
                            <li class="nav-item d-none d-lg-block">
                                <a class="nav-link ps-lg-5" href="{{ route('chat.index') }}"
                                  >Mensajes</a
                                >
                              </li>
                              <li class="nav-item d-lg-none">
                                <a class="nav-link ps-lg-5" href="{{ route('chatm.index') }}"
                                  >Mensajes</a
                                >
                              </li>
                            <li class="nav-item d-lg-none">
                                <a class="nav-link ps-lg-5 pe-lg-5"
                                    href="{{ url('profile-alumno/user') }}">Cuenta</a>
                            </li>
                            <li class="nav-item d-none d-lg-block">
                                <a class="nav-link dropdown ps-lg-5 pe-lg-5" id="navbarDropdown" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if (Auth::user()->image)
                                        <img src="../storage/images_users/{{ Auth::user()->image }}"
                                            class="rounded-circle" id="img-user">
                                    @else
                                        <img class="rounded-circle" id="img-user"
                                            src="{{ asset('images/user-profile.png') }}" />
                                    @endif
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('profile-alumno/user') }}">Cuenta</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar sesi??n') }}
                                        </a>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item d-lg-none">
                                <a class="nav-link ps-lg-5 pe-lg-5" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesi??n') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    @elseif(Auth::user()->role == 'admin')
        <header>
            <header>
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand d-lg-none m-auto pb-3" href="#">
                            <img style="height: 50px; width:140px;" id="main-logo" class="ps-lg-5 ms-lg-5"
                                src="{{ asset('images/Logo-Cral.png') }}" alt="Logo CRAL101" />
                        </a>
                        <a class="navbar-brand d-none d-lg-block" href="#">
                            <img id="main-logo" class="ps-lg-5 ms-lg-5" src="{{ asset('images/Logo-Cral.png') }}"
                                alt="Logo CRAL101" />
                        </a>
                        <button class="navbar-toggler w-80" id="position" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                    class="bi bi-justify" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                </svg></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link active lg-ps-2" aria-current="page"
                                        href="{{ url('home-profesor/post') }}">Informaci??n general</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-lg-5" href="{{ route('homework.index') }}">Tareas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-lg-5" href="{{ url('calificaciones/admin') }}">Historial de
                                        calificaciones</a>
                                </li>
                                <li class="nav-item d-none d-lg-block">
                                    <a class="nav-link ps-lg-5" href="{{ route('chat.index') }}"
                                      >Mensajes</a
                                    >
                                  </li>
                                  <li class="nav-item d-lg-none">
                                    <a class="nav-link ps-lg-5" href="{{ route('chatm.index') }}"
                                      >Mensajes</a
                                    >
                                  </li>
                                <li class="nav-item d-lg-none">
                                    <a class="nav-link ps-lg-5 pe-lg-5"
                                        href="{{ url('profile-profesor/user') }}">Cuenta</a>
                                </li>
                                <li class="nav-item d-none d-lg-block">
                                    <a class="nav-link dropdown ps-lg-5 pe-lg-5" id="navbarDropdown" href="#"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        @if (Auth::user()->image)
                                            <img src="../storage/images_users/{{ Auth::user()->image }}"
                                                class="rounded-circle" id="img-user">
                                        @else
                                            <img class="rounded-circle" id="img-user"
                                                src="{{ asset('images/user-profile.png') }}" />
                                        @endif
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item"
                                                href="{{ url('profile-profesor/user') }}">Cuenta</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar sesi??n') }}
                                            </a>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item d-lg-none">
                                    <a class="nav-link ps-lg-5 pe-lg-5" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesi??n') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        @elseif(Auth::user()->role == 'dir')
            <header>
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand d-lg-none m-auto pb-3" href="#">
                            <img id="main-logo" class="ps-lg-5 ms-lg-5" src="{{ asset('images/Logo-Cral.png') }}"
                                alt="Logo CRAL101" />
                        </a>
                        <a class="navbar-brand d-none d-lg-block" href="#">
                            <img id="main-logo" class="ps-lg-5 ms-lg-5" src="{{ asset('images/Logo-Cral.png') }}"
                                alt="Logo CRAL101" />
                        </a>
                        <button class="navbar-toggler w-80" id="position" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link active lg-ps-2" aria-current="page"
                                        href="{{ url('home-profesor/post') }}">Informaci??n general</a>
                                </li>
                                <li class="nav-item d-none d-lg-block">
                                    <a class="nav-link ps-lg-5" href="{{ route('chat.index') }}"
                                      >Mensajes</a
                                    >
                                  </li>
                                  <li class="nav-item d-lg-none">
                                    <a class="nav-link ps-lg-5" href="{{ route('chatm.index') }}"
                                      >Mensajes</a
                                    >
                                  </li>
                                <li class="nav-item d-lg-none">
                                    <a class="nav-link ps-lg-5 pe-lg-5"
                                        href="{{ url('profile-profesor/user') }}">Cuenta</a>
                                </li>
                                <li class="nav-item d-none d-lg-block">
                                    <a class="nav-link dropdown ps-lg-5 pe-lg-5" id="navbarDropdown" href="#"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        @if (Auth::user()->image)
                                            <img src="../storage/images_users/{{ Auth::user()->image }}"
                                                class="rounded-circle" id="img-user">
                                        @else
                                            <img class="rounded-circle" id="img-user"
                                                src="{{ asset('images/user-profile.png') }}" />
                                        @endif
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item"
                                                href="{{ url('profile-profesor/user') }}">Cuenta</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar sesi??n') }}
                                            </a>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item d-lg-none">
                                    <a class="nav-link ps-lg-5 pe-lg-5" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesi??n') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
    @endif
    <main>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                {{ __('Cerrar sesi??n') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>

        <div class="" id="main-container">
        </div>
        <div class="d-none d-lg-block" id="container-bottom">
            <div class="container-fluid">
                {{ $slot }}
            </div>
        </div>
        <div class="d-lg-none" id="container-bottom_mobile">
            <div class="container-fluid">
                {{ $slot }}
            </div>
        </div>


        
        @livewireScripts

        @stack('js')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
        </script>
        <script>
            document.getElementById('position').onclick = () => {
                let container = document.getElementById("main-container")
                let no = document.getElementById("container-bottom_mobile");
                    no.style.position = 'static';
                    no.style.paddingTop = '10px';
                    container.style.display = 'none';
            }
        </script>
        

    </main>

</body>

</html>
