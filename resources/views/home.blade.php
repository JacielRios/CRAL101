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
      
      <section class="container mt-1 d-lg-none">
        <div class="row">
          
          <div class="col-12 text-start d-md-none">
            <a type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <span>
                Filtrar
              </span>
              <span>
                <img class="col-2 p-0" src="{{ asset('images/flecha-abajo-icon.png') }}" alt="">
              </span>
            </a>
          </div>
          <div class="col-12 ms-5 ps-5 d-none d-md-block d-lg-none">
            <a type="button" class="btn btn-outline-success col-3 ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <span>
                Filtrar
              </span>
              <span>
                <img class="col-1 p-0" src="{{ asset('images/flecha-abajo-icon.png') }}" alt="">
              </span>
            </a>
          </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                
                <form action="{{ route('homeuser.index') }}" method="get">
                  <div class="container">
                    <div class="row" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
                      <div class="col-6 p-0">
                          <span>
                            Fecha
                          </span>
                      </div> 
                      <div class="col-6 text-end">
                          <span>
                            <img class="col-5" src="{{ asset('images/flecha-abajo-icon.png') }}" alt="">
                          </span>
                      </div>
                    </div>

                      <div class="collapse" id="collapseExample1">
                        <div class="form-check">
                          <input type="radio" class="form-check-input" name="date" value="nuevo" id="check1">
                          <label class="form-check-label" for="check1">Más nuevo</label>
                        </div>
                        <div class="form-check">
                          <input type="radio" class="form-check-input" name="date" value="antiguo" id="check2">
                          <label class="form-check-label" for="check2">Más antiguo</label>
                        </div>
                      </div>

                    <div class="row justify-content-center pt-3" >
                      <hr>
                    </div>

                    <div class="row" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                      <div class="col-6 p-0">
                          <span>
                            Asunto
                          </span>
                      </div> 
                      <div class="col-6 text-end">
                          <span>
                            <img class="col-5" src="{{ asset('images/flecha-abajo-icon.png') }}" alt="">
                          </span>
                      </div>
                    </div>

                      <div class="collapse" id="collapseExample2">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" name="theme" value="aviso" id="check3">
                          <label class="form-check-label" for="check3">Aviso</label>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" name="theme" value="extraordinario" id="check4">
                          <label class="form-check-label" for="check4">Extraordinarios</label>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" name="theme" value="evento" id="check6">
                          <label class="form-check-label" for="check6">Evento</label>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" name="theme" value="horario" id="check7">
                          <label class="form-check-label" for="check7">Horario</label>
                        </div>
                      </div>

                      <div class="row justify-content-center pt-3" >
                        <hr>
                      </div>

                      <div class="row" data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <div class="col-6 p-0">
                            <span>
                              Semestre
                            </span>
                        </div> 
                        <div class="col-6 text-end">
                            <span>
                              <img class="col-5" src="{{ asset('images/flecha-abajo-icon.png') }}" alt="">
                            </span>
                        </div>
                      </div>

                      <div class="collapse" id="collapseExample3">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" name="semester" value="1" id="check8">
                          <label class="form-check-label" for="check8">1er semestre</label>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" name="semester" value="2" id="check9">
                          <label class="form-check-label" for="check9">2er semestre</label>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" name="semester" value="3" id="check10">
                          <label class="form-check-label" for="check10">3er semestre</label>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" name="semester" value="4" id="check11">
                          <label class="form-check-label" for="check11">4to semestre</label>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" name="semester" value="5" id="check12">
                          <label class="form-check-label" for="check12">5to semestre</label>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" name="semester" value="6" id="check13">
                          <label class="form-check-label" for="check13">6to semestre</label>
                        </div>
                      </div>

                      <div class="row justify-content-center pt-3" >
                        <hr>
                      </div>

                      <div class="row" data-bs-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <div class="col-6 p-0">
                            <span>
                              Turno
                            </span>
                        </div> 
                        <div class="col-6 text-end">
                            <span>
                              <img class="col-5" src="{{ asset('images/flecha-abajo-icon.png') }}" alt="">
                            </span>
                        </div>
                      </div>

                      <div class="collapse" id="collapseExample4">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" name="turn" value="matutino" id="check14">
                          <label class="form-check-label" for="check14">Matutino</label>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" name="turn" value="vespertino" id="check15">
                          <label class="form-check-label" for="check15">Vespertino</label>
                        </div>
                      </div>

                    </div>
                  </div>
                <div class="modal-footer">
                  <input type="submit" class="btn" id="btn-color" value="Aplicar">
            </div>
          </form>
        </div>
        </div>
      </section>

        @php
          $i = 1;
        @endphp


      @foreach($posts as $post)
      <section class="container mt-2 mb-2 d-lg-none">
        <div class="row justify-content-center">
          <div class="col-12 col-md-9">
            <div class="card border-dark">
              <div class="card-body pt-0 pt-md-1">
                <div class="row">
                  <div class="col-10 pe-0">
                    <a class="btn text-end fw-bold p-0" data-bs-toggle="collapse" href="#collapseCard{{$i}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                      <p class="m-0 text-start">{{ $post->title }}</p>
                    </a>
                  </div>
                  <div class="col-2 ps-0 justify-content-center">
                    <a class="btn p-0" data-bs-toggle="collapse" href="#collapseCard{{$i}}" role="button" aria-expanded="false" aria-controls="collapseExample"><img class="mt-1" src="{{ asset('images/flecha-abajo-icon.png') }}" alt=""></a>
                  </div>
                </div>
              </div>
                <div class="collapse" id="collapseCard{{$i}}">
                    <div class="row">
                        <div class="col-8">
                        </div>
                         
                          <div class="col-4">
                          <a class="ms-2 border-0 " id="save-icon"
                            ><img id="save"
                              src="{{asset('images/save-icon-16px.png')}}"
                              alt="Guardar"
                          /></a>
                          <a href="#" class="ms-4"
                            ><img
                              src="{{asset('images/options-icon.png')}}"
                              alt="Opciones"
                          /></a>
                        </div>
                        <div class="col-11">
                          <p class="text-muted ps-2">
                           {{ $post->body }}
                          </p>
                        </div>
                        @if ($post->image)
                          <div class="mb-2 mt-1 ms-2" id="image_container-m">
                            <a href="storage/post/{{ $post->image }}" target="_blank"><img src="storage/post/{{ $post->image }}" class="" id="image"></a><br>
                          </div>
                          @endif
                          @if($post->file)
                            <div class="mb-2">
                              <a href="storage/post/{{ $post->file }}" target="_blank" class="ps-2">{{ $post->file }}</a>
                            </div>
                          @endif
                        <div class="col-12">
                          <div class="row">
                              <div class="col-2" id="img-card_bottom">
                                  <a href="{{ url('chat/user') }}"><img src="{{ asset('images/user-profile.png') }}" class="rounded-circle ms-2" id="img-user"></a>
                              </div>
                              <div class="col-6 ms-2 lh-1 pe-0">
                                  <p class="fw-bold m-0 mt-2 fs-6"> <a class="text-dark" href="{{ url('chat/user') }}">{{ $post->user->name }}</a></p>
                                  <p class="text-muted">
                                      {{ $post->created_at->format(' d M Y') }}
                                  </p>
                              </div>
                          </div>
                        </div>
                      </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
        @php
          $i++;
        @endphp
      @endforeach
      <div class="d-lg-none ms-3 ms-md-5 ps-md-5">
        {{ $posts->links() }}
      </div>


      
      <section class="container d-none d-lg-block mt-2">
        <div class="row">

          <div class="col-2 ">
            <div class="card mt-3">
              <div class="card-body fs-5">
                <form action="{{ route('homeuser.index') }}" method="get">
                  <h4 class="text-center">Filtrar</h4>
                  <span class="fw-bold">
                    Fecha
                  </span>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="date" value="nuevo" id="check1">
                    <label class="form-check-label" for="check1">Más nuevo</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="date" value="antiguo" id="check2">
                    <label class="form-check-label" for="check2">Más antiguo</label>
                  </div>
                  <span class="fw-bold">
                    Asunto
                  </span>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="theme" value="aviso" id="check3">
                    <label class="form-check-label" for="check3">Aviso</label>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="theme" value="extraordinario" id="check4">
                    <label class="form-check-label" for="check4">Extraordinarios</label>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="theme" value="evento" id="check6">
                    <label class="form-check-label" for="check6">Evento</label>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="theme" value="horario" id="check7">
                    <label class="form-check-label" for="check7">Horario</label>
                  </div>
                  <span class="fw-bold">
                    Semestre
                  </span>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="semester" value="1" id="check8">
                    <label class="form-check-label" for="check8">1er semestre</label>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="semester" value="2" id="check9">
                    <label class="form-check-label" for="check9">2er semestre</label>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="semester" value="3" id="check10">
                    <label class="form-check-label" for="check10">3er semestre</label>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="semester" value="4" id="check11">
                    <label class="form-check-label" for="check11">4to semestre</label>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="semester" value="5" id="check12">
                    <label class="form-check-label" for="check12">5to semestre</label>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="semester" value="6" id="check13">
                    <label class="form-check-label" for="check13">6to semestre</label>
                  </div>
                  <span class="fw-bold">
                    Turno
                  </span>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="turn" value="matutino" id="check14">
                    <label class="form-check-label" for="check14">Matutino</label>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="turn" value="vespertino" id="check15">
                    <label class="form-check-label" for="check15">Vespertino</label>
                  </div>
                  <input type="submit" class="btn mt-2 fs-5" id="btn-color" value="Aplicar">
                </form>
              </div>

            </div>
          </div>
          
          <div class="col-7 mt-3">
          @foreach ($posts as $post)
            
            <div class="card" id="main-card">
              <div class="card-body">
                <div class="row">
                  <div class="col-8">
                    <p class="fs-3 fw-bold" id="font-s">
                      {{ $post->title }}
                    </p>
                  </div>
                  <div class="col-4 text-end">
                    <button class="ms-2 border-0" id="save-icon">
                      <img id="save"
                        src="{{asset('images/save-icon-16px.png')}}"
                        alt="Guardar"/>
                      </button>
                    <a href="#" class="ms-4"
                      ><img
                        src="{{asset('images/options-icon.png')}}"
                        alt="Opciones"
                    /></a>
                  </div>
                  <div class="col-11">
                    <p class="text-muted fs-4">
                        {{ $post->body }}
                    </p>
                  </div>
                  @if ($post->image)
                    <div class="mb-3 mt-2 d-flex justify-content-center card-img-top" id="image_container">
                      <a href="storage/post/{{ $post->image }}" target="_blank"><img src="storage/post/{{ $post->image }}" class="d-flex justify-content-center" id="image"><br></a>
                    </div>
                    @endif
                    @if($post->file)
                      <a href="storage/post/{{ $post->file }}" target="_blank" class="fs-4 mb-3 mt-3">{{ $post->file }}</a>
                    @endif
                  <div class="col-12">
                    <div class="row">
                        <div class="col-1" id="img-card_bottom">
                            <a href="{{ url('chat/user') }}"><img src="{{ asset('images/user-profile.png') }}" class="rounded-circle" id="img-user"></a>
                        </div> 
                        <div class="col-6 ms-2 lh-1 pe-0">
                            <p class="fw-bold m-0 mt-2 fs-4"><a class="text-dark" href="{{ url('chat/user') }}">{{ $post->user->name }}</a></p>
                            <p class="text-muted fs-5">
                                {{ $post->created_at->format(' d M Y') }}
                            </p>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <div class="fs-3">
              {{ $posts->links() }}
            </div>
          </div>

    </div>
    
      </section> 
    </main>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
