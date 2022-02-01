@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="{{ asset('css/post-admin.css') }}" />
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
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
                  <a class="nav-link ps-lg-5" href="{{ route('homework.index') }}"
                    >Tareas</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link ps-lg-5" href="{{ url('calificaciones/admin') }}">Historial de calificaciones</a>
                </li>
                <li class="nav-item d-lg-none">
                  <a class="nav-link ps-lg-5 pe-lg-5" href="{{ url('profile-profesor/user') }}"
                    >Cuenta</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link ps-lg-5" href="{{ url('chat') }}"
                    >Mensajes</a
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
        <section class="container mt-2 d-lg-none">
          <div class="row justify-content-center">
            <div class="col-11">
              <div class="card border-dark">
                <div class="card-body">
                  <div class="row">
                    <div class="col-10 ps-2">
                      <p class="card-title m-0 fs-3">{{ $homework->title }}</p>
                    </div>
                    <div class="col-2 p-0 ps-4">
                        <a class="dropdown p-0"id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          <img
                          src="{{ asset('images/options-icon.png') }}"
                          alt="Opciones"/>           
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <form class="dropdown-item text-center" action="{{ route('homework.destroy', $homework) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" class="btn">
                          </form>
                      </a>
                      </div>
                    </div>
                  </div>
                  <p class="card-text">
                    {{ $homework->body }}
                  </p>
                  <p class="text-muted mb-0">
                      <strong>
                          Grupo: {{ $homework->grade }}-{{ $homework->group }}
                          Turno: {{ $homework->turn }}
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
  
        <section class="container mt-4 MB-4 d-none d-lg-block">
          <div class="row justify-content-center">
            <div class="col-8">
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
                        <form class="dropdown-item text-center" action="{{ route('homework.destroy', $homework) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <input type="submit" value="Eliminar" class="btn fs-4">
                        </form>
                      </div>
                    </div>
                  </div>
                  <p class="card-text">
                    {{ $homework->body }}
                  </p>
                  <p class="text-muted mb-0">
                      <strong>
                          Grupo: {{ $homework->grade }}-{{ $homework->group }}
                            Turno: {{ $homework->turn }}
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