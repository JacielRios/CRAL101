@extends('layouts.app')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRAL101</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
      crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('css/posts-user.css') }}" />
</head>
<body>
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

      <main>
        <section class="container d-lg-none" id="details-container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <span class="fs-3 fw-bold">Tareas</span>
                </div>
                <div class="col-12 col-md-5 p-0 ms-4 ms-md-4" >
                    <a href="{{ route('pending') }}" class="btn btn-outline-primary mt-2 fw-bold" id="details-items">Pendientes</a>
                </div>
                <div class="col-12 col-md-5 p-0 ms-4 ms-md-0">
                    <a href="{{ route('completed.index') }}" class="btn btn-outline-primary mt-2 fw-bold" id="details-items">Completadas</a>
                </div>
            </div>
        </section>

        <section class="container d-none d-lg-block" id="details-container-lg">
            <div class="row">
                <div class="col-5 text-center">
                    <span class="fs-1 fw-bold">Tareas</span>
                </div>
                <div class="col-3">
                    <a href="{{ route('pending') }}" class="btn btn-outline-primary mt-2 fs-3 fw-bold" id="details-items-lg">Pendientes</a>
                </div>
                <div class="col-1">
                    <a href="{{ route('completed.index') }}" class="btn btn-outline-primary mt-2 fs-3 fw-bold" id="details-items-lg">Completadas</a>
                </div>
            </div>
        </section>

        <section class="container mt-2 d-lg-none">
          @foreach ($homeworks as $homework)
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 ">
                    <div class="card mb-4 border-2 border-dark">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $homework->title }}</h5>
                            <p class="card-text mb-0">{{ $homework->body }}</p>
                            <a href="{{ route('homeworks.show', $homework) }}" class="btn btn-sm btn-outline-primary">Leer más..</a>
                            <p class="text-muted mb-0">
                                <strong>
                                  Materia: {{ $homework->course }}<br>
                                  Turno: {{ $homework->turn }} <br>
                                  Grupo : {{ $homework->grade }}-{{ $homework->group }}
                                </strong><br>
                                    Fecha de entrega: {{ date('j F, Y', strtotime($homework->date))}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="d-lg-none ms-3 ms-md-5 ps-md-5">
              {{ $homeworks->links() }}
            </div>
        </section>

        <section class="container mt-2 fs-3 d-none d-lg-block">
          @foreach ($homeworks as $homework)
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="card mb-4 border-2 border-dark">
                        <div class="card-body">
                            <h2 class="card-title fw-bold">{{ $homework->title }}</h2>
                            <p class="card-text mb-0">{{ $homework->body }}</p>
                            <a href="{{ route('homeworks.show', $homework) }}" class="btn btn-outline-primary fs-3">Leer más..</a>
                            <p class="text-muted mb-0">
                                <strong>
                                  Materia: {{ $homework->course }} <br>
                                  Turno: {{ $homework->turn }}
                                  Grupo : {{ $homework->grade }}-{{ $homework->group }}
                                </strong><br>
                                    Fecha de entrega: {{ date('j F, Y', strtotime($homework->date))}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="d-lg-none ms-3 ms-md-5 ps-md-5">
              {{ $homeworks->links() }}
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>