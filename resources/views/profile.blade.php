@extends('layouts.app')

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRAL101</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark p-0 p-lg-2">
            <div class="container-fluid">
                <a class="navbar-brand d-lg-none m-auto pb-3" href="#">
                    <img
                      id="main-logo"
                      class="ps-lg-5 ms-lg-5"
                      src="{{ asset('images/logo-remaster2.png') }}"
                      alt="Logo CRAL101"
                    />
                  </a>
                  <a class="navbar-brand d-none d-lg-block" href="#">
                    <img
                      id="main-logo"
                      class="ps-lg-5 ms-lg-5"
                      src="{{ asset('images/logo-remaster2.png') }}"
                      alt="Logo CRAL101"
                    />
                  </a>
                <button class="navbar-toggler w-80" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active  lg-ps-2" aria-current="page" href="{{ url('home') }}">Información general</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ps-lg-5" href="#">Tareas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ps-lg-5" href="#">Historial de calificaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ps-lg-5" href="{{ url('chat') }}"
                          >Mensajes</a
                        >
                      </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link ps-lg-5 pe-lg-5" href="{{ url('profile-alumno/user') }}">Cuenta</a>
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

    <main id="main">
        <section class="container mt-4 mb-4 d-md-none">
            <div class="row ">
                <div class="col d-flex justify-content-center " >
                    <img id="img-user" src="{{ asset('images/user-profile_xl.png') }}" class="rounded-circle" alt="Imagen del usuario">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card border-dark mb-3 mt-1 " >
                        <div class="card-body text-dark">
                            <p class="card-title m-0"> <span class="text-muted fs-4"> Nombre de usario</span>  <br><span class="fs-5 fw-bold ps-2">{{ Auth::user()->name }} </span></p>
                            <p class="card-text m-0"><span class="text-muted fs-4"> Número de control</span> <br><span class="fs-5 fw-bold ps-2"> {{ Auth::user()->no_control }} </span></p>
                            <p class="card-text m-0"><span class="text-muted fs-4">Especialidad</span>  <br><span class=" fs-5 fw-bold ps-2">  {{ Auth::user()->role }} </span></p>
                            <p class="card-text m-0"> <span class="text-muted fs-4">Semestre y grupo</span>  <br><span class=" fs-5 fw-bold ps-2">   {{ Auth::user()->semester }} <span> - </span>{{ Auth::user()->group }} </span> </p>
                            <p class="card-text m-0"><span class="text-muted fs-4">Turno</span>  <br><span class="fs-5 fw-bold ps-2">  {{ Auth::user()->role }}  </span></p>
                            <p class="card-text m-0"><span class="text-muted fs-4">Correo electrónico</span>  <br><span class="fs-5 fw-bold ps-2">  {{ Auth::user()->email }}  </span></p>
                        <div class="text-end"><a href="{{ route('profile.edit', $user = auth::user()->id) }}" id="btn-user" class="btn btn-primary">Editar</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container d-none d-md-block lh-1"> 
            <div class="row">
                <div class="col-3" >
                    <img id="img-user-md" src="{{ asset('images/user-profile_xl.png') }}" class="rounded-circle mt-2" alt="Imagen del usuario">
                </div>
                <div class="col-9">
                    <div class="card border-dark mb-3 mt-2" >
                        <div class="card-body text-dark">
                        <p class="card-title"> <span class="text-muted fs-2"> Nombre de usario</span>  <br><span class="fs-3 fw-bold ps-3">{{ Auth::user()->name }} </span></p>
                        <p class="card-text"><span class="text-muted fs-2"> Número de control</span> <br><span class="fs-3 fw-bold ps-3"> {{ Auth::user()->no_control }} </span></p>
                        <p class="card-text"><span class="text-muted fs-2">Especialidad</span>  <br><span class="fs-3 fw-bold ps-3"> {{ Auth::user()->carrer }} </span></p>
                        <p class="card-text"> <span class="text-muted fs-2">Semestre y grupo</span>  <br><span class="fs-3 fw-bold ps-3">   {{ Auth::user()->semester }} <span> - </span>{{ Auth::user()->group }} </span> </p>
                        <p class="card-text"><span class="text-muted fs-2">Turno</span>  <br><span class="fs-3 fw-bold ps-3"> {{ Auth::user()->turn }} </span></p>
                        <p class="card-text m-0"><span class="text-muted fs-2">Correo electrónico</span>  <br><span class="fs-3 fw-bold ps-3">  {{ Auth::user()->email }}  </span></p>
                        <div class="text-end"><a href="{{ route('profile.edit', $user = auth::user()->id) }}" id="btn-user" class="btn btn-primary fs-3">Editar</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>