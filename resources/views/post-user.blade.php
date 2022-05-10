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
    <link rel="stylesheet" href="{{ asset('css/post-user.css') }}" />
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
              <a class="nav-link ps-lg-5 pe-lg-5" href="{{ url('profile-alumno/user') }}"
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
        <section class="container mt-2 d-lg-none">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="card border-dark">
                <div class="card-body">
                  <h5 class="card-title fw-bold mb-2">{{ $homework->title }}</h5>
                  <p class="card-text m-0">
                   {{ $homework->body }}
                  </p>
                  @if ($homework->image)
                    <div class="mb-3 mt-2 d-flex justify-content-center card-img-top" id="image_container-m">
                      <a href="../storage/homeworks/{{ $homework->image }}" target="_blank"><img src="../storage/homeworks/{{ $homework->image }}" class="d-flex justify-content-center" id="image"><br></a>
                    </div>
                    @endif
                    @if($homework->file)
                      <a href="../storage/homeworks/{{ $homework->file }}" target="_blank" class="mb-3 mt-3">{{ $homework->file }}</a>
                    @endif
                  <p class="text-muted mb-0">
                    <strong>Materia: {{ $homework->course }}</strong><br />
                    Turno: {{ $homework->turn }} <br>
                    Grupo: {{ $homework->grade }}-{{ $homework->group }}
                    Fecha de entrega: {{ date('j F, Y', strtotime($homework->date))}}
                  </p>
                  @if($exist == false)
                  <section class="container mt-2 d-lg-none">
                    <div class="row justify-content-center">
                      <div class="col-12 p-0">
                          <div class="card mb-4 border-2 border-dark">
                              <div class="card-body p-2">
                                  <div class="row">
                                    <h5 class="card-title text-center fw-bold col-10">Tarea enviada</h5>
                                    <div class="col-2">
                                      <a class="dropdown "id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <img
                                        src="{{ asset('images/options-icon.png') }}"
                                        alt="Opciones"/>           
                                      </a>
                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @livewire('confirm-alert-home-sen', ['homework_senId' => $complete->id])
                                      </div>
                                    </div>
                                  </div>
                                  <p class="card-title fs-6 fw-bold m-0">{{ $complete->title }}</p>
                                  <p class="card-text fs-6 mb-0">{{ $complete->body }}</p>
                                  @if($complete->file)
                                    <a href="../storage/homeworks_send/{{ $complete->file }}" target="_blank">{{ $complete->file }}</a>
                                  @endif
                                  @if ($complete->image)
                                  <div class="mb-3 mt-2">
                                    <a href="../storage/homeworks_send/{{ $complete->image }}" target="_blank">{{ $complete->image }}</a><br>
                                  </div>
                                  @endif
                              </div>
                          </div>
                      </div>
                  </div>
                  </section>
                  @endif
                  @if ($exist == true)
                  <div class="mt-3">
                    <a href="{{ route('create', $homework )}}" class="btn " id="btn_color">Subir</a>
                  </div>
                  @elseif($exist == false)
                  <div class="mt-3">
                    <a href="{{ route('homeworks.edit', $homework )}}" class="btn-sm fs-6 col-2" id="btn_color">Actualizar</a>
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="container d-lg-none">
          <div class="mt-2 mb-3">
              <div class="card border-dark">
                  <div class="text-muted mt-2 ms-3">
                      <p class="m-0">Comentar como <b>{{ Auth::user()->name }}</b></p>
                  </div>
                  <div class="card-body pt-0">
                      <form action="{{ route('commentsHomework.store', $homework) }}" method="POST">
                          @csrf

                          @if (isset($comment->id))
                              <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                          @endif

                          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                          <textarea class="form-control mb-2 " name="body" id="body" rows="4" required></textarea>
                          <div class="row">
                              <div class="col-7">
                                  <p class="mt-2 ">
                                      <a class="link" data-bs-toggle="collapse" href="#collapseExample"
                                          role="button" aria-expanded="false" aria-controls="collapseExample">
                                          Comentarios <span>{{ $count }}</span> <span><svg xmlns="http://www.w3.org/2000/svg" width="13"
                                                  height="13" fill="currentColor" class="bi bi-box-arrow-down-right"
                                                  viewBox="0 0 16 16">
                                                  <path fill-rule="evenodd"
                                                      d="M8.636 12.5a.5.5 0 0 1-.5.5H1.5A1.5 1.5 0 0 1 0 11.5v-10A1.5 1.5 0 0 1 1.5 0h10A1.5 1.5 0 0 1 13 1.5v6.636a.5.5 0 0 1-1 0V1.5a.5.5 0 0 0-.5-.5h-10a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h6.636a.5.5 0 0 1 .5.5z" />
                                                  <path fill-rule="evenodd"
                                                      d="M16 15.5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1 0-1h3.793L6.146 6.854a.5.5 0 1 1 .708-.708L15 14.293V10.5a.5.5 0 0 1 1 0v5z" />
                                              </svg></span>
                                      </a>
                                  </p>
                              </div>
                              <div class="text-end col-5">
                                  <input class="btn " type="submit" value="Comentar" id="btn_color">
                              </div>
                      </form>
                  </div>
                  <div class="collapse" id="collapseExample">
                      @include('comments.list_2', ['comments' => $homework->comments])
                  </div>
              </div>
          </div>
      </div>            
  </section>
  
        <section class="container mb-2 d-none d-lg-block">
          <div id="color"></div>
          <div class="row justify-content-center">
            <div class="col-md-12 col-lg-9">
              <div class="card border-dark">
                <div class="card-body fs-4">
                  <h2 class="card-title fs-1">{{ $homework->title }}</h2>
                  <p class="card-text m-0">
                    {{ $homework->body }}
                  </p>
                  @if ($homework->image)
                    <div class="mb-3 mt-2 d-flex justify-content-center card-img-top" id="image_container">
                      <a href="../storage/homeworks/{{ $homework->image }}" target="_blank"><img src="../storage/homeworks/{{ $homework->image }}" class="d-flex justify-content-center" id="image"><br></a>
                    </div>
                    @endif
                    @if($homework->file)
                      <a href="../storage/homeworks/{{ $homework->file }}" target="_blank" class="mb-3 mt-3 fs-4">{{ $homework->file }}</a>
                    @endif
                  <p class="text-muted mb-0">
                      <strong>
                        Materia: {{ $homework->course }} <br>
                      </strong>
                    Turno: {{ $homework->turn }} <br>
                      Grupo: {{ $homework->grade }}-{{ $homework->group }}
                      Fecha de entrega: {{ date('j F, Y', strtotime($homework->date))}}
                  </p>
                  @if($exist == false)
                  <section class="container mt-4 mb-4 d-none d-lg-block">
                    <div class="row justify-content-center">
                      <div class="col-12 col-md-12">
                          <div class="card mb-4 border-2 border-dark">
                              <div class="card-body">
                                <div class="card-body">
                                  <div class="row">
                                    <h3 class="card-title text-center fw-bold col-10 mb-4">Tarea enviada</h3>
                                    <div class="col-2 text-end">
                                      <a class="dropdown "id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <img
                                        src="{{ asset('images/options-icon.png') }}"
                                        alt="Opciones"/>           
                                      </a>
                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @livewire('confirm-alert-home-sen', ['homework_senId' => $complete->id])
                                      </div>
                                    </div>
                                  </div>
                                  <h3 class="card-title fs-3 fw-bold">{{ $complete->title }}</h3>
                                  <p class="card-text fs-3 mb-0">{{ $complete->body }}</p>
                                  @if($complete->file)
                                    <a href="../storage/homeworks_send/{{ $complete->file }}" target="_blank">{{ $complete->file }}</a>
                                  @endif
                                  @if ($complete->image)
                                  <div class="mb-3 mt-2 ">
                                    <a href="../storage/homeworks_send/{{ $complete->image }}" target="_blank">{{ $complete->image }}</a><br>
                                  </div>
                                  @endif
                              </div>
                          </div>
                      </div>
                  </div>
                  </section>
                  @endif
                  @if ($exist == true)
                  <div class="mt-3">
                    <a href="{{ route('create', $homework )}}" class="btn-lg fs-4 col-2" id="btn_color">Subir</a>
                  </div>
                  @elseif($exist == false)
                  <div class="mt-3">
                    <a href="{{ route('homeworks.edit', $homework )}}" class="btn-lg fs-4 col-2" id="btn_color">Actualizar</a>
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="container d-none d-lg-block">
          <div class="d-flex justify-content-center">
              <div class="col-md-12 col-lg-9 mt-2 mb-3 p-0">
                  <div class="card">
                      <div class="text-muted mt-2 ms-3 fs-5">
                          <p class="m-0">Comentar como <b>{{ Auth::user()->name }}</b></p>
                      </div>
                      <div class="card-body pt-0 fs-4">
                          <form action="{{ route('commentsHomework.store', $homework) }}" method="POST">
                              @csrf
  
                              @if (isset($comment->id))
                                  <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                              @endif
  
                              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
  
                              <textarea class="form-control mb-2 fs-4" name="body" id="body" rows="4" required></textarea>
                              <div class="row">
                                  <div class="col-6">
                                      <p class="mt-2 fs-4">
                                          <a class="link" data-bs-toggle="collapse" href="#collapseExample"
                                              role="button" aria-expanded="false" aria-controls="collapseExample">
                                              Comentarios <span>{{ $count }}</span> <span><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                      height="16" fill="currentColor" class="bi bi-box-arrow-down-right"
                                                      viewBox="0 0 16 16">
                                                      <path fill-rule="evenodd"
                                                          d="M8.636 12.5a.5.5 0 0 1-.5.5H1.5A1.5 1.5 0 0 1 0 11.5v-10A1.5 1.5 0 0 1 1.5 0h10A1.5 1.5 0 0 1 13 1.5v6.636a.5.5 0 0 1-1 0V1.5a.5.5 0 0 0-.5-.5h-10a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h6.636a.5.5 0 0 1 .5.5z" />
                                                      <path fill-rule="evenodd"
                                                          d="M16 15.5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1 0-1h3.793L6.146 6.854a.5.5 0 1 1 .708-.708L15 14.293V10.5a.5.5 0 0 1 1 0v5z" />
                                                  </svg></span>
                                          </a>
                                      </p>
                                  </div>
                                  <div class="text-end col-6">
                                      <input class="btn fs-4" type="submit" value="Comentar" id="btn_color">
                                  </div>
                          </form>
                      </div>
                      <div class="collapse" id="collapseExample">
                          @include('comments.list_2', ['comments' => $homework->comments])
                          
                          {{-- @foreach ($comments as $comment)
                              <div class="card card-body mb-3">
                                  <div class="col-12">
                                      <div class="row">
                                          <div class="col-1" id="img-card_bottom">
                                              @if (Auth::user()->image)
                                                  <img src="../../storage/images_users/{{ Auth::user()->image }}"
                                                      class="rounded-circle" id="img-user">
                                              @else
                                                  <img src="{{ asset('images/user-profile.png') }}"
                                                      class="rounded-circle" id="img-user">
                                              @endif
                                          </div>
                                          <div class="col-6 ms-2 lh-1 pe-0">
                                              <p class="fw-bold m-0 mt-2 fs-4">{{ $comment->user->name }}</p>
                                              <p class="text-muted fs-5">
                                                  {{ $comment->created_at->format('d M Y') }}
                                              </p>
                                          </div>
                                      </div>
                                      <p class="m-0">{{ $comment->body }}</p>
                                      <div class="mb-3 mt-1">
                                          <p class="mb-2">
                                              <a class="btn btn-outline-secondary fs-4 " data-bs-toggle="collapse"
                                                  href="#collapseExample{{ $i }}" role="button"
                                                  aria-expanded="false" aria-controls="collapseExample">
                                                  Responder
                                              </a>
                                          </p>
                                          <div class="collapse" id="collapseExample{{ $i }}">
                                              <div>
                                                  <form action="{{ route('commentsHomework.store', $post) }}" method="POST">
                                                      @csrf
  
                                                      @if (isset($comment->id))
                                                          <input type="hidden" name="parent_id"
                                                              value="{{ $comment->id }}">
                                                      @endif
  
                                                      <input type="hidden" name="user_id"
                                                          value="{{ Auth::user()->id }}">
  
                                                      <textarea class="form-control fs-4 mt-2" name="body" id="body" rows="3"></textarea>
                                                      <div class="text-end mt-2">
                                                          <input class="btn fs-4" type="submit" value="Comentar"
                                                              id="btn-color">
                                                      </div>
                                                  </form>
                                              </div>
                                          </div>
                                          @if ($comment->replies)
                                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A eveniet eum tempora, unde laboriosam, quidem error quisquam quo mollitia veritatis ea deserunt. Architecto, praesentium! Magnam harum tempora corporis officiis doloribus!</p>
                                          @endif
                                      </div>
                                  </div>
                              </div>
                              @php
                                  $i++;
                              @endphp
                          @endforeach --}}
                      </div>
                  </div>
              </div>
              </div>
          </div>            
      </section>

      </main>
  
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"
      ></script>
</body>
</html>