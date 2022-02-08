@extends('layouts.app')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRAL101</title>
    <link rel="stylesheet" href="{{ asset('css/post-admin.css') }}" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
      crossorigin="anonymous"/>
</head>
<body>
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
      <main>
        <section class="container d-md-none">
          <div id="color"></div>
          <div class="row justify-content-center">
            <div class="col-11">
              <div class="card border-dark">
                <div class="card-body">
                  <div class="row">
                    <div class="col-10 ps-2">
                      <p class="card-title m-0 fs-3">{{ $homework->title }}</p>
                    </div>
                    <div class="col-2 text-end">
                      <a class="dropdown "id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img
                        src="{{ asset('images/options-icon.png') }}"
                        alt="Opciones"/>           
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @livewire('confirm-alert', ['homeworkId' => $homework->id])
                      </div>
                    </div>
                  </div>
                  <p class="card-text">
                    {{ $homework->body }}
                  </p>
                  @if ($homework->image)
                    <div class="mb-3 mt-2 d-flex justify-content-center card-img-top" id="image_container-m">
                      <a href="../../storage/homeworks/{{ $homework->image }}" target="_blank"><img src="../../storage/homeworks/{{ $homework->image }}" class="d-flex justify-content-center" id="image"><br></a>
                    </div>
                    @endif
                    @if($homework->file)
                      <a href="../../storage/homeworks/{{ $homework->file }}" target="_blank" class="mb-3 mt-3">{{ $homework->file }}</a>
                    @endif
                  <p class="text-muted mb-0">
                      <strong>
                        Materia: {{ $homework->course }} <br>
                        Turno: {{ $homework->turn }} <br>
                        Grupo: {{ $homework->grade }}-{{ $homework->group }}
                      </strong><br>
                          Fecha de entrega: {{ date('j F, Y', strtotime($homework->date))}}
                  </p>
                  <a href="{{ url('received/admin') }}" class="btn btn-outline-success">Ver tareas recibidas</a>
                  <a href="{{ route('homework.edit', $homework) }}" class="btn" id="btn_color">Editar</a>
                </div>
              </div>
            </div>
          </div>
        </section>
  
        <section class="container d-none d-md-block mt-md-4">
          <div id="color"></div>
          <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8">
              <div class="card border-dark">
                <div class="card-body fs-4">
                  <div class="row">
                    <div class="col-8">
                      <p class="fs-2 fw-bold" id="font-s">
                        {{ $homework->title }}
                      </p>
                    </div>
                    <div class="col-4 text-end">
                      <a class="dropdown "id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img
                        src="{{ asset('images/options-icon.png') }}"
                        alt="Opciones"/>           
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          @livewire('confirm-alert', ['homeworkId' => $homework->id])
                      </div>
                    </div>
                  </div>
                  <p class="card-text m-0">
                    {{ $homework->body }}
                  </p>
                  @if ($homework->image)
                    <div class="mb-3 mt-2 d-flex justify-content-center card-img-top" id="image_container">
                      <a href="../../storage/homeworks/{{ $homework->image }}" target="_blank"><img src="../../storage/homeworks/{{ $homework->image }}" class="d-flex justify-content-center" id="image"><br></a>
                    </div>
                    @endif
                    @if($homework->file)
                      <a href="../../storage/homeworks/{{ $homework->file }}" target="_blank" class="fs-4 mb-3 mt-3">{{ $homework->file }}</a>
                    @endif
                  <p class="text-muted mb-0">
                      <strong>
                        Materia: {{ $homework->course }} <br>
                        Turno: {{ $homework->turn }} <br>
                        Grupo: {{ $homework->grade }}-{{ $homework->group }}
                      </strong><br>
                          Fecha de entrega: {{ date('j F, Y', strtotime($homework->date))}}
                  </p>
                  <a href="{{ route('index', $homework->id) }}" class="btn btn-outline-success fs-4 mt-3">Ver tareas recibidas</a>
                  <a href="{{ route('homework.edit', $homework) }}" class="btn fs-4 mt-3" id="btn_color">Editar</a>
                </div>
              </div>
            </div>
          </div>
        </section>
  
      </main>
  
      <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
      crossorigin="anonymous"
    ></script>
    
</body>
</html>