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
    <link rel="stylesheet" href="{{ asset('css/calificaciones-user.css') }}" />
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

      <div  id="formPC" class="container">
        <form>
           <div class="mb-4 col-5">
               <label for="turno" class="form-label">Selecione el turno</label>
               <select class="form-select" aria-label="Default select example" id="turno" >
                <option value="1">Matutino</option>
                <option value="2">vespertino</option>
              </select>
           </div>
           <div class="mb-4 col-5">
               <label for="grado" class="form-label">Selecione el grado</label>
               <select class="form-select" aria-label="Default select example" id="grado">
                <option value="1">1°</option>
                <option value="2">3°</option>
                <option value="3">5°</option>
              </select>
           </div>
           <div class="mb-4 col-5">
               <label for="grupo" class="form-label">Selecione el grupo</label>
               <select class="form-select" aria-label="Default select example" id="grupo">
                <option value="1">A</option>
                <option value="2">B</option>
                <option value="3">C</option>
              </select>
            </div>  
            <div class="mb-4 col-5">
                <label for="especialidad" class="form-label">Selecione la espacialidad</label>
               <select class="form-select" aria-label="Default select example" id="especialidad">
                <option value="1">Programacion</option>
                <option value="2">Secretaria</option>
                <option value="3">Contaduria</option>
              </select>
            </div>
           <div class="mb-4 col-5">
               <label for="materia" class="form-label">Selecione la materia a calificar</label>
               <select class="form-select" aria-label="Default select example" id="materia">
                <option value="1">{awdawdawd2}</option>
                <option value="2">{awdawdawd3}</option>
                <option value="3">{awdawdawd4}</option>
           </div>


           <div class="mt-2">
                <input type="submit" class="btn btn-xxl btn-primary mt-4 col-2 fs-3" value="Calificar">
           </div>

        </form>
        
    </div>
    
</body>
</html>