@extends('layouts.app')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      @livewireStyles
      @livewireScripts
      <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
      crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/chat-user.css') }}"/>
    <title>CRAL101</title>
</head>
<body>
  @if (Auth::user()->role == 'user')
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark p-1 p-lg-2">
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
              <a class="nav-link ps-lg-5" href="{{ url('posts/user') }}"
                >Tareas</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link ps-lg-5" href="{{ url('calificaciones/user') }}">Historial de calificaciones</a>
            </li>
            <li class="nav-item d-lg-none">
              <a class="nav-link ps-lg-5 pe-lg-5" href="{{ url('profile-alumno/user') }}"
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
  @elseif(Auth::user()->role == 'admin')
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
  @endif

    <main>
      {{-- @livewire("chat-list") --}}
      @livewire("chat-form")
        {{-- <section class="d-lg-none">
            <div class="card">
                <div class="card-header text-center pb-0">
                  <span><img class="col-3 col-md-1" src="{{ asset('images/user-profile.png') }}" alt=""></span> <br>
                  <p class="m-0 fw-bold">Jaciel Rios</p>
                </div>
                <div class="card-body pb-0">
                  <div>
                    <div class="card col-8 p-0 float-right">
                      <div class="card-body p-2 bg-primary text-white">
                        <div class="">
                          <p class="m-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, facere? In vero corporis dolorem voluptatum quae hic dolores, beatae repellendus suscipit facilis atque temporibus odit? Repudiandae enim velit nostrum deserunt?</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body pb-0">
                  <div>
                    <div class="card col-8 p-0 float-left">
                      <div class="card-body p-2 bg-secondary text-white">
                        <div class="">
                          <p class="m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div>
                    <div class="card col-8 p-0 float-right">
                      <div class="card-body p-2 bg-primary text-white">
                        <div class="">
                          <p class="m-0">Lorem ipsum dolor</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="input-container" class="mt-md-5">
                  <input class="" id="input" type="text" placeholder="Mensaje..">
                  <a class="float-right" href="#"><img id="send-icon" class="pt-2 pe-1" src="{{ asset('images/enviar-mensaje.png') }}" alt=""></a> 
                </div>
            </div>
        </section>

        <section class="d-none d-lg-block col-7 mx-auto">
            <div class="card ">
              <div class="card-header text-center pb-0">
                <span><img class="col-1" src="{{ asset('images/user-profile.png') }}" alt=""></span> <br>
                <p class="m-0 fs-1 fw-bold">Jaciel Rios</p>
              </div>
              <div class="card-body pb-0">
                <div>
                  <div class="card col-7 p-0 float-right fs-3">
                    <div class="card-body p-2 bg-primary text-white">
                      <div class="">
                        <p class="m-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, facere? In vero corporis dolorem voluptatum quae hic dolores, beatae repellendus suscipit facilis atque temporibus odit? Repudiandae enim velit nostrum deserunt?</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body pb-0">
                <div>
                  <div class="card col-7 p-0 float-left fs-3">
                    <div class="card-body p-2 bg-secondary text-white">
                      <div class="">
                        <p class="m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body p-0 pt-3 me-4">
                <div>
                  <div class="card col-7 p-0 float-right fs-3">
                    <div class="card-body p-2 bg-primary text-white">
                      <div class="">
                        <p class="m-0">Lorem ipsum dolor</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body p-0 me-4">
                <div>
                  <div class="card col-7 p-0 float-right fs-3">
                    <div class="card-body p-2 bg-primary text-white">
                      <div class="">
                        <p class="m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi ducimus eligendi et odio maxime delectus explicabo</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body p-0 me-4">
                <div>
                  <div class="card col-7 p-0 float-right fs-3">
                    <div class="card-body p-2 bg-primary text-white">
                      <div class="">
                        <p class="m-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod eveniet reiciendis dignissimos tempora facere hic quos deserunt totam aut repellendus beatae</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body p-0 pt-3 ms-4">
                <div>
                  <div class="card col-7 p-0 float-left fs-3">
                    <div class="card-body p-2 bg-secondary text-white">
                      <div class="">
                        <p class="m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, numquam deleniti in quibusdam, amet sequi laudantium labore et quas tenetur a magnam suscipit quia</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="input-container" class="mt-4">
                <input class="fs-3" id="input" type="text" placeholder="Mensaje..">
                <a class="float-right" href="#"><img id="send-icon" class="pt-2 pe-1 fs-3" src="{{ asset('images/enviar-mensaje.png') }}" alt=""></a> 
              </div>
          </div>
      </section> --}}
      {{-- <section id="bar-container" class="">
        <div class="row justify-content-center">
          <div id="input-container" class="position-absolute bottom-0">
            <input class="" id="input" type="text" placeholder="Mensaje..">
            <a class="float-right" href="#"><img id="send-icon" class="pt-2 pe-1" src="{{ asset('images/enviar-mensaje.png') }}" alt=""></a> 
          </div>
        </div>
      </section> --}}
    </main>
    
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"
  ></script>
</body>
</html>