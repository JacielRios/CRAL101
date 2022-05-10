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
    <link rel="stylesheet" href="{{ asset('css/completed-user.css') }}" />
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
              <a class="nav-link ps-lg-5 pe-lg-5" href="{{ url('profile-alumno/user') }}"
                >Cuenta</a
              >
            </li>
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link dropdown ps-lg-5 pe-lg-5"id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                @if (Auth::user()->image)
                                  <img src="../storage/images_users/{{ Auth::user()->image }}" class="rounded-circle" id="img-user">
                                @else
                                  <img class="rounded-circle" id="img-user" src="{{ asset('images/user-profile.png') }}" />
                                @endif             
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
        <section class="container d-lg-none">
            <div class="row">
                <div class="col-12 text-center">
                    <span class="fs-3 fw-bold">Tareas completadas</span>
                </div>
            </div>
        </section>

        <section class="container d-none d-lg-block">
            <div class="row">
                <div class="col-12 text-center">
                    <span class="fs-1 fw-bold">Tareas completadas</span>
                </div>
            </div>
        </section>
@php
    $c_m = 0;
@endphp
        @if(isset($homeworks))
        <section class="container mt-2 d-lg-none">
          @foreach($homeworks as $homework)
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 ">
                    <div class="card mb-4 border-2 border-dark">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $homework[0]->title }}</h5>
                            <p class="card-text mb-0">{{ $homework[0]->body }}</p>
                            <a href="{{ route('homeworks.show',$homework[0]->id) }}" class="btn btn-sm btn-outline-primary">Leer más..</a>
                            <p class="text-muted mb-0">
                                <strong>
                                  Materia: {{$homework[0]->course}} <br>
                                  Turno: {{ $homework[0]->turn }} <br>
                                  Grupo : {{ $homework[0]->grade }}-{{ $homework[0]->group }}
                                </strong><br>
                                    Fecha de entrega: {{ date('j F, Y', strtotime($homework[0]->date))}}
                            </p>
                        </div>
                        <div class="col-12 text-start p-0">
                          <a class="btn pt-0 " href="{{ route('homeworks.show', $homework[0]) }}" id="comments" >
                            <span class=""><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-chat-left" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                          </svg></span> 
                          <span class="text-muted">{{ $count[$c_m] }}</span> Comentarios</a>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $c_m++;
            @endphp
            @endforeach
            {{-- <div class="d-lg-none ms-3 ms-md-5 ps-md-5">
              {{ $homeworks->links() }}
            </div> --}}
        </section> 
        @php
            $c = 0;
        @endphp
        <section class="container mt-2 fs-3 d-none d-lg-block">
        @foreach ($homeworks as $homework)
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="card mb-4 border-2 border-dark">
                        <div class="card-body pb-0">
                            <h2 class="card-title fw-bold">{{ $homework[0]->title }}</h2>
                            <p class="card-text mb-0">{{ $homework[0]->body }}</p>
                            <a href="{{ route('homeworks.show', $homework[0]->id) }}" class="btn btn-outline-primary fs-3">Leer más..</a>
                            <p class="text-muted mb-0">
                                <strong>
                                  Materia: {{ $homework[0]->course }}<br>
                                  Turno: {{ $homework[0]->turn }}
                                  Grupo : {{ $homework[0]->grade }}-{{ $homework[0]->group }}
                                </strong><br>
                                    Fecha de entrega: {{ date('j F, Y', strtotime($homework[0]->date))}}
                            </p>
                        </div>
                        <div class="mt-2">
                          <a class="btn fs-4" href="{{ route('homeworks.show', $homework[0]) }}" id="comments" ><span class="pe-2"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-chat-left" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                          </svg></span> <span class="text-muted">{{ $count[$c] }}</span> Comentarios</a>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $c++;
            @endphp
            @endforeach
            <div class="d-lg-none ms-3 ms-md-5 ps-md-5">
              {{-- {{ $homeworks->links() }} --}}
            </div>
        @endif
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>