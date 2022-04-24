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
    <nav class="navbar navbar-expand-lg navbar-dark ps-3 p-lg-2">
      <div class="container-fluid">
        <a class="navbar-brand d-lg-none m-auto pb-3" href="#">
          <img style="height: 50px; width:140px;" id="main-logo" class="ps-lg-5 ms-lg-5" src="{{ asset('images/Logo-Cral.png') }}" alt="Logo CRAL101" />
        </a>
        <a class="navbar-brand d-none d-lg-block" href="#">
          <img id="main-logo" class="ps-lg-5 ms-lg-5" src="{{ asset('images/Logo-Cral.png') }}" alt="Logo CRAL101" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active lg-ps-2" aria-current="page" href="{{ url('home') }}">Información general</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-lg-5" href="{{ route('homeworks.index') }}">Tareas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-lg-5" href="{{ route('grades-user') }}">Historial de calificaciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-lg-5" href="{{ url('chat') }}">Mensajes</a>
            </li>
            <li class="nav-item d-lg-none">
              <a class="nav-link ps-lg-5 pe-lg-5" href="{{ url('profile-alumno/user') }}">Cuenta</a>
            </li>
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link dropdown ps-lg-5 pe-lg-5" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                @if (Auth::user()->image)
                <img src="../storage/images_users/{{ Auth::user()->image }}" class="rounded-circle" id="img-user">
              @else
                <img class="rounded-circle" id="img-user" src="{{ asset('images/user-profile.png') }}" />
              @endif
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ url('profile-alumno/user') }}">Cuenta</a>
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
    <section class="d-lg-none p-2">
        <div class="container text-center border border-1 border-secondary mt-2">
            <p class="m-0 fs-3 fw-bold">{{ $list[0]->title }}</p>
            <p class="m-0">{{ $list[0]->course }}</p>
            <p class="m-0">{{ $list[0]->grade }}-{{ $list[0]->group }}</p>
            <p class="m-0">{{ $list[0]->turn }}</p>
            <p class="m-0">{{ $list[0]->carrer }}</p>
            <p class="m-0 mb-2">{{ $name->name }}</p>
        </div>
    </section>

    <section class="d-lg-none">
            <section class="container d-flex justify-content-center mt-1">
                <table class="table table-responsive table-sm table-bordered border-2 border-dark">
                    <thead class="">
                        <tr>
                            <th class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">Foto</th>
                            <th class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">Nombre</th>
                            <th class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">No. Control</th>
                            <th class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">Parcial 1</th>
                            <th class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">Parcial 2</th>
                            <th class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">Parcial 3</th>
                            <th class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">Promedio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr >
                            <td class=" border-dark border-start-0 border-top-0 border-bottom-0 border-2">
                                @if ($student->image)
                                  <img src="../../storage/images_users/{{ $student->image }}" class="rounded-circle" id="img-table">
                                @else
                                  <img src="{{ asset('images/user-profile.png') }}" class="rounded-circle" id="img-table">
                                @endif
                            </td>
                            <td class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">{{ $student->name }}</td>
                            <td class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">{{ $student->no_control }}</td>
                            @if(isset($partial_1[0][$student->name]))
                            <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2 fw-bold text-center pt-2">{{ $partial_1[0][$student->name] }}</td>
                            <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2 fw-bold text-center pt-2">{{ $partial_2[0][$student->name] }}</td>
                            <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2 fw-bold text-center pt-2">{{ $partial_3[0][$student->name] }}</td>
                            <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2 fw-bold text-center pt-2">{{ $prom[0][$student->name] }}</td>
                            @else
                            <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2 fw-bold text-center pt-2">{{ $partial_1[0][$student->name] }}</td>
                            <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2 fw-bold text-center pt-2">{{ $partial_2[0][$student->name] }}</td>
                            <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2 fw-bold text-center pt-2">{{ $partial_3[0][$student->name] }}</td>
                            <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2 fw-bold text-center pt-2">{{ $prom[0][$student->name] }}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </section>            
    </section> 

    <section class="container fs-3 text-center border border-1 border-secondary mt-2 d-none d-lg-block">
        <div class="mt-3">
            <p class="m-0 fs-1 fw-bold">{{ $list[0]->title }}</p>
            <p class="m-0">{{ $list[0]->course }}</p>
            <p class="m-0">{{ $list[0]->grade }}-{{ $list[0]->group }}</p>
            <p class="m-0">{{ $list[0]->turn }}</p>
            <p class="m-0">{{ $list[0]->carrer }}</p>
            <p class="m-0 mb-2">{{ $name->name }}</p>
        </div>
    </section>

    <section class="d-none d-lg-block">
            <section class="container d-flex justify-content-center fs-4 mt-4">
                <table class="table table-bordered border-2 border-dark">
                    <thead class="">
                        <tr>
                            <th class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">Foto</th>
                            <th class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">Nombre</th>
                            <th class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">No. Control</th>
                            <th class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">Parcial 1</th>
                            <th class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">Parcial 2</th>
                            <th class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">Parcial 3</th>
                            <th class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">Promedio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td class="d-flex justify-content-center border-dark border-start-0 border-top-0 border-bottom-0 border-2">
                                @if ($student->image)
                                  <img src="../../storage/images_users/{{ $student->image }}" class="rounded-circle" id="img-table">
                                @else
                                  <img src="{{ asset('images/user-profile.png') }}" class="rounded-circle" id="img-table">
                                @endif
                            </td>
                            <td class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">{{ $student->name }}</td>
                            <td class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">{{ $student->no_control }}</td>
                            @if(isset($partial_1[0][$student->name]))
                            <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2 fs-3 fw-bold text-center pt-4">{{ $partial_1[0][$student->name] }}</td>
                            <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2 fs-3 fw-bold text-center pt-4">{{ $partial_2[0][$student->name] }}</td>
                            <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2 fs-3 fw-bold text-center pt-4">{{ $partial_3[0][$student->name] }}</td>
                            <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2 fs-3 fw-bold text-center pt-4">{{ $prom[0][$student->name] }}</td>
                            @else
                            <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2 fs-3 fw-bold text-center pt-4">{{ $partial_1[0][$student->name] }}</td>
                            <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2 fs-3 fw-bold text-center pt-4">{{ $partial_2[0][$student->name] }}</td>
                            <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2 fs-3 fw-bold text-center pt-4">{{ $partial_3[0][$student->name] }}</td>
                            <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2 fs-3 fw-bold text-center pt-4">{{ $prom[0][$student->name] }}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </section>
    </section>

</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>