@extends('layouts.app')

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CRAL101</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('css/calificaciones-user.css') }}" />
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark ps-3 p-lg-2">
      <div class="container-fluid">
        <a class="navbar-brand d-lg-none m-auto pb-3" href="#">
          <img style="height: 50px; width:140px;" id="main-logo" class="ps-lg-5 ms-lg-5" src="{{ asset('images/Logo-Cral.png') }}" alt="Logo CRAL101" />
        </a>
        <a class="navbar-brand d-none d-lg-block" href="#">
          <img id="main-logo" class="ps-lg-5 ms-lg-5" src="{{ asset('images/Logo-Cral.png') }}" alt="Logo CRAL101" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active lg-ps-2" aria-current="page" href="{{ url('home') }}">Información general</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-lg-5" href="{{ route('homeworks.index') }}">Tareas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-lg-5" href="{{ route('grades-user') }}">Historial de calificaciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-lg-5" href="{{ url('chat') }}">Mensajes</a>
            </li>
            <li class="nav-item d-lg-none">
              <a class="nav-link ps-lg-5 pe-lg-5" href="{{ url('profile-alumno/user') }}">Cuenta</a>
            </li>
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link dropdown ps-lg-5 pe-lg-5" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                @if (Auth::user()->image)
                                  <img src="../storage/images_users/{{ Auth::user()->image }}" class="rounded-circle" id="img-user">
                                @else
                                  <img class="rounded-circle" id="img-user" src="{{ asset('images/user-profile.png') }}" />
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
  
  <main>
    <section class="d-md-none">
      <section class="container mt-1">
        @foreach($lists as $list)
        <div class="card me-3 mt-3">
          <div class="card-body">
            <h6 class="card-title ">{{ $list->title }}</h6>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ $list->course }}</li>
            <li class="list-group-item">{{ $list->grade }}-{{ $list->group }}</li>
            <li class="list-group-item">{{ $list->turn }}</li>
            <li class="list-group-item">{{ $list->carrer }}</li>
          </ul>
          <div class="card-body d-flex ">
            <a href="{{ route('list.user', $list) }}" class="btn me-2" id="btn-color">Abrir</a>
          </div>
        </div>
        @endforeach
      </section>
    </section>

    <section class="d-none d-md-block">
      <section class="container d-flex justify-content-center flex-wrap mt-1 fs-4 ">
        @foreach($lists as $list)
        <div class="card col-5 me-3 mt-3">
          <div class="card-body">
            <h4 class="card-title">{{ $list->title }}</h4>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ $list->course }}</li>
            <li class="list-group-item">{{ $list->grade }}-{{ $list->group }}</li>
            <li class="list-group-item">{{ $list->turn }}</li>
            <li class="list-group-item">{{ $list->carrer }}</li>
          </ul>
          <div class="card-body d-flex">
            <a href="{{ route('list.user', $list) }}" class="btn btn-lg fs-4 me-2" id="btn-color">Abrir</a>
          </div>
        </div>
        @endforeach
      </section>
    </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>