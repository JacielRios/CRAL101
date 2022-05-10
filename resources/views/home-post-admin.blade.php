@extends('layouts.app')

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CRAL101</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    @if (auth()->user()->role == 'admin')
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand d-lg-none m-auto pb-3" href="#">
                        <img style="height: 50px; width:140px;" id="main-logo" class="ps-lg-5 ms-lg-5"
                            src="{{ asset('images/Logo-Cral.png') }}" alt="Logo CRAL101" />
                    </a>
                    <a class="navbar-brand d-none d-lg-block" href="#">
                        <img id="main-logo" class="ps-lg-5 ms-lg-5" src="{{ asset('images/Logo-Cral.png') }}"
                            alt="Logo CRAL101" />
                    </a>
                    <button class="navbar-toggler w-80" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-justify" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                            </svg></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active lg-ps-2" aria-current="page"
                                    href="{{ url('home-profesor/post') }}">Información general</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-lg-5" href="{{ route('homework.index') }}">Tareas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-lg-5" href="{{ url('calificaciones/admin') }}">Historial de
                                    calificaciones</a>
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
                                <a class="nav-link ps-lg-5 pe-lg-5"
                                    href="{{ url('profile-profesor/user') }}">Cuenta</a>
                            </li>
                            <li class="nav-item d-none d-lg-block">
                                <a class="nav-link dropdown ps-lg-5 pe-lg-5" id="navbarDropdown" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if (Auth::user()->image)
                                        <img src="../../storage/images_users/{{ Auth::user()->image }}"
                                            class="rounded-circle" id="img-user">
                                    @else
                                        <img class="rounded-circle" id="img-user"
                                            src="{{ asset('images/user-profile.png') }}" />
                                    @endif
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item"
                                            href="{{ url('profile-profesor/user') }}">Cuenta</a>
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
    @elseif(Auth::user()->role == 'dir')
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand d-lg-none m-auto pb-3" href="#">
                        <img id="main-logo" class="ps-lg-5 ms-lg-5" src="{{ asset('images/Logo-Cral.png') }}"
                            alt="Logo CRAL101" />
                    </a>
                    <a class="navbar-brand d-none d-lg-block" href="#">
                        <img id="main-logo" class="ps-lg-5 ms-lg-5" src="{{ asset('images/Logo-Cral.png') }}"
                            alt="Logo CRAL101" />
                    </a>
                    <button class="navbar-toggler w-80" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active lg-ps-2" aria-current="page"
                                    href="{{ url('home-profesor/post') }}">Información general</a>
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
                                <a class="nav-link ps-lg-5 pe-lg-5"
                                    href="{{ url('profile-profesor/user') }}">Cuenta</a>
                            </li>
                            <li class="nav-item d-none d-lg-block">
                                <a class="nav-link dropdown ps-lg-5 pe-lg-5" id="navbarDropdown" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if (Auth::user()->image)
                                        <img src="../../storage/images_users/{{ Auth::user()->image }}"
                                            class="rounded-circle" id="img-user">
                                    @else
                                        <img class="rounded-circle" id="img-user"
                                            src="{{ asset('images/user-profile.png') }}" />
                                    @endif
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item"
                                            href="{{ url('profile-profesor/user') }}">Cuenta</a>
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
    @endif
    <main>
      <section class="container mt-2 d-md-none">
        <div class="row justify-content-center">
          <div class="col-12 col-md-9">
            <div class="card border-dark">
              <div class="card-body pt-2 pb-2">
                <div class="row">
                  <div class="col-10 p-0">
                    <a class="btn text-end fw-bold p-0" >
                      <p class="m-0 text-start ">{{ $post->title }}</p>
                    </a>
                  </div>
                  <div class="col-2">
                      <a class="dropdown p-0"id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img
                        src="{{ asset('images/options-icon.png') }}"
                        alt="Opciones"/>            
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @livewire('confirm-alert-post', ['postId' => $post->id])
                    </div>
                  </div>
                </div>
              </div>
                    <div class="row">
                        <div class="col-11">
                          <p class="text-muted ps-2">
                            {{ $post->body }}
                          </p>
                          @if ($post->image)
                          <div class="mb-2 mt-1 ms-2" id="image_container-m">
                            <a href="../../storage/post/{{ $post->image }}" target="_blank"><img src="../../storage/post/{{ $post->image }}" class="" id="image"></a><br>
                          </div>
                          @endif
                          @if($post->file)
                            <div class="mb-2">
                              <a href="../../storage/post/{{ $post->file }}" target="_blank" class="ps-2">{{ $post->file }}</a>
                            </div>
                          @endif
                        </div>
                        <div class="col-12">
                          <div class="row">
                              <div class="col-2" id="img-card_bottom">
                                  @if ($post->user->image)
                                  <img src="{{ asset('images/user-profile.png') }}" class="rounded-circle ms-2" id="img-user">
                                  @else
                                  <img src="../../storage/images_users/{{ $post }}" class="rounded-circle" id="img-user">  
                                  @endif
                              </div>
                              <div class="col-6 ms-2 lh-1 pe-0">
                                  <p class="fw-bold m-0 mt-2 fs-6">{{ $post->user->name }}</p>
                                  <p class="text-muted">
                                      {{ $post->created_at->format('d M Y') }}
                                  </p>
                              </div>
                              <div class="col-3 mt-1">
                                  <a href="{{ route('home.edit', $post) }}" class="btn" id="btn-color">Editar</a>
                              </div>
                          </div>
                        </div>
                      </div>
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
                        <form action="{{ route('comments.store', $post) }}" method="POST">
                            @csrf

                            @if (isset($comment->id))
                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                            @endif

                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <textarea class="form-control mb-2 " name="body" id="body" rows="4"></textarea>
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
                                    <input class="btn " type="submit" value="Comentar" id="btn-color">
                                </div>
                        </form>
                    </div>
                    <div class="collapse" id="collapseExample">
                        @include('comments.list', ['comments' => $post->comments])            
                        
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
                                                <form action="{{ route('comments.store', $post) }}" method="POST">
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
    </section>

        <section class="container d-none d-lg-block">
            <div class="d-flex justify-content-center">
                <div class="col-md-7 col-lg-9 mt-3">
                    <div class="card" id="main-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <p class="fs-3 fw-bold" id="font-s">
                                        {{ $post->title }}
                                    </p>
                                </div>
                                <div class="col-4 text-end">
                                    <a class="ms-2 border-0" id="save-icon">
                                        <img id="save" src="{{ asset('images/save-icon-16px.png') }}" alt="Guardar" />
                                    </a>
                                    <a class="dropdown p-0 ms-4" id="navbarDropdown" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <img src="{{ asset('images/options-icon.png') }}" alt="Opciones" />
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @livewire('confirm-alert-post', ['postId' => $post->id])
                                    </div>
                                </div>
                                <div class="col-11">
                                    <p class="text-muted fs-4 m-0">
                                        {!! html_entity_decode($post->body) !!}
                                    </p>
                                    @if ($post->image)
                                        <div class="mb-3 mt-2 d-flex justify-content-center card-img-top"
                                            id="image_container">
                                            <a href="../../storage/post/{{ $post->image }}" target="_blank"><img
                                                    src="../../storage/post/{{ $post->image }}"
                                                    class="d-flex justify-content-center" id="image"><br></a>
                                        </div>
                                    @endif
                                    @if ($post->file)
                                        <a href="../../storage/post/{{ $post->file }}" target="_blank"
                                            class="fs-4 mb-3 mt-3">{{ $post->file }}</a>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-1" id="img-card_bottom">
                                            @if ($post->user->image)
                                                <img src="../../storage/images_users/{{ $post->user->image }}"
                                                    class="rounded-circle" id="img-user">
                                            @else
                                                <img src="{{ asset('images/user-profile.png') }}" class="rounded-circle"
                                                    id="img-user">
                                            @endif
                                        </div>
                                        <div class="col-6 ps-1 lh-1 pe-0">
                                            <p class="fw-bold m-0 mt-2 fs-4">{{ $post->user->name }}</p>
                                            <p class="text-muted fs-5">
                                                {{ $post->created_at->format('d M Y') }}
                                            </p>
                                        </div>
                                        <div class="col-3 mt-1 text-end">
                                            <a href="{{ route('home.edit', $post) }}" class="btn fs-3"
                                                id="btn-color">Editar</a>
                                        </div>
                                    </div>
                                    {{-- <div class="mt-3" >
                          <a class="btn fs-3" href="{{ route('home.show', $post) }}" id="comments" ><span class="pe-2"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-chat-left" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                          </svg></span>Comentarios</a>
                        </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container d-none d-lg-block">
            <div class="d-flex justify-content-center">
                <div class="col-md-7 col-lg-9 mb-3">
                    <div class="card">
                        <div class="text-muted mt-2 ms-3 fs-5">
                            <p class="m-0 fs-5">Comentar como <b>{{ Auth::user()->name }}</b></p>
                        </div>
                        <div class="card-body pt-0 fs-4">
                            <form action="{{ route('comments.store', $post) }}" method="POST">
                                @csrf
    
                                @if (isset($comment->id))
                                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                @endif
    
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    
                                <textarea class="form-control mb-2 fs-4" name="body" id="body" rows="4"></textarea>
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
                                        <input class="btn fs-4" type="submit" value="Comentar" id="btn-color">
                                    </div>
                            </form>
                        </div>
                        <div class="collapse" id="collapseExample">
                            @include('comments.list', ['comments' => $post->comments])            
                            
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
                                                    <form action="{{ route('comments.store', $post) }}" method="POST">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
