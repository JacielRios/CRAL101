@extends('layouts.app')

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRAL101</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/lista-admin.css') }}">
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
                            <a class="nav-link ps-lg-5 pe-lg-5" href="{{ url('profile-profesor/user') }}">Cuenta</a>
                        </li>
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link dropdown ps-lg-5 pe-lg-5" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if (Auth::user()->image)
                                <img src="../../storage/images_users/{{ Auth::user()->image }}" class="rounded-circle" id="img-user">
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
        <section class="d-lg-none p-2">
            <div class="container text-center border border-1 border-secondary mt-2">
                <p class="m-0 fs-3 fw-bold">{{ $list->title }}</p>
                <p class="m-0">{{ $list->course }}</p>
                <p class="m-0">{{ $list->grade }}-{{ $list->group }}</p>
                <p class="m-0">{{ $list->turn }}</p>
                <p class="m-0">{{ $list->carrer }}</p>
                <p class="m-0 mb-2">{{ auth()->user()->name }}</p>
            </div>
        </section>

        <section class="d-lg-none">
            <form action="{{ route('list.update', $list->id) }}" method="post">
                @csrf
                @method('PUT')
                <section class="container mt-2 text-end">
                    <div>
                        <input type="submit" class="btn" value="Subir lista" id="btn-color">
                    </div>
                </section>
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
                                <th class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">Eliminar registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach($students as $student)
                            <tr id="{{ $i }}">
                                <td class=" border-dark border-start-0 border-top-0 border-bottom-0 border-2">
                                @if ($student->image)
                                <img src="../../storage/images_users/{{ $student->image }}" class="rounded-circle" id="img-table">
                              @else
                                <img class="rounded-circle" id="img-table" src="{{ asset('images/user-profile.png') }}" />
                              @endif
                                </td>
                                <td class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">{{ $student->name }}</td>
                                <td class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">{{ $student->no_control }}</td>
                                @if(isset($partial_1[0][$student->name]))
                                <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2"><input type="number" class="text-center fw-bold" id="input-table" name="partial_1[{{ $student->name }}]" value="{{ $partial_1[0][$student->name] }}"></td>
                                <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2"><input type="number" class="text-center fw-bold" id="input-table" name="partial_2[{{ $student->name }}]" value="{{ $partial_2[0][$student->name] }}"></td>
                                <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2"><input type="number" class="text-center fw-bold" id="input-table" name="partial_3[{{ $student->name }}]" value="{{ $partial_3[0][$student->name] }}"></td>
                                <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2"><input type="number" class="text-center fw-bold" id="input-table" name="prom[{{ $student->name }}]" value="{{ $prom[0][$student->name] }}"></td>
                                <td class="text-center align-middle border-dark border-start-0 border-top-0 border-bottom-0 border-2"><button class="btn btn-danger" onclick="eliminarElemento()">Eliminar</button></td>
                                @else
                                <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2"><input type="number" class="text-center fw-bold" id="input-table" name="partial_1[{{ $student->name }}]"></td>
                                <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2"><input type="number" class="text-center fw-bold" id="input-table" name="partial_2[{{ $student->name }}]"></td>
                                <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2"><input type="number" class="text-center fw-bold" id="input-table" name="partial_3[{{ $student->name }}]"></td>
                                <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2"><input type="number" class="text-center fw-bold" id="input-table" name="prom[{{ $student->name }}]"></td>
                                <td class="text-center align-middle border-dark border-start-0 border-top-0 border-bottom-0 border-2"><button class="btn btn-danger" onclick="eliminarElemento()">Eliminar</button></td>
                                @endif
            </form>
            </tr>
            @php
            $i++
            @endphp
            @endforeach
            </tbody>
            </table>
        </section>            
        </section>

        <section class="container fs-3 text-center border border-1 border-secondary mt-2 d-none d-lg-block">
            <div class="mt-3">
                <p class="m-0 fs-1 fw-bold">{{ $list->title }}</p>
                <p class="m-0">{{ $list->course }}</p>
                <p class="m-0">{{ $list->grade }}-{{ $list->group }}</p>
                <p class="m-0">{{ $list->turn }}</p>
                <p class="m-0">{{ $list->carrer }}</p>
                <p class="m-0 mb-2">{{ auth()->user()->name }}</p>
            </div>
        </section>

        <section class="d-none d-lg-block">
            <form action="{{ route('list.update', $list->id) }}" method="post">
                @csrf
                @method('PUT')
                <section class="container mt-2 text-end">
                    <div>
                        <input type="submit" class="btn fs-3" value="Subir lista" id="btn-color">
                    </div>
                </section>
                <section class="container d-flex justify-content-center fs-4 mt-3">
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
                                <th class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">Eliminar registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach($students as $student)
                            <tr id="{{ $i }}">
                                <td class="d-flex justify-content-center border-dark border-start-0 border-top-0 border-bottom-0 border-2">
                                    @if ($student->image)
                                <img src="../../storage/images_users/{{ $student->image }}" class="rounded-circle" id="img-table">
                              @else
                                <img class="rounded-circle" id="img-table" src="{{ asset('images/user-profile.png') }}" />
                              @endif
                                </td>
                                <td class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">{{ $student->name }}</td>
                                <td class="border-dark border-start-0 border-top-0 border-bottom-0 border-2">{{ $student->no_control }}</td>
                                @if(isset($partial_1[0][$student->name]))
                                <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2"><input type="number" class="text-center fs-3 fw-bold" id="input-table" name="partial_1[{{ $student->name }}]" value="{{ $partial_1[0][$student->name] }}"></td>
                                <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2"><input type="number" class="text-center fs-3 fw-bold" id="input-table" name="partial_2[{{ $student->name }}]" value="{{ $partial_2[0][$student->name] }}"></td>
                                <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2"><input type="number" class="text-center fs-3 fw-bold" id="input-table" name="partial_3[{{ $student->name }}]" value="{{ $partial_3[0][$student->name] }}"></td>
                                <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2"><input type="number" class="text-center fs-3 fw-bold" id="input-table" name="prom[{{ $student->name }}]" value="{{ $prom[0][$student->name] }}"></td>
                                <td class="text-center align-middle border-dark border-start-0 border-top-0 border-bottom-0 border-2"><button class="btn btn-danger fs-4" onclick="eliminarElemento()">Eliminar</button></td>
                                @else
                                <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2"><input type="number" class="text-center fs-3 fw-bold" id="input-table" name="partial_1[{{ $student->name }}]"></td>
                                <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2"><input type="number" class="text-center fs-3 fw-bold" id="input-table" name="partial_2[{{ $student->name }}]"></td>
                                <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2"><input type="number" class="text-center fs-3 fw-bold" id="input-table" name="partial_3[{{ $student->name }}]"></td>
                                <td class="p-0 border-dark border-start-0 border-top-0 border-bottom-0 border-2"><input type="number" class="text-center fs-3 fw-bold" id="input-table" name="prom[{{ $student->name }}]"></td>
                                <td class="text-center align-middle border-dark border-start-0 border-top-0 border-bottom-0 border-2"><button class="btn btn-danger fs-4" onclick="eliminarElemento()">Eliminar</button></td>
                                @endif
            </form>
            </tr>
            @php
            $i++
            @endphp
            @endforeach
            </tbody>
            </table>
        </section>
        </section>

    </main>
    <!-- <script>
        function eliminarElemento()
        {
            $("#1").remove();
        }
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>