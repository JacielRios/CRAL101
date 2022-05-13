@extends('layouts.app')

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRAL101</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('css/list-created.css') }}">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand d-lg-none m-auto pb-3" href="#">
          <img style="height: 50px; width:140px;" id="main-logo" class="ps-lg-5 ms-lg-5" src="{{ asset('images/Logo-Cral.png') }}" alt="Logo CRAL101" />
        </a>
        <a class="navbar-brand d-none d-lg-block" href="#">
          <img id="main-logo" class="ps-lg-5 ms-lg-5" src="{{ asset('images/Logo-Cral.png') }}" alt="Logo CRAL101" />
        </a>
        <button class="navbar-toggler w-80" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
            </svg></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active lg-ps-2" aria-current="page" href="{{ url('home-profesor/post') }}">Información general</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-lg-5" href="{{ route('homework.index') }}">Tareas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-lg-5" href="{{ url('calificaciones/admin') }}">Historial de calificaciones</a>
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
              <a class="nav-link ps-lg-5 pe-lg-5" href="{{ url('profile-profesor/user') }}">Cuenta</a>
            </li>
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link dropdown ps-lg-5 pe-lg-5" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                @if (Auth::user()->image)
                <img src="../storage/images_users/{{ Auth::user()->image }}" class="rounded-circle" id="img-user">
              @else
                <img class="rounded-circle" id="img-user" src="{{ asset('images/user-profile.png') }}" />
              @endif
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ url('profile-profesor/user') }}">Cuenta</a>
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
        <div class="fs-2 fw-bold text-center pt-2">
          <p class="m-0">Listas</p>
        </div>
        @if ((count($lists)) == 0)
        <div class="alert alert-warning d-flex align-items-center" role="alert">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
          <div class="">
            ¡Ups! parece que no hay listas creadas
          </div>
        </div>
        @else
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
          <div class="card-body d-flex">
            <a href="{{ route('lista.show', $list) }}" class="btn me-2 " id="btn-color">Abrir</a>
            @livewire('confirm-alert-list', ['listId' => $list->id])
          </div>
        </div>
        @endforeach
        @endif

      </section>
    </section>

    <section class="d-none d-md-block">
      <div class="fs-2 fw-bold text-center pt-2 d-lg-none">
        <p class="m-0">Listas</p>
      </div>
      <div class="fs-1 fw-bold text-center pt-2 d-md-none d-lg-block">
        <p class="m-0">Listas</p>
      </div>
      @if ((count($lists)) == 0)
        <div class="container">
          <div class="alert alert-warning d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <div class="fs-4">
              ¡Ups! parece que no hay listas creadas
            </div>
          </div>
        </div>
        @else
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
            <a href="{{ route('lista.show', $list) }}" class="btn fs-4 me-2" id="btn-color">Abrir</a>
            @livewire('confirm-alert-list', ['listId' => $list->id])
          </div>
        </div>
        @endforeach
      </section>
      @endif
    </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>