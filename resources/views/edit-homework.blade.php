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
<main>
      <section class="container mt-3 mb-3 col-12 d-lg-none">
        <div class="card border-dark">
            <div class="card-body">
                <form
                      action="{{ route('homework.update', $homework) }}"
                        method="POST" 
                        enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="fw-bold m-0 fs-6">Titulo</label>
                        <input type="text" name="title" class="form-control" required value="{{ old('title', $homework->title) }}">
                    </div>
                    <div class="form-group">
                        <label class="fw-bold m-0 fs-6">Contenido</label>
                        <textarea name="body" rows="4" class="form-control" required>{{ old('body', $homework->body) }}</textarea>
                    </div>
                    <div class="form-group">
                      <label class="fw-bold m-0 fs-6 fs-6">Materia</label>
                      <input type="text" name="course" class="form-control" required value="{{ old('course', $homework->course) }}"> 
                  </div>
                    <div class="form-group">
                        <label class="fw-bold m-0 fs-6">Grado *</label>
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
                        <label class="fw-bold m-0 fs-6">Grupo *</label>
                        <select class="form-select" name="group" id="group">
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                            <option value="d">D</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label class="fw-bold m-0 fs-6" for="">Turno *</label>
                      <select class="form-select " name="turn" id="turn">
                          <option value="Matutino">Matutino</option>
                          <option value="Vespertino">Vespertino</option>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="carrer" class="fw-bold m-0 fs-6">{{ __('Especialidad *') }}</label>
    
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
                    <div class="form-group ">
                        <label class="fw-bold m-0 fs-6">Fecha limite</label>
                        <input name="date" class="form-control" type="date" value="{{ old('date', $homework->date) }}">
                    </div>
                    <div class="container-input mt-2">
                      <input type="file" name="file" id="file-3" class="inputfile inputfile-3" data-multiple-caption="{count} archivos seleccionados" multiple />
                      <label for="file-3" class="p-0">
                      <img src="{{asset('images/file.png')}}">
                      <span class="iborrainputfile">Seleccionar archivo</span>
                      </label>
                    </div>
                        <div class="container-input ">
                          <input type="file" name="image" id="file-4" accept="image/*" class="inputfile inputfile-4" data-multiple-caption="{count} archivos seleccionados" multiple />
                          <label for="file-4" class="p-0">
                          <img src="{{asset('images/image.png')}}">
                          <span>Seleccionar imagen</span>
                          </label>
                        </div>
                    <div class="mt-2 text-end">
                        @csrf
                        @method('PUT')
                        <input type="submit" value="Actualizar" class="btn" id="btn-color">
                    </div>
                </form>
            </div>
        </div>
</section>

<section class="container mb-4 col-9 d-none d-lg-block">
  <div id="color"></div>
    <div class="card border-2 border-dark rounded">
        {{-- <div class="card-header fw-bold fs-3">
          <div class="row">
            <div class="col-10 ms-2">
                Crear tarea
            </div>
            <div class="col-1 text-end">
                <a class="btn btn-close fs-4" href="javascript: history.go(-1)"></a>
            </div> 
        </div>
        </div> --}}
        <div class="card-body">
            <form
                action="{{ route('homework.update', $homework) }}"
                method="POST" 
                enctype="multipart/form-data">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="fs-3 fw-bold">Titulo</label>
                      <input type="text" name="title" class="form-control fs-3" required value="{{ old('title', $homework->title) }}">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="fs-3 fw-bold">Materia</label>
                      <input type="text" name="course" class="form-control fs-3" required value="{{ old('course', $homework->course) }}">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <label class="fs-3 fw-bold">Contenido</label>
                    <textarea name="body" rows="4" class="form-control fs-3" required>{{ old('body', $homework->body) }}</textarea>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="fs-3 fw-bold">Grado *</label>
                      <select class="form-select fs-3" name="grade" id="grade">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="fs-3 fw-bold" for="">Grupo *</label>
                      <select class="form-select fs-3" name="group" id="group">
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                      </select>
                  </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="fs-3 fw-bold" for="">Turno *</label>
                      <select class="form-select fs-3" name="turn" id="turn">
                          <option value="Matutino">Matutino</option>
                          <option value="Vespertino">Vespertino</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div>
                      <label for="carrer" class="form-label mb-0 mt-2 fs-3 fw-bold">{{ __('Especialidad') }}</label>
      
                      <div class="fs-3">
                          <select class="form-select fs-3 @error('group') is-invalid @enderror" name="carrer" id="carrer" required>
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
                  </div>
                </div>
                <div class="form-group">
                    <label class="fs-3 fw-bold">Fecha límite</label>
                    <input type="date" name="date" class="form-control fs-3" value="{{ old('date', $homework->date) }}">
                </div>
                <div class="container-input ">
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
                <div class="mt-2 text-end">
                    @csrf
                    @method('PUT')
                    <input type="submit" value="Actualizar" class="btn fs-3" id="btn-color">
                </div>
              </div>
            </form>
        </div>
    </div>
</section>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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