@extends('layouts.app')

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CRAL101</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
      crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
  </head>
  <body>
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
                <a class="nav-link ps-lg-5" href="{{ route('homeworks.index')  }}"
                  >Tareas</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link ps-lg-5" href="{{ url('calificaciones/user') }}">Historial de calificaciones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link ps-lg-5" href="{{ url('chat') }}"
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

<main>
    {{-- <section class="container mt-3 mb-3 col-12 d-lg-none">
        <div class="card border-dark">
            <div class="card-header fw-bold">Crear tarea</div>
            <div class="card-body">
                <form
                      action="{{ route('homeworks.update', $edit) }}"
                        method="POST" 
                        enctype="multipart/form-data">
                      {{-- <div class="form-group">
                        <input type="hidden" name="homework_id" class="form-control fs-3"  value={{ $homework->id }}>
                      </div> 
                    <div class="form-group">
                        <label class="">Titulo</label>
                        <input type="text" name="title" class="form-control" required value="{{ old('title', $edit->title) }}">
                    </div>
                    <div class="form-group">
                        <label>Contenido</label>
                        <textarea name="body" rows="6" class="form-control" required>{{ old('body', $edit->body) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Archivo</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                    <div class="mt-2 text-end">
                      @csrf
                      @method('PUT')
                        <input type="submit" value="Subir" class="btn" id="btn">
                    </div>
                </form>
            </div>
        </div>
</section> --}}

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
                action="{{ route('homeworks.update', $homework) }}"
                method="POST" 
                enctype="multipart/form-data">
                {{-- <div class="form-group">
                    <input type="hidden" name="homework_id" class="form-control fs-3"  value={{ $homework->id }}>
                </div> --}}
                <div class="form-group">
                    <label class="fs-3">Titulo</label>
                    <input type="text" name="title" class="form-control fs-3" required value="{{ old('title', $homework->title) }}">
                </div>
                <div class="form-group">
                    <label class="fs-3">Contenido</label>
                    <textarea name="body" rows="6" class="form-control fs-3">{{ old('body', $homework->body) }}</textarea>
                </div>
                <div class="form-group">
                    <label class="fs-3" for="">Archivo</label>
                    <input type="file" name="file" class="form-control fs-3">
                </div>
                  {{-- <input type="hidden" name="check" value="1"> --}}
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