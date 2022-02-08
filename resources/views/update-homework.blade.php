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
    <section class="container col-12 d-lg-none">
      <div id="color"></div>
        <div class="card border-dark">
            <div class="card-body p-2">
                <form
                      action="{{ route('homeworks.update', $homework) }}"
                        method="POST" 
                        enctype="multipart/form-data">
                      <div class="form-group">
                        <input type="hidden" name="homework_id" class="form-control fs-3"  value={{ $homework->id }}>
                      </div> 
                    <div class="form-group">
                        <label class="fw-bold m-0">Titulo</label>
                        <input type="text" name="title" class="form-control" required value="{{ old('title', $homework->title) }}">
                    </div>
                    <div class="form-group">
                        <label class="fw-bold m-0">Contenido</label>
                        <textarea name="body" rows="6" class="form-control" required>{{ old('body', $homework->body) }}</textarea>
                    </div>
                    <div class="container-input mt-2">
                      <input type="file" name="file" id="file-3" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple />
                      <label for="file-3" class="p-0">
                      <img src="{{asset('images/file.png')}}">
                      <span class="iborrainputfile">Seleccionar archivo</span>
                      </label>
                    </div>
                        <div class="container-input ">
                          <input type="file" name="image" id="file-4" accept="image/*" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple />
                          <label for="file-4" class="p-0">
                          <img src="{{asset('images/image.png')}}">
                          <span>Seleccionar imagen</span>
                          </label>
                        </div>
                    <div class="mt-2 text-end">
                      @csrf
                      @method('PUT')
                        <input type="submit" value="Subir" class="btn" id="btn-color">
                    </div>
                </form>
            </div>
        </div>
</section>

<section class="container col-9 d-none d-lg-block">
  <div id="color"></div>
    <div class="card border-dark border-2">
        <div class="card-body">
            <form
                action="{{ route('homeworks.update', $homework) }}"
                method="POST" 
                enctype="multipart/form-data">
                {{-- <div class="form-group">
                    <input type="hidden" name="homework_id" class="form-control fs-3"  value={{ $homework->id }}>
                </div> --}}
                <div class="form-group">
                    <label class="fs-3 fw-bold">Titulo</label>
                    <input type="text" name="title" class="form-control fs-3" required value="{{ old('title', $homework->title) }}">
                </div>
                <div class="form-group">
                    <label class="fs-3 fw-bold">Contenido</label>
                    <textarea name="body" rows="6" class="form-control fs-3">{{ old('body', $homework->body) }}</textarea>
                </div>
                <div class="container-input mt-3">
                  <input type="file" name="file" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple />
                  <label for="file-1" class="p-0">
                  <img src="{{asset('images/file.png')}}">
                  <span class="iborrainputfile">Seleccionar archivo</span>
                  </label>
                </div>
                    <div class="container-input ">
                      <input type="file" name="image" id="file-2" accept="image/*" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple />
                      <label for="file-2" class="p-0">
                      <img src="{{asset('images/image.png')}}">
                      <span>Seleccionar imagen</span>
                      </label>
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
<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <script>
      'use strict';
    
    ;( function ( document, window, index )
    {
      var inputs = document.querySelectorAll( '.inputfile' );
      Array.prototype.forEach.call( inputs, function( input )
      {
        var label	 = input.nextElementSibling,
          labelVal = label.innerHTML;
    
        input.addEventListener( 'change', function( e )
        {
          var fileName = '';
          if( this.files && this.files.length > 1 )
            fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
          else
            fileName = e.target.value.split( '\\' ).pop();
    
          if( fileName )
            label.querySelector( 'span' ).innerHTML = fileName;
          else
            label.innerHTML = labelVal;
        });
      });
    }( document, window, 0 ));
    </script>
</body>
</html>