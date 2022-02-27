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
    <link rel="stylesheet" href="{{ asset('css/evaluation-admin.css') }}" />
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
        <section class="container d-lg-none">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2 border-dark">
                        <div class="card-body">
                            <h2>{{ $received->title }}</h2>
                            <a href="https://docs.google.com/document/d/19HUWw5_I66zs02wf3Fo8USobiirlFKTV/edit?usp=sharing&ouid=112756981818013118610&rtpof=true&sd=true"><img src="./assets/icons/archivo-de-word.png" alt=""></a>
                            <p class="text-muted mt-3">
                                <strong>{{ $received->name }}</strong><br>
                                {{ $received->grade }}-{{ $received->group }}
                            </p>
                            <form 
                            action="{{ route('received.update', $received) }}"
                            method="POST" 
                            enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                    <span class="input-group-text">/</span>
                                    <span class="input-group-text">100</span>
                                </div>
                                @csrf
                                @method('PUT')
                                <input type="submit" value="Calificar" class="btn" id="btn_color">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container d-none d-lg-block">
            <div class="row justify-content-center fs-3">
                <div class="col-8">
                    <div class="card mt-4 border-dark">
                        <div class="card-body">
                            <h2 class="fs-1">{{ $received->title }}</h2>
                            @if($received->file)
                              <a href="../../../storage/homeworks_send/{{ $received->file }}" target="_blank">{{ $received->file }}</a><br>
                            @endif
                            @if($received->image)
                              <a href="../../../storage/homeworks_send/{{ $received->image }}" target="_blank">{{ $received->image }}</a>
                            @endif
                            <p class="text-muted mt-3">
                                <strong>{{ $received->name }}Jaciel Benito Rios Martinez</strong><br>
                                {{ $received->grade}}6-C{{ $received->group }}
                            </p>
                            @if ($errors->any())
                              <div class="alert alert-danger">
                                  <ul>
                                    @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                    @endforeach
                                  </ul>
                                </div>
                            @endif
                            <form
                              action="{{ route('received.update', $received) }}"
                              method="POST" 
                              enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                  @if(isset($received->quali))
                                  <input type="number" name="quali" class="form-control fs-3" value="{{ old('quali', $received->quali)}}">
                                  @else
                                  <input type="number" name="quali" class="form-control fs-3">
                                  @endif
                                    <span class="input-group-text fs-3">/</span>
                                    <span class="input-group-text fs-3">100</span>
                                </div>
                                @csrf
                                @method('PUT')
                                  <input type="submit" class="btn fs-3" value="Calificar" id="btn_color">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>