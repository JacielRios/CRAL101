@extends('layouts.app')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
      crossorigin="anonymous"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}" />
    <title>CRAL101</title>
</head>
<body>
  @if (auth()->user()->role == 'admin')
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand d-lg-none m-auto pb-3" href="#">
          <img
          style="height: 50px; width:140px;"
            id="main-logo"
            class="ps-lg-5 ms-lg-5"
            src="{{ asset('images/Logo-Cral.png') }}"
            alt="Logo CRAL101"
          />
        </a>
        <a class="navbar-brand d-none d-lg-block" href="#">
          <img
            id="main-logo"
            class="ps-lg-5 ms-lg-5"
            src="{{ asset('images/Logo-Cral.png') }}"
            alt="Logo CRAL101"
          />
        </a>
        <button
          class="navbar-toggler w-80"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
          </svg></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active lg-ps-2" aria-current="page" href="{{ url('home-profesor/post') }}"
                >Información general</a> 
            </li>
            <li class="nav-item">
              <a class="nav-link ps-lg-5" href="{{ route('homework.index') }}"
                >Tareas</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link ps-lg-5" href="{{ url('calificaciones/admin') }}">Historial de calificaciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-lg-5" href="{{ url('chat') }}"
                >Mensajes</a
              >
            </li>
            <li class="nav-item d-lg-none">
              <a class="nav-link ps-lg-5 pe-lg-5" href="{{ url('profile-profesor/user') }}"
                >Cuenta</a
              >
            </li>
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link dropdown ps-lg-5 pe-lg-5"id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <img
                  class="rounded-circle"
                  id="img-user"
                  src="{{ asset('images/user-profile.png') }}"/>              
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item"href="{{ url('profile-profesor/user') }}">Cuenta</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Cerrar sesión') }}
                </a>
                </div>
            </a>
            </li>
            <li class="nav-item d-lg-none">
              <a class="nav-link ps-lg-5 pe-lg-5" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
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
        <img
          id="main-logo"
          class="ps-lg-5 ms-lg-5"
          src="{{ asset('images/Logo-Cral.png') }}"
          alt="Logo CRAL101"
        />
      </a>
      <a class="navbar-brand d-none d-lg-block" href="#">
        <img
          id="main-logo"
          class="ps-lg-5 ms-lg-5"
          src="{{ asset('images/Logo-Cral.png') }}"
          alt="Logo CRAL101"
        />
      </a>
      <button
        class="navbar-toggler w-80"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active lg-ps-2" aria-current="page" href="{{ url('home-profesor/post') }}"
              >Información general</a> 
          </li>
          <li class="nav-item">
            <a class="nav-link ps-lg-5" href="{{ url('chat') }}"
              >Mensajes</a
            >
          </li>
          <li class="nav-item d-lg-none">
            <a class="nav-link ps-lg-5 pe-lg-5" href="{{ url('profile-profesor/user') }}"
              >Cuenta</a
            >
          </li>
          <li class="nav-item d-none d-lg-block">
            <a class="nav-link dropdown ps-lg-5 pe-lg-5"id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              <img
                class="rounded-circle"
                id="img-user"
                src="{{ asset('images/user-profile.png') }}"/>              
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"href="{{ url('profile-profesor/user') }}">Cuenta</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Cerrar sesión') }}
              </a>
              </div>
          </a>
          </li>
          <li class="nav-item d-lg-none">
            <a class="nav-link ps-lg-5 pe-lg-5" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Cerrar sesión') }}
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
@elseif (Auth::user()->role == 'user')
<header>
  <nav class="navbar navbar-expand-lg navbar-dark ps-3 p-lg-2">
    <div class="container-fluid">
      <a class="navbar-brand d-lg-none m-auto pb-3" href="#">
        <img
        style="height: 50px; width:140px;"
          id="main-logo"
          class="ps-lg-5 ms-lg-5"
          src="{{ asset('images/Logo-Cral.png') }}"
          alt="Logo CRAL101"
        />
      </a>
      <a class="navbar-brand d-none d-lg-block" href="#">
        <img
          id="main-logo"
          class="ps-lg-5 ms-lg-5"
          src="{{ asset('images/Logo-Cral.png') }}"
          alt="Logo CRAL101"
        />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active lg-ps-2" aria-current="page" href="{{ url('home') }}"
              >Información general</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link ps-lg-5" href="{{ route('homeworks.index') }}"
              >Tareas</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link ps-lg-5" href="{{ route('grades-user') }}">Historial de calificaciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ps-lg-5" href="{{ url('chat') }}"
              >Mensajes</a
            >
          </li>
          <li class="nav-item d-lg-none">
            <a class="nav-link ps-lg-5 pe-lg-5" href="{{ url('profile-alumno/user') }}"
              >Cuenta</a
            >
          </li>
          <li class="nav-item d-none d-lg-block">
            <a class="nav-link dropdown ps-lg-5 pe-lg-5"id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              <img
                class="rounded-circle"
                id="img-user"
                src="{{ asset('images/user-profile.png') }}"/>              
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"href="{{ url('profile-alumno/user') }}">Cuenta</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Cerrar sesión') }}
              </a>
              </div>
          </a>
          </li>
          <li class="nav-item d-lg-none">
            <a class="nav-link ps-lg-5 pe-lg-5" href="{{ route('logout') }}"
                onclick="event.preventDefault();
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
        <section class="d-lg-none">
          {{-- <table class="table"> 
            <thead>
              <tr>
                <th colspan="1" class="pe-0">
                  &nbsp;
                </th>
                <th colspan="2">
                  Usuario
                </th>
                <th colspan="1">
                  &nbsp;
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="pe-0">
                  <img class="col-9" src="{{ asset('images/user-profile.png') }}" alt="">
                </td>
                <th>
                  Jaciel Rios
                  <p class="text-secondary">Hola</p>
                </th>
                <td>
                  <a href=""> <img class="col-8" src="{{ asset('images/mensaje.png') }}" alt=""></a>
                </td>
              </tr>
            </tbody>
          </table> --}}
          <div class="text-center mb-0">
            <p class="fs-3 fw-bold m-0">
              Mensajes
            </p>
          </div>
         
          <div class="card mt-2 border-0">
            <a class="btn btn-outline-secondary ps-0 pb-0 col-md-9 mx-auto" href="{{ url('chat/user') }}">
              <div class="row">
                <div class="col-2" id="img-card_bottom">
                    <img src="{{ asset('images/user-profile.png') }}" class="rounded-circle ms-2" id="img-user">
                </div>
                <div class="col-6 lh-1 p-0">
                    <p class="fw-bold m-0 ps-4 fs-6 text-start text-dark">Jaciel Rios</p>
                    <p class="text-muted text-start mt-3 mb-0 ps-4">
                        Hola
                    </p>
                </div>
              </div>
            </a>
          </div>
          {{-- <div class="card border-0">
            <a class="btn btn-outline-secondary ps-0 pb-0 col-md-9 mx-auto">
              <div class="row">
                <div class="col-2" id="img-card_bottom">
                    <img src="{{ asset('images/user-profile.png') }}" class="rounded-circle ms-2" id="img-user">
                </div>
                <div class="col-6 lh-1 p-0">
                    <p class="fw-bold m-0 ps-4 fs-6 text-start text-dark">Carlos Jaramillo</p>
                    <p class="text-muted text-start mt-3 mb-0 ps-4">
                        Hola
                    </p>
                </div>
              </div>
            </a>
          </div>
          <div class="card border-0">
            <a class="btn btn-outline-secondary ps-0 pb-0 col-md-9 mx-auto">
              <div class="row">
                <div class="col-2" id="img-card_bottom">
                    <img src="{{ asset('images/user-profile.png') }}" class="rounded-circle ms-2" id="img-user">
                </div>
                <div class="col-6 lh-1 p-0">
                    <p class="fw-bold m-0 ps-4 fs-6 text-start text-dark">Keila Mendez</p>
                    <p class="text-muted text-start mt-3 mb-0 ps-4">
                        Hola
                    </p>
                </div>
              </div>
            </a>
          </div>
          <div class="card border-0">
            <a class="btn btn-outline-secondary ps-0 pb-0 col-md-9 mx-auto">
              <div class="row">
                <div class="col-2" id="img-card_bottom">
                    <img src="{{ asset('images/user-profile.png') }}" class="rounded-circle ms-2" id="img-user">
                </div>
                <div class="col-6 lh-1 p-0">
                    <p class="fw-bold m-0 ps-4 fs-6 text-start text-dark">Fatima Maldonado</p>
                    <p class="text-muted text-start mt-3 mb-0 ps-4">
                        Hola
                    </p>
                </div>
              </div>
            </a>
          </div> --}}
        </section>

        {{-- Desktop --}}

        <section class="d-none d-lg-block ">
          <div class="text-center mt-2 mb-0 bg-light">
            <p class="fs-1 fw-bold m-0 ">
              Mensajes
            </p>
          </div>
        
          <div class="d-flex justify-content-center">
            <a class="btn btn-outline-secondary ps-0 pb-0 col-5 " href="{{ url('chat/user') }}">
              <div class="row">
                <div class="col-2" id="img-card_bottom">
                    <img src="{{ asset('images/user-profile.png') }}" class="rounded-circle ms-2" id="img-user">
                </div>
                <div class="col-6 lh-1 p-0">
                    <p class="fw-bold m-0 ps-4 fs-2 text-start text-dark">Carlos Jaramillo</p>
                    <p class="text-muted text-start mt-3 mb-0 ps-4 fs-3">
                      Hola
                    </p>
                </div>
              </div>
            </a>
          </div>
          <div class="d-flex justify-content-center">
            <a class="btn btn-outline-secondary ps-0 pb-0 col-5 " href="{{ url('chat/user') }}">
              <div class="row">
                <div class="col-2" id="img-card_bottom">
                    <img src="{{ asset('images/user-profile.png') }}" class="rounded-circle ms-2" id="img-user">
                </div>
                <div class="col-6 lh-1 p-0">
                    <p class="fw-bold m-0 ps-4 fs-2 text-start text-dark">Jaciel Benito </p>
                    <p class="text-muted text-start mt-3 mb-0 ps-4 fs-3">
                      Si
                    </p>
                </div>
              </div>
            </a>
          </div>
          <div class="d-flex justify-content-center">
            <a class="btn btn-outline-secondary ps-0 pb-0 col-5 " href="{{ url('chat/user') }}">
              <div class="row">
                <div class="col-2" id="img-card_bottom">
                    <img src="{{ asset('images/user-profile.png') }}" class="rounded-circle ms-2" id="img-user">
                </div>
                <div class="col-6 lh-1 p-0">
                    <p class="fw-bold m-0 ps-4 fs-2 text-start text-dark">Keila Mendez</p>
                    <p class="text-muted text-start mt-3 mb-0 ps-4 fs-3">
                      Mañana
                    </p>
                </div>
              </div>
            </a>
          </div>
          <div class="d-flex justify-content-center">
            <a class="btn btn-outline-secondary ps-0 pb-0 col-5 " href="{{ url('chat/user') }}">
              <div class="row">
                <div class="col-2" id="img-card_bottom">
                    <img src="{{ asset('images/user-profile.png') }}" class="rounded-circle ms-2" id="img-user">
                </div>
                <div class="col-6 lh-1 p-0">
                    <p class="fw-bold m-0 ps-4 fs-2 text-start text-dark">Fatima Maldonado</p>
                    <p class="text-muted text-start mt-3 mb-0 ps-4 fs-3">
                      CRAL101
                    </p>
                </div>
              </div>
            </a>
          </div>
          {{-- <div class="card border-0 mt-2">
            <a class="btn btn-outline-secondary ps-0 pb-0 col-5 mx-auto">
              <div class="row">
                <div class="col-2" id="img-card_bottom">
                    <img src="{{ asset('images/user-profile.png') }}" class="rounded-circle ms-2" id="img-user">
                </div>
                <div class="col-6 lh-1 p-0">
                    <p class="fw-bold m-0 ps-4 fs-2 text-start text-dark">Carlos Jaramillo</p>
                    <p class="text-muted text-start mt-3 mb-0 ps-4 fs-3">
                        Hola
                    </p>
                </div>
              </div>
            </a>
          </div>
          <div class="card border-0 mt-2">
            <a class="btn btn-outline-secondary ps-0 pb-0 col-5 mx-auto">
              <div class="row">
                <div class="col-2" id="img-card_bottom">
                    <img src="{{ asset('images/user-profile.png') }}" class="rounded-circle ms-2" id="img-user">
                </div>
                <div class="col-6 lh-1 p-0">
                    <p class="fw-bold m-0 ps-4 fs-2 text-start text-dark">Keila Mendez</p>
                    <p class="text-muted text-start mt-3 mb-0 ps-4 fs-3">
                        Hola
                    </p>
                </div>
              </div>
            </a>
          </div>
          <div class="card border-0 mt-2">
            <a class="btn btn-outline-secondary ps-0 pb-0 col-5 mx-auto">
              <div class="row">
                <div class="col-2" id="img-card_bottom">
                    <img src="{{ asset('images/user-profile.png') }}" class="rounded-circle ms-2" id="img-user">
                </div>
                <div class="col-6 lh-1 p-0">
                    <p class="fw-bold m-0 ps-4 fs-2 text-start text-dark">Fatima Maldonado</p>
                    <p class="text-muted text-start mt-3 mb-0 ps-4 fs-3">
                        Hola
                    </p>
                </div>
              </div>
            </a>
          </div> --}}
        </section>
      </main>
      <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
</body>
</html>