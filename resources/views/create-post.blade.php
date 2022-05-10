<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRAL101</title>
    <link rel="stylesheet" href="{{ asset('css/create-post.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
        <section class="container mt-3 mb-3 col-12 d-lg-none">
            <div class="card border-dark">
                {{-- <div class="card-header fw-bold">Nuevo</div> --}}
                <div class="card-body">
                    <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="fw-bold">Titulo *</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="fw-bold">Contenido *</label>
                            <textarea name="body" rows="4" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="fw-bold" for="">Turno</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="turn" id="check1"
                                    value="matutino">
                                <label class="form-check-label" for="check1">Matutino</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="turn" id="check2"
                                    value="vespertino">
                                <label class="form-check-label" for="check2">Vespertino</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="fw-bold" for="">Asunto *</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="theme" id="check3" value="aviso">
                                <label class="form-check-label" for="check3">Aviso</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="theme" id="check4"
                                    value="extraordinario">
                                <label class="form-check-label" for="check4">Extraordinarios</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="theme" id="check6" value="evento">
                                <label class="form-check-label" for="check6">Evento</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="theme" id="check7"
                                    value="horario">
                                <label class="form-check-label" for="check7">Horario</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="fw-bold" for="">Grupo *</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="group" id="check14" value="a">
                                <label class="form-check-label" for="check14">A</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="group" id="check15" value="b">
                                <label class="form-check-label" for="check15">B</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="group" id="check16" value="c">
                                <label class="form-check-label" for="check16">C</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="group" id="check17" value="d">
                                <label class="form-check-label" for="check17">D</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="fw-bold" for="">Grado *</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="grade" id="check8" value="1">
                                <label class="form-check-label" for="check8">1er semestre</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="grade" id="check9" value="2">
                                <label class="form-check-label" for="check9">2er semestre</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="grade" id="check10" value="3">
                                <label class="form-check-label" for="check10">3er semestre</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="grade" id="check11" value="4">
                                <label class="form-check-label" for="check11">4to semestre</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="grade" id="check12" value="5">
                                <label class="form-check-label" for="check12">5to semestre</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="grade" id="check13" value="6">
                                <label class="form-check-label" for="check13">6to semestre</label>
                            </div>
                        </div>
                        <div class="container-input mt-2">
                            <input type="file" name="file" id="file-3" class="inputfile inputfile-1"
                                data-multiple-caption="{count} archivos seleccionados" multiple />
                            <label for="file-3" class="p-0">
                                <img src="{{ asset('images/file.png') }}">
                                <span class="iborrainputfile">Seleccionar archivo</span>
                            </label>
                        </div>
                        <div class="container-input ">
                            <input type="file" name="image" id="file-4" accept="image/*" class="inputfile inputfile-1"
                                data-multiple-caption="{count} archivos seleccionados" multiple />
                            <label for="file-4" class="p-0">
                                <img src="{{ asset('images/image.png') }}">
                                <span>Seleccionar imagen</span>
                            </label>
                        </div>
                        <div class="mt-2 text-end">
                            @csrf
                            <input type="submit" value="Crear" class="btn fs-3" id="btn-color">
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="container mb-4 col-9 d-none d-lg-block">
            <div id="color"></div>
            <div class="card mb-3 border border-dark border-2 rounded ">
                {{-- <div class="card-header fw-bold fs-3">
              <div class="row">
                <div class="col-10 ms-2">
                    Crear nuevo
                </div>
                <div class="col-1 text-end ms-5">
                    <a class="btn btn-close fs-4" href="javascript: history.go(-1)"></a>
                </div>
            </div>
            </div> --}}
                <div class="card-body">
                    <form class="fs-3" action="{{ route('home.store') }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="fs-3 fw-bold">Titulo *</label>
                            <input type="text" name="title" class="form-control fs-3" required>
                        </div>
                        <div class="form-group">
                            <label class="fs-3 fw-bold">Contenido *</label>
                            <textarea name="body" rows="4" class="form-control fs-3"  ></textarea>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="fs-3 fw-bold" for="">Turno *</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="turn" id="check1"
                                            value="matutino">
                                        <label class="form-check-label" for="check1">Matutino</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="turn" id="check2"
                                            value="vespertino">
                                        <label class="form-check-label" for="check2">Vespertino</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="fs-3 fw-bold" for="">Asunto *</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="theme" id="check3"
                                            value="aviso">
                                        <label class="form-check-label " for="check3">Aviso</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="theme" id="check4"
                                            value="extraordinario">
                                        <label class="form-check-label" for="check4">Extraordinarios</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="theme" id="check6"
                                            value="evento">
                                        <label class="form-check-label" for="check6">Evento</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="theme" id="check7"
                                            value="horario">
                                        <label class="form-check-label" for="check7">Horario</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="fs-3 fw-bold" for="">Grupo *</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="group" id="check14"
                                            value="a">
                                        <label class="form-check-label" for="check14">A</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="group" id="check15"
                                            value="b">
                                        <label class="form-check-label" for="check15">B</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="group" id="check16"
                                            value="c">
                                        <label class="form-check-label" for="check16">C</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="group" id="check17"
                                            value="d">
                                        <label class="form-check-label" for="check17">D</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="fs-3 fw-bold">Grado *</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="grade" id="check8"
                                            value="1">
                                        <label class="form-check-label" for="check8">1er semestre</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="grade" id="check9"
                                            value="2">
                                        <label class="form-check-label" for="check9">2er semestre</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="grade" id="check10"
                                            value="3">
                                        <label class="form-check-label" for="check10">3er semestre</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="grade" id="check11"
                                            value="4">
                                        <label class="form-check-label" for="check11">4to semestre</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="grade" id="check12"
                                            value="5">
                                        <label class="form-check-label" for="check12">5to semestre</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="grade" id="check13"
                                            value="6">
                                        <label class="form-check-label" for="check13">6to semestre</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-input mt-2">
                            <input type="file" name="file" id="file-1" class="inputfile inputfile-1"
                                data-multiple-caption="{count} archivos seleccionados" multiple />
                            <label for="file-1" class="p-0">
                                <img src="{{ asset('images/file.png') }}">
                                <span class="iborrainputfile">Seleccionar archivo</span>
                            </label>
                        </div>
                        <div class="container-input ">
                            <input type="file" name="image" id="file-2" accept="image/*" class="inputfile inputfile-1"
                                data-multiple-caption="{count} archivos seleccionados" multiple />
                            <label for="file-2" class="p-0">
                                <img src="{{ asset('images/image.png') }}">
                                <span>Seleccionar imagen</span>
                            </label>
                        </div>
                        <div class="mt-2 text-end">
                            @csrf
                            <input type="submit" value="Crear" class="btn fs-3" id="btn-color">
                        </div>
                </div>
                </form>
            </div>
            </div>
        </section>

    </main>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script> --}}

    {{-- <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        'use strict';

        ;
        (function(document, window, index) {
            var inputs = document.querySelectorAll('.inputfile');
            Array.prototype.forEach.call(inputs, function(input) {
                var label = input.nextElementSibling,
                    labelVal = label.innerHTML;

                input.addEventListener('change', function(e) {
                    var fileName = '';
                    if (this.files && this.files.length > 1)
                        fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}',
                            this.files.length);
                    else
                        fileName = e.target.value.split('\\').pop();

                    if (fileName)
                        label.querySelector('span').innerHTML = fileName;
                    else
                        label.innerHTML = labelVal;
                });
            });
        }(document, window, 0));
    </script>
</body>

</html>
