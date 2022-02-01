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
    <link rel="stylesheet" href="{{ asset('css/posts-admin.css') }}" />
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
        <section class="container d-lg-none">
            <div class="row">
                <div class="col-7 col-md-5 pt-2 ps-md-3 ms-md-5">
                    <span class="fs-3 fw-bold">Tareas subidas</span>
                </div>
                <div class="col-5 text-end mt-2 ms-md-3">
                    <a href="{{ route('homework.create') }}" id="btn-color" class="btn ">Subir nueva</a>
                </div>
            </div>
        </section>

        <section class="container d-none d-lg-block">
            <div class="row">
                <div class="col-7 pt-3 ps-5 ms-5 text-start">
                    <span class="fs-1 fw-bold">Tareas subidas</span>
                </div>
                <div class="col-4 text-end mt-2 fs-1">
                    <a href="{{ route('homework.create') }}" id="btn-color" class="btn fs-4">Subir nueva</a>
                </div>
            </div>
        </section>

        <section class="container mt-2 d-lg-none">
          @foreach ($homeworks as $homework)
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 ">
                    <div class="card mb-4 border-2 border-dark">
                        <div class="card-body">
                            <h3 class="card-title ">{{ $homework->title }}</h3>
                            <p class="card-text fs-5 mb-0">{{ $homework->body }}</p>
                            <a href="{{ route('homework.show', $homework) }}" class="btn btn-outline-primary">Leer más..</a>
                            <p class="text-muted mb-0">
                                <strong>
                                    Grupo: {{ $homework->grade }}-{{ $homework->group }}
                                    Turno: {{ $homework->turn }}
                                </strong><br>
                                    Fecha de entrega: {{ date('j F, Y', strtotime($homework->date))}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div >
              {{ $homeworks->links() }}
            </div>
        </section>
  

        <section class="container mt-2 d-none d-lg-block">
        @foreach ($homeworks as $homework)
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="card mb-4 border-2 border-dark">
                        <div class="card-body">
                            <h2 class="card-title fw-bold">{{ $homework->title }}</h2>
                            <p class="card-text fs-3">{{ $homework->body }}</p>
                            <a href="{{ route('homework.show', $homework)  }}" class="btn btn-outline-primary fs-4">Leer más..</a>
                            <p class="text-muted mb-0 fs-4">
                                <strong>
                                    Grupo:  {{ $homework->grade }}-{{ $homework->group }}
                                    Turno: {{ $homework->turn }}
                                </strong><br>
                                    Fecha de entrega: {{ date('j F, Y', strtotime($homework->date))}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="fs-3 ms-5 ps-5">
              {{ $homeworks->links() }}
            </div>
        </section>
        
       
        

        <!-- <section class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="staticBackdropLabel">Crear</h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container mt-3 mb-3 col-9 d-none d-lg-block">
                        <div class="card">
                            <div class="card-header fw-bold fs-3">Crear tarea</div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label class="fs-3">Titulo *</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="fs-3">Contenido *</label>
                                        <textarea name="body" rows="6" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="fs-3">Grado *</label>
                                        <select class="form-select fs-3" name="semester" id="semester">
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
                                        <select class="form-select fs-3" name="group" id="group">
                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="fs-3">Fecha limite</label>
                                        <input name="date" class="form-control fs-3" type="date"></input>
                                    </div>
                                    <div class="form-group">
                                        <label class="fs-3" for="">Archivo</label>
                                        <input type="file" name="file" class="form-control fs-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>            
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn fs-3" id="btn-new">Crear</button>
                </div>
              </div>
            </div>
          </section> -->
          

    </main>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>    
</body>
</html>