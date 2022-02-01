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
    <link rel="stylesheet" href="{{ asset('css/create-admin.css') }}" />
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

      <section class="container mt-3 mb-3 col-12 d-lg-none">
        <div class="card border-dark">
            <div class="card-header fw-bold">Crear tarea</div>
            <div class="card-body">
                <form
                      action="{{ route('homework.update', $homework) }}"
                        method="POST" 
                        enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="">Titulo *</label>
                        <input type="text" name="title" class="form-control" required value="{{ old('title', $homework->title) }}">
                    </div>
                    <div class="form-group">
                        <label>Contenido *</label>
                        <textarea name="body" rows="6" class="form-control" required >{{ old('body', $homework->body) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Grado *</label>
                        <select class="form-select" name="grade" id="grade" value="{{ old('grade', $homework->grade) }}">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Grupo *</label>
                        <select class="form-select" name="group" id="group" value="{{ old('group', $homework->group) }}">
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                            <option value="d">D</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label class="fs-3" for="">Turno *</label>
                      <select class="form-select fs-3" name="turn" id="turn" value="{{ old('turn', $homework->turn) }}">
                          <option value="Matutino">Matutino</option>
                          <option value="Vespertino">Vespertino</option>
                      </select>
                  </div>
                    <div class="form-group">
                        <label>Fecha limite</label>
                        <input name="date" class="form-control" type="date" value="{{ old('date', $homework->date) }}">
                    </div>
                    <div class="form-group">
                        <label for="">Archivo</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                    <div class="mt-2 text-end">
                      @csrf
                      @method('PUT')
                        <input type="submit" value="Actualizar" class="btn" id="btn">
                    </div>
                </form>
            </div>
        </div>
</section>

<section class="container mt-3 mb-4 col-9 d-none d-lg-block">
    <div class="card mb-3 border-dark">
        <div class="card-header fw-bold fs-3">
          <div class="row">
            <div class="col-10 ms-2">
                Crear tarea
            </div>
            <div class="col-1 text-end">
                <a class="btn btn-close fs-4" href="javascript: history.go(-1)"></a>
            </div>
        </div>
        </div>
        <div class="card-body">
            <form
                action="{{ route('homework.update', $homework) }}"
                method="POST" 
                enctype="multipart/form-data">
                <div class="form-group">
                    <label class="fs-3">Titulo</label>
                    <input type="text" name="title" class="form-control fs-3" required value="{{ old('title', $homework->title) }}">
                </div>
                <div class="form-group">
                    <label class="fs-3">Contenido</label>
                    <textarea name="body" rows="6" class="form-control fs-3" required>{{ old('body', $homework->body) }}</textarea>
                </div>
                <div class="form-group">
                    <label class="fs-3">Grado *</label>
                    <select class="form-select fs-3" name="grade" id="grade" value="{{ old('grade', $homework->grade) }}">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="fs-3" for="">Grupo *</label>
                    <select class="form-select fs-3" name="group" id="group" value="{{ old('group', $homework->group) }}">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>
                <div class="form-group">
                  <label class="fs-3" for="">Turno *</label>
                  <select class="form-select fs-3" name="turn" id="turn" value="{{ old('turn', $homework->turn) }}">
                      <option value="Matutino">Matutino</option>
                      <option value="Vespertino">Vespertino</option>
                  </select>
              </div>
                <div class="form-group">
                    <label class="fs-3">Fecha limite</label>
                    <input type="date" name="date" class="form-control fs-3" value="{{ old('date', $homework->date) }}">
                </div>
                <div class="form-group">
                    <label class="fs-3" for="">Archivo</label>
                    <input type="file" name="file" class="form-control fs-3">
                </div>
                <div class="mt-2 text-end">
                  @csrf
                  @method('PUT')
                    <input type="submit" value="Actualizar" class="btn fs-3" id="btn-color">
                </div>
            </form>
        </div>
    </div>
</section>

</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>