@extends('layouts.app')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRAL101</title>
    <link href="{{ asset('css/edit-user.css') }}" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark p-0 p-lg-2">
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
                <button class="navbar-toggler w-80" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link ps-2 fs-5 lg-ps-2 fs-5" aria-current="page" href="{{ url('/home-profesor/post') }}">Información general</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ps-2 fs-5 ps-lg-3" href="#">Tareas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ps-2 fs-5 ps-lg-3" href="#">Historial de calificaciones</a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link ps-2 pe-lg-3 fs-5" href="{{ url('profile-profesor/user') }}">Cuenta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ps-2 pe-lg-3 fs-5" href="{{ url('chat') }}"
                          >Mensajes</a
                        >
                      </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link dropdown ps-2 pe-lg-3"id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          <img
                            class="rounded-circle"
                            id="img-user"
                            src="{{ asset('images/user-profile.png') }}"/>              
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item fs-5"href="{{ url('profile-profesor/user') }}">Cuenta</a>
                          <a class="dropdown-item fs-5" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Cerrar sesión') }}
                          </a>
                          </div>
                      </a>
                      </li>
                      <li class="nav-item d-lg-none">
                        <a class="nav-link ps-lg-5 ps-2 pe-lg-3 fs-5" href="{{ route('logout') }}"
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
    <main id="main-section">
        <section class="container col-11 col-md-10 col-xl-6 mx-auto rounded-3 mt-4 mb-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mt-1" id="main-card">
                        <div class="card-header text-center fw-bold fs-5">{{ __('Editar cuenta') }}</div>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('profilead.update', $user->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="fs-5">
                                    <label for="name" class="form-label mb-0"><span><img src="{{asset('images/man-user.png')}}"></span>{{ __('Nombre de usuario') }}</label>
        
                                    <div class="">
                                        <input id="name" type="text" class="form-control p-0 border-top-0 border-start-0 border-end-0 rounded-0 border-bottom border-2 border-dark @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                {{-- <div>
                                    <label for="no_control" class="form-label mb-0 mt-2"><span><img src="{{asset('images/codep-icon.png')}}"></span>{{ __('Número de control') }}</label>
        
                                    <div class="">
                                        <input id="no_control" type="number" class="form-control p-0 border-top-0 border-start-0 border-end-0 rounded-0 border-bottom border-2 border-dark @error('no_control') is-invalid @enderror" name="no_control" value="{{ $user->no_control }}">
        
                                        @error('no_control')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}
        
                                {{-- <div>
                                    <label for="semester" class="form-label mb-0 mt-2"><span><img src="{{asset('images/semester-icon.png')}}"></span>{{ __('Ingresa tu semestre *') }} </label>
        
                                    <div class="">
                                        <select class="form-select @error('semester') is-invalid @enderror" name="semester" id="semester" value="{{ $user->semester }}">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
        
                                        @error('semester')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="group" class="form-label mb-0 mt-2"><span><img src="{{asset('images/group-icon.png')}}"></span>{{ __('Ingresa tu grupo *') }}</label>
        
                                    <div class="">
                                        <select class="form-select @error('group') is-invalid @enderror" name="group" id="group" >
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
        
                                        @error('group')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}

                                <div class="fs-5">
                                    <label for="email" class="form-label mb-0 mt-2"><span><img src="{{asset('images/email-icon.png')}}"></span>{{ __('Correo electrónico') }}</label>
        
                                    <div class="">
                                        <input id="email" type="email" class="form-control p-0 border-top-0 border-start-0 border-end-0 rounded-0 border-bottom border-2 border-dark @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}"  autocomplete="email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                {{-- <div class="">
                                    <label for="password" class="form-label mb-0 mt-2"><span><img src="{{asset('images/pass-icon.png')}}"></span>{{ __('Contraseña') }}</label>
        
                                    <div class="">
                                        <input id="password" type="password" class="form-control p-0 border-top-0 border-start-0 border-end-0 rounded-0 border-bottom border-2 border-dark @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="">
                                    <label for="password-confirm" class="form-label mb-0 mt-2"><span><img src="{{asset('images/pass-icon.png')}}"></span>{{ __('Confirmar contraseña') }}</label>
        
                                    <div class="">
                                        <input id="password-confirm" type="password" class="form-control p-0 border-top-0 border-start-0 border-end-0 rounded-0 border-bottom border-2 border-dark" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div> --}}

                                {{-- <div class="">
                                    <input type="hidden" class="form-control p-0 border-top-0 border-start-0 border-end-0 rounded-0 border-bottom border-2 border-dark" name="role" value="user">
                                </div> --}}
        
                                <div class="">
                                    <div class="d-grid col-11 mx-auto mt-4">
                                        <input type="submit" class="btn btn-outline-light" id="btn-color" value="Actualizar cuenta">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>