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
    <link rel="stylesheet" href="{{ asset('css/calificaciones-user.css') }}" />
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
    
      <div  id="Centrado" class="container-xl">
        <center><h1>KARDEX</h1>
        <h2>{Nombre Alumno}</h2>
        <h4>{Numero de Control}</h4>
        <h4>{Grado y Grupo}</h4></center>

        <table  id="Tabla" class="table table-hover table-bordered " >
            <thead class= "table-primary">
                <tr>
                    <th> Semestre </th>
                    <th> Materia </th>
                    <th>1 Parcial</th>
                    <th>2 Parcial</th>
                    <th>3 Parcial</th>
                    <th>Final</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{Semestre 1}</td>
                    <td>{Materia 1}</td>
                    <td>{calif}</td>
                    <td>{calif}</td>
                    <td>{calif}</td>
                    <td>{Promp}</td>
                </tr>
                <tr>
                    <td>{Semestre 1}</td>
                    <td>{Materia 2}</td>
                    <td>{calif}</td>
                    <td>{calif}</td>
                    <td>{calif}</td>
                    <td>{Promp}</td>
                </tr>
                <tr>
                    <td>{Semestre 1}</td>
                    <td>{Materia 3}</td>
                    <td>{calif}</td>
                    <td>{calif}</td>
                    <td>{calif}</td>
                    <td>{Promp}</td>
                </tr>
                <tr>
                    <td>{Semestre 1}</td>
                    <td>{Materia 4}</td>
                    <td>{calif}</td>
                    <td>{calif}</td>
                    <td>{calif}</td>
                    <td>{Promp}</td>
                </tr>
                <tr>
                    <td>{Semestre 1}</td>
                    <td>{Materia 5}</td>
                    <td>{calif}</td>
                    <td>{calif}</td>
                    <td>{calif}</td>
                    <td>{Promp}</td>
                </tr>
                <tr>
                    <td>{Semestre 1}</td>
                    <td>{Materia 6}</td>
                    <td>{calif}</td>
                    <td>{calif}</td>
                    <td>{calif}</td>
                    <td>{Promp}</td>
                </tr>
                <tr>
                    <td>{Semestre 1}</td>
                    <td>{Materia 7}</td>
                    <td>{calif}</td>
                    <td>{calif}</td>
                    <td>{calif}</td>
                    <td>{Promp}</td>
                </tr>
                <tr>
                  <td>{Semestre 2}</td>
                  <td>{Materia 1}</td>
                  <td>{calif}</td>
                  <td>{calif}</td>
                  <td>{calif}</td>
                  <td>{Promp}</td>
              </tr>
              <tr>
                  <td>{Semestre 2}</td>
                  <td>{Materia 2}</td>
                  <td>{calif}</td>
                  <td>{calif}</td>
                  <td>{calif}</td>
                  <td>{Promp}</td>
              </tr>
              <tr>
                  <td>{Semestre 2}</td>
                  <td>{Materia 3}</td>
                  <td>{calif}</td>
                  <td>{calif}</td>
                  <td>{calif}</td>
                  <td>{Promp}</td>
              </tr>
              <tr>
                  <td>{Semestre 2}</td>
                  <td>{Materia 4}</td>
                  <td>{calif}</td>
                  <td>{calif}</td>
                  <td>{calif}</td>
                  <td>{Promp}</td>
              </tr>
              <tr>
                  <td>{Semestre 2}</td>
                  <td>{Materia 5}</td>
                  <td>{calif}</td>
                  <td>{calif}</td>
                  <td>{calif}</td>
                  <td>{Promp}</td>
              </tr>
              <tr>
                  <td>{Semestre 2}</td>
                  <td>{Materia 6}</td>
                  <td>{calif}</td>
                  <td>{calif}</td>
                  <td>{calif}</td>
                  <td>{Promp}</td>
              </tr>
              <tr>
                  <td>{Semestre 2}</td>
                  <td>{Materia 7}</td>
                  <td>{calif}</td>
                  <td>{calif}</td>
                  <td>{calif}</td>
                  <td>{Promp}</td>
              </tr>
              <tr>
                <td>{Semestre 3}</td>
                <td>{Materia 1}</td>
                <td>{calif}</td>
                <td>{calif}</td>
                <td>{calif}</td>
                <td>{Promp}</td>
            </tr>
            <tr>
                <td>{Semestre 3}</td>
                <td>{Materia 2}</td>
                <td>{calif}</td>
                <td>{calif}</td>
                <td>{calif}</td>
                <td>{Promp}</td>
            </tr>
            <tr>
                <td>{Semestre 3}</td>
                <td>{Materia 3}</td>
                <td>{calif}</td>
                <td>{calif}</td>
                <td>{calif}</td>
                <td>{Promp}</td>
            </tr>
            <tr>
                <td>{Semestre 3}</td>
                <td>{Materia 4}</td>
                <td>{calif}</td>
                <td>{calif}</td>
                <td>{calif}</td>
                <td>{Promp}</td>
            </tr>
            <tr>
                <td>{Semestre 3}</td>
                <td>{Materia 5}</td>
                <td>{calif}</td>
                <td>{calif}</td>
                <td>{calif}</td>
                <td>{Promp}</td>
            </tr>
            <tr>
                <td>{Semestre 3}</td>
                <td>{Materia 6}</td>
                <td>{calif}</td>
                <td>{calif}</td>
                <td>{calif}</td>
                <td>{Promp}</td>
            </tr>
            <tr>
                <td>{Semestre 3}</td>
                <td>{Materia 7}</td>
                <td>{calif}</td>
                <td>{calif}</td>
                <td>{calif}</td>
                <td>{Promp}</td>
            </tr>
            <tr>
              <td>{Semestre 4}</td>
              <td>{Materia 1}</td>
              <td>{calif}</td>
              <td>{calif}</td>
              <td>{calif}</td>
              <td>{Promp}</td>
          </tr>
          <tr>
              <td>{Semestre 4}</td>
              <td>{Materia 2}</td>
              <td>{calif}</td>
              <td>{calif}</td>
              <td>{calif}</td>
              <td>{Promp}</td>
          </tr>
          <tr>
              <td>{Semestre 4}</td>
              <td>{Materia 3}</td>
              <td>{calif}</td>
              <td>{calif}</td>
              <td>{calif}</td>
              <td>{Promp}</td>
          </tr>
          <tr>
              <td>{Semestre 4}</td>
              <td>{Materia 4}</td>
              <td>{calif}</td>
              <td>{calif}</td>
              <td>{calif}</td>
              <td>{Promp}</td>
          </tr>
          <tr>
              <td>{Semestre 4}</td>
              <td>{Materia 5}</td>
              <td>{calif}</td>
              <td>{calif}</td>
              <td>{calif}</td>
              <td>{Promp}</td>
          </tr>
          <tr>
              <td>{Semestre 4}</td>
              <td>{Materia 6}</td>
              <td>{calif}</td>
              <td>{calif}</td>
              <td>{calif}</td>
              <td>{Promp}</td>
          </tr>
          <tr>
              <td>{Semestre 4}</td>
              <td>{Materia 7}</td>
              <td>{calif}</td>
              <td>{calif}</td>
              <td>{calif}</td>
              <td>{Promp}</td>
          </tr>
          <tr>
            <td>{Semestre 5}</td>
            <td>{Materia 1}</td>
            <td>{calif}</td>
            <td>{calif}</td>
            <td>{calif}</td>
            <td>{Promp}</td>
        </tr>
        <tr>
            <td>{Semestre 5}</td>
            <td>{Materia 2}</td>
            <td>{calif}</td>
            <td>{calif}</td>
            <td>{calif}</td>
            <td>{Promp}</td>
        </tr>
        <tr>
            <td>{Semestre 5}</td>
            <td>{Materia 3}</td>
            <td>{calif}</td>
            <td>{calif}</td>
            <td>{calif}</td>
            <td>{Promp}</td>
        </tr>
        <tr>
            <td>{Semestre 5}</td>
            <td>{Materia 4}</td>
            <td>{calif}</td>
            <td>{calif}</td>
            <td>{calif}</td>
            <td>{Promp}</td>
        </tr>
        <tr>
            <td>{Semestre 5}</td>
            <td>{Materia 5}</td>
            <td>{calif}</td>
            <td>{calif}</td>
            <td>{calif}</td>
            <td>{Promp}</td>
        </tr>
        <tr>
            <td>{Semestre 5}</td>
            <td>{Materia 6}</td>
            <td>{calif}</td>
            <td>{calif}</td>
            <td>{calif}</td>
            <td>{Promp}</td>
        </tr>
        <tr>
            <td>{Semestre 5}</td>
            <td>{Materia 7}</td>
            <td>{calif}</td>
            <td>{calif}</td>
            <td>{calif}</td>
            <td>{Promp}</td>
        </tr>
        <tr>
          <td>{Semestre 6}</td>
          <td>{Materia 1}</td>
          <td>{calif}</td>
          <td>{calif}</td>
          <td>{calif}</td>
          <td>{Promp}</td>
      </tr>
      <tr>
          <td>{Semestre 6}</td>
          <td>{Materia 2}</td>
          <td>{calif}</td>
          <td>{calif}</td>
          <td>{calif}</td>
          <td>{Promp}</td>
      </tr>
      <tr>
          <td>{Semestre 6}</td>
          <td>{Materia 3}</td>
          <td>{calif}</td>
          <td>{calif}</td>
          <td>{calif}</td>
          <td>{Promp}</td>
      </tr>
      <tr>
          <td>{Semestre 6}</td>
          <td>{Materia 4}</td>
          <td>{calif}</td>
          <td>{calif}</td>
          <td>{calif}</td>
          <td>{Promp}</td>
      </tr>
      <tr>
          <td>{Semestre 6}</td>
          <td>{Materia 5}</td>
          <td>{calif}</td>
          <td>{calif}</td>
          <td>{calif}</td>
          <td>{Promp}</td>
      </tr>
      <tr>
          <td>{Semestre 6}</td>
          <td>{Materia 6}</td>
          <td>{calif}</td>
          <td>{calif}</td>
          <td>{calif}</td>
          <td>{Promp}</td>
      </tr>
      <tr>
          <td>{Semestre 6}</td>
          <td>{Materia 7}</td>
          <td>{calif}</td>
          <td>{calif}</td>
          <td>{calif}</td>
          <td>{Promp}</td>
      </tr>
            </tbody>
        </table>

        <center><button  id="Kardexbt" type="button" class="btn btn-primary fs-3 mb-3">Descargar</button></center>
      </div>
      
</body>
</html>