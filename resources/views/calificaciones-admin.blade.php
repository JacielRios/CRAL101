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
            <li class="nav-item">
              <a class="nav-link ps-lg-5" href="{{ url('chat') }}">Mensajes</a>
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
    <section class="container mt-3 mb-3 d-md-none">
      <div class="row">
        <div class="col-12 mt-2 ">
          <div class="card border-0 ">
            <a href="{{ route('lists.index') }}" class="card-body text-start btn btn-outline-primary p-2 rounded-pill">
              <p class="text-center p-2 m-0">LISTAS CREADAS</p>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="container mt-3 mb-3 d-md-none">
      <div class="row">
        <div class="col-12 mt-2 ">
          <div class="card border-0 ">
            <a href="#" class="card-body btn btn-outline-primary p-2 rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal2" id="scale">
              <p class="text-center p-2 m-0">CREAR NUEVA LISTA</p>
            </a>
          </div>
        </div>
      </div>

      <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered rounded">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" id="exampleModalLabel">DATOS DE LISTA</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('list.store') }}" method="POST">
                @csrf

                <div class="form-group">
                  <label class="fw-bold m-0">Nombre de la lista *</label>
                  <input type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                  <label class="fw-bold m-0">Materia *</label>
                  <input type="text" name="course" class="form-control" required>
                </div>
                <div class="form-group">
                  <label class="fw-bold m-0">Grado *</label>
                  <select class="form-select" name="grade" id="grade">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="fw-bold m-0">Grupo *</label>
                  <select class="form-select" name="group" id="group">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="fw-bold m-0" for="">Turno *</label>
                  <select class="form-select" name="turn" id="turn">
                    <option value="Matutino">Matutino</option>
                    <option value="Vespertino">Vespertino</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="carrer" class="fw-bold m-0">{{ __('Especialidad *') }}</label>

                  <div class="">
                    <select class="form-select @error('group') is-invalid @enderror" name="carrer" id="carrer" required>
                      <option value="Programación">Programación</option>
                      <option value="Contabilidad">Contabilidad</option>
                      <option value="Secretariado ejecutivo bilingüe">Secretariado ejecutivo bilingüe</option>
                    </select>

                    @error('group')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="modal-footer p-1">
                  <input type="submit" class="btn" id="btn-color" value="Crear">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="container mt-4 mb-3 d-none d-md-block">
      <div class="row justify-content-center">
        <div class="col-md-11 col-xl-8 mt-2">
          <div class="card border-0">
            <a href="{{ route('lists.index') }}" class="card-body text-start btn btn-outline-primary pb-0 rounded-pill" id="scale">
              <p class="fs-1 text-center p-4">LISTAS CREADAS</p>
            </a>
          </div>
        </div>
      </div>
    </section>
    <section class="container mt-5 mb-3 d-none d-md-block" id="scale">
      <div class="row justify-content-center">
        <div class="col-md-11 col-xl-8 mt-2">
          <div class="card border-0">
            <a href="#" class="card-body text-start btn btn-outline-primary pb-0 rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal" id="scale">
              <p class="fs-1 text-center p-4">CREAR NUEVA LISTA</p>
            </a>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered rounded">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title" id="exampleModalLabel">DATOS DE LISTA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('list.store') }}" method="POST">
                @csrf

                <div class="form-group">
                  <label class="fw-bold m-0 fs-4">Nombre de la lista *</label>
                  <input type="text" name="title" class="form-control fs-4" required>
                </div>
                <div class="form-group">
                  <label class="fw-bold m-0 fs-4">Materia *</label>
                  <input type="text" name="course" class="form-control fs-4" required>
                </div>
                <div class="form-group">
                  <label class="fw-bold m-0 fs-4">Grado *</label>
                  <select class="form-select fs-4" name="grade" id="grade">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="fw-bold m-0 fs-4">Grupo *</label>
                  <select class="form-select fs-4" name="group" id="group">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="fw-bold m-0 fs-4" for="">Turno *</label>
                  <select class="form-select fs-4" name="turn" id="turn">
                    <option value="Matutino">Matutino</option>
                    <option value="Vespertino">Vespertino</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="carrer" class="fw-bold m-0 fs-4">{{ __('Especialidad *') }}</label>

                  <div class="">
                    <select class="form-select @error('group') is-invalid @enderror fs-4" name="carrer" id="carrer" required>
                      <option value="Programación">Programación</option>
                      <option value="Contabilidad">Contabilidad</option>
                      <option value="Secretariado ejecutivo bilingüe">Secretariado ejecutivo bilingüe</option>
                    </select>

                    @error('group')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn fs-4" id="btn-color" value="Crear">
                  <button type="button" class="btn btn-danger fs-4" data-bs-dismiss="modal">Cerrar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>