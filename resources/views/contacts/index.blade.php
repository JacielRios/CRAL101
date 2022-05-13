@extends('layouts.app')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
    crossorigin="anonymous"/>
  <link rel="stylesheet" href="{{ asset('css/contacts.css') }}"/>
    <title>CRAL101</title>
</head>
<body>
    @if (Auth::user()->role == 'user')
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
    @elseif(Auth::user()->role == 'admin')
    <header>
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
                  <a class="nav-link ps-lg-5 pe-lg-5" href="{{ url('profile-profesor/user') }}"
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
    @elseif(Auth::user()->role == 'dir')
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand d-lg-none m-auto pb-3" href="#">
          <img
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
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active lg-ps-2" aria-current="page" href="{{ url('home-profesor/post') }}"
                >Información general</a> 
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
@endif

<main>
  <section class="container-fluid bg-white p-0 mt-2 text-center d-lg-none">
    <h3 class="pt-2 pb-2 fw-bold">CONTACTOS</h3>
</section>
  <section class="container-fluid bg-white p-0 mt-2 text-center d-none d-lg-block">
    <h1 class="pt-4 pb-4 fw-bold">CONTACTOS</h1>
</section>
<section class="container pt-2 d-lg-none">
  <div class="text-end">
    <a class="btn fs-6" href="{{ route('contacts.create') }}" id="btn-color">Crear contacto</a>
  </div>
</section>
  <section class="container pt-3 d-none d-lg-block">
    <div class="text-end">
      <a class="btn fs-3" href="{{ route('contacts.create') }}" id="btn-color">Crear contacto</a>
    </div>
  </section>

  <section class="container col-lg-8 mt-2 d-none d-lg-block">
    @if ($contacts->count())
    <table class="table fs-4">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Email</th>
          <th scope="col"></th>
          <th scope="col"></th>

        </tr>
      </thead>
      <tbody>
        @foreach ($contacts as $contact)
        <tr>
          <th>{{ $contact->name }}</th>
          <td>{{ $contact->user->email }}</td>
          <td>
            @livewire('confirm-alert-contact', ['contactId' => $contact->id])
          </td>
          <td>
            <a href="{{ route('contacts.edit', $contact) }}" class="btn fs-3" id="btn-color">Editar</a>  
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <div class="alert alert-warning d-flex align-items-center" role="alert">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </svg>
      <div class="fs-4">
        ¡Ups! parece que no tienes contactos creados
      </div>
    </div>
    @endif    
  </section>

  <section class="container col-12 mt-2 d-lg-none d-flex justify-content-center">
    @if ($contacts->count())
    <table class="table table-responsive fs-6 ">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Email</th>
          <th scope="col"></th>
          <th scope="col"></th>

        </tr>
      </thead>
      <tbody>
        @foreach ($contacts as $contact)
        <tr>
          <th>{{ $contact->name }}</th>
          <td>{{ $contact->user->email }}</td>
          <td>
            @livewire('confirm-alert-contact', ['contactId' => $contact->id])
          </td>
          <td>
            <a href="{{ route('contacts.edit', $contact) }}" class="btn fs-6" id="btn-color">Editar</a>  
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </section>
  @else
    <div class="alert alert-warning d-flex align-items-center" role="alert">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </svg>
      <div class="">
        ¡Ups! parece que no tienes contactos creados
      </div>
    </div>
    @endif    

</main>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"
  ></script>
</body>
</html>