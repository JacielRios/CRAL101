@extends('layouts.app')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/contacts.css') }}" />
    <title>CRAL101</title>
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
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active lg-ps-2" aria-current="page"
                                    href="{{ url('home') }}">Información general</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-lg-5" href="{{ route('homeworks.index') }}">Tareas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-lg-5" href="{{ route('grades-user') }}">Historial de
                                    calificaciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-lg-5" href="{{ url('chat') }}">Mensajes</a>
                            </li>
                            <li class="nav-item d-lg-none">
                                <a class="nav-link ps-lg-5 pe-lg-5" href="{{ url('profile-alumno/user') }}">Cuenta</a>
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
                                            {{ __('Cerrar sesión') }}
                                        </a>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item d-lg-none">
                                <a class="nav-link ps-lg-5 pe-lg-5" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
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
                        <button class="navbar-toggler w-80" type="button" data-bs-toggle="collapse"
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
                                        href="{{ url('home-profesor/post') }}">Información general</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-lg-5" href="{{ route('homework.index') }}">Tareas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-lg-5" href="{{ url('calificaciones/admin') }}">Historial de
                                        calificaciones</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-lg-5" href="{{ url('chat') }}">Mensajes</a>
                                </li>
                                <li class="nav-item d-lg-none">
                                    <a class="nav-link ps-lg-5 pe-lg-5"
                                        href="{{ url('profile-profesor/user') }}">Cuenta</a>
                                </li>
                                <li class="nav-item d-none d-lg-block">
                                    <a class="nav-link dropdown ps-lg-5 pe-lg-5" id="navbarDropdown" href="#"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        <img class="rounded-circle" id="img-user"
                                            src="{{ asset('images/user-profile.png') }}" />
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item"
                                                href="{{ url('profile-profesor/user') }}">Cuenta</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar sesión') }}
                                            </a>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item d-lg-none">
                                    <a class="nav-link ps-lg-5 pe-lg-5" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
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
                        <button class="navbar-toggler w-80" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link active lg-ps-2" aria-current="page"
                                        href="{{ url('home-profesor/post') }}">Información general</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-lg-5" href="{{ url('chat') }}">Mensajes</a>
                                </li>
                                <li class="nav-item d-lg-none">
                                    <a class="nav-link ps-lg-5 pe-lg-5"
                                        href="{{ url('profile-profesor/user') }}">Cuenta</a>
                                </li>
                                <li class="nav-item d-none d-lg-block">
                                    <a class="nav-link dropdown ps-lg-5 pe-lg-5" id="navbarDropdown" href="#"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        <img class="rounded-circle" id="img-user"
                                            src="{{ asset('images/user-profile.png') }}" />
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item"
                                                href="{{ url('profile-profesor/user') }}">Cuenta</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar sesión') }}
                                            </a>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item d-lg-none">
                                    <a class="nav-link ps-lg-5 pe-lg-5" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
    @endif

    <main>
        <section class="container-fluid bg-white p-0 mt-2 text-center d-lg-none">
            <h3 class="pt-2 pb-2 fw-bold">CONTACTOS</h3>
        </section>
        <section class="container-fluid bg-white p-0 mt-2 text-center d-none d-lg-block">
            <h1 class="pt-4 pb-4 fw-bold">CONTACTOS</h1>
        </section>

        <section class="container col-11 mt-2 bg-white fs-5 pb-3 d-lg-none" id="contact-container">
            <form class="pb-3" action="{{ route('contacts.store') }}" method="POST">
                @csrf
                <div class="mb-2 pt-2">
                    <label for="name" class="form-label">Nombre del contacto</label>
                    <input type="text" class="form-control fs-6" id="name" name="name" value="{{ old('name') }}"
                        placeholder="Ingrese el nombre del contacto" required>
                </div>
                <div class="mb-2">
                    <label for="email" class="form-label">Correo electronico</label>
                    <input type="email" class="form-control fs-6" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Ingrese el correo del contacto" required>
                </div>
                <div class="text-end">
                    <input type="submit" class="btn " id="btn-color" value="Crear contacto" />
                </div>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </section>

        <section class="container col-lg-7 mt-5 bg-white fs-2 ps-5 pt-2 pb-3 pe-5 d-none d-lg-block" id="contact-container">
            <form class="pb-3" action="{{ route('contacts.store') }}" method="POST">
                @csrf
                <div class="mb-3 pt-3">
                    <label for="name" class="form-label">Nombre del contacto</label>
                    <input type="text" class="form-control fs-3" id="name" name="name" value="{{ old('name') }}"
                        placeholder="Ingrese el nombre del contacto" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electronico</label>
                    <input type="email" class="form-control fs-3" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Ingrese el correo del contacto" required>
                </div>
                <div class="text-end">
                    <input type="submit" class="btn fs-4" id="btn-color" value="Crear contacto" />
                </div>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </section>


    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
