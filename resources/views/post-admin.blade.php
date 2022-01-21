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
                  <a class="nav-link ps-lg-5" href="{{ url('posts/admin') }}"
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
                  <h2 class="card-title">Ensayo</h2>
                  <p class="card-text">
                    Realizar un ensayo
                  </p>
                  <p class="text-muted mb-0">
                      <strong>
                          Grupo: 5-C
                      </strong><br>
                          Fecha de entrega: 10/11/2021
                  </p>
                  <a href="{{ url('received/admin') }}" class="btn btn-outline-success">Ver tareas recibidas</a>
                  <a href="{{ url('create/admin') }}" class="btn" id="btn_color">Editar</a>
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
                  <h2 class="card-title fs-1">Ensayo</h2>
                  <p class="card-text">
                    Realizar un ensayo
                  </p>
                  <p class="text-muted mb-0">
                      <strong>
                          Grupo: 5-A
                      </strong><br>
                          Fecha de entrega: 10/11/2021
                  </p>
                  <a href="{{ url('received/admin') }}" class="btn btn-outline-success fs-4 mt-3">Ver tareas recibidas</a>
                  <a href="{{ url('create/admin') }}" class="btn fs-4 mt-3" id="btn_color">Editar</a>
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