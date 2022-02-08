<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRAL101</title>
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yatra+One&display=swap" rel="stylesheet">
</head>
<body>
    <header class="d-md-none">
        <nav id="header-container">
                <div class="container" id="nav-container">
                    <div class="row justify-content-center text-end" id="nav-text">
                        <div class="col-1 p-0">
                            {{-- <p class="btn text-white p-0 fs-5" id="logo" class="text-white">CRAL101</p> --}}
                            <span><img class="p-0 pb-2" src="{{asset('images/Logo-Cral.png')}}" style="height:50px; width:120px;" alt=""></span>
                        </div>
                        <div class="col-6 col-md-3 ms-5">
                            <a class="btn text-white p-0 pt-2" href="{{ route('login') }}">Iniciar sesión</a>
                        </div>
                        <div class="col-3 ps-0">
                            <a class="btn text-white p-0 pt-2" href="{{ route('role') }}">Regístrate</a>
                        </div>
                    </div>
                    <div class="text-center text-white fw-bold mt-5 pt-2 sticky-top">
                        <p class="mt-5">Toda tu información académica <br> en un solo lugar</p>
                        <a href="#info-button" class="btn btn-outline-light shadow-lg">Más Información</a>
                    </div>
                </div>
            <div class="row">
                <div>
                    <img class="col-12" src="{{asset('images/banner1.jfif')}}" alt="">
                </div>
            </div> 
        </div>
        </nav>
    </header>

    {{-- <header class="d-none d-md-block d-lg-none">
        <nav id="header-container">
                <div class="container" id="nav-container">
                    <div class="row justify-content-center text-end" id="nav-text">
                        <div class="col-5 pt-1  text-start">
                            {{-- <p class="btn text-white p-0 fs-2" id="logo" class="text-white">CRAL101</p>
                            <span><img class="col-6" src="{{asset('images/Logo-Cral.png')}}" alt=""></span>
                        </div>
                        <div class="col-5 ms-5" >
                            <a class="btn text-white p-0 pt-4"  href="{{ route('login') }}">Iniciar sesión</a>
                        </div>
                        <div class="col-1 ps-0">
                            <a class="btn text-white p-0 pt-4" href="{{ route('role') }}">Regístrate</a>
                        </div>
                    </div>
                    <div class="row text-center fs-4">
                        <div class="text-white fw-bold mt-5 pt-2">
                            <p class="mt-5">Toda tu información académica <br> en un solo lugar</p>
                            <a href="#info-button" class="btn btn-outline-light shadow-lg fs-5">Más Información</a>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div>
                    <img class="col-12" src="{{asset('images/banner1.jfif')}}" alt="">
                </div>
            </div>
        </div>
        </nav>
    </header> --}}

    <header class="d-none d-md-block">
        <nav id="header-container-lg" class="pb-2">
            <div class="container" id="">
                <div class="row justify-content-center text-end">
                    <div class="col-4 text-start">
                        {{--<p class="btn text-white p-0 " id="logo-lg" class="text-white">CRAL101</p>--}}
                        <span><img class="col-4 p-0" src="{{asset('images/Logo-Cral.png')}}" alt=""></span> 

                    </div>
                    <div class="col-5 ms-5">
                        <a class="btn text-white p-0 fs-1 pt-4" id="scale" href="{{ route('login') }}">Iniciar sesión</a>
                    </div>
                    <div class="col-1 ps-0">
                        <a class="btn text-white p-0 fs-1 ms-5 pt-4" id="scale" href="{{ route('role') }}">Regístrate</a>
                    </div>
                </div>
            </div>
        </nav>
                {{--<div class="row text-end mt-5 fs-1" id="">
                    <div class="text-white fw-bold mt-5 pt-2">
                        <p class="mt-5 pt-5 fs-1" id="slogan">Toda tu información académica <br> en un solo lugar</p>
                        <a href="#info-button" class="btn btn-outline-light shadow-lg fs-2">Más Información</a> -->
                    </div>
                </div> --}}
            {{-- <div class="p-0">
                <img class="col-12" src="{{asset('images/banner1.2.jfif')}}" alt="">
            </div> --}}
    </header>

    <main class="p-0 m-0">
        <section class="d-none d-md-block">
            <div class="text-white" id="brand-container">
                <p>Toda tu información academica <br> en un solo lugar</p>
            </div>
        </section>
        <section id="section-carousel" class="pt-1 d-none d-md-block">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img id="banner" src="{{ asset('images/3.2.jpg') }}" class="d-block w-100 rounded" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="m-0 p-0 ">
                            {{-- <h1 class="text-dark fw-bold shadow-lg">Toda tu información académica <br> en un solo lugar</h1> --}}
                        </div>
                      {{-- <a class="btn btn-outline-dark fw-bold">Mas información</a> --}}
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img id="banner" src="{{ asset('images/1.2.jpg') }}" class="d-block w-100 rounded" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        {{-- <h1 class="text-dark fw-bold shadow-lg">Toda tu información académica <br> en un solo lugar</h1> --}}
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img id="banner" src="{{ asset('images/4.2.jpg') }}" class="d-block w-100 rounded" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        {{-- <h1 class="text-dark fw-bold shadow-lg">Toda tu información académica <br> en un solo lugar</h1> --}}
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <section class="d-md-none mt-4 mb-4" id="section-info">
            <div class="row">
                <div class="container">
                    <div class="row justify-content-center p-0">
                        <h4 class="text-white mt-5 text-center" id="info-button">Funciones <br> para alumnos</h4>
                        <div class="card mt-2 mb-3 col-10 rounded" id="section-card">
                            <div>
                                <img src="{{asset('images/card-icon-white.png')}}" alt="">
                            </div>
                            <div class="card-body text-white p-0 pt-2 ps-1">
                                <h5 class="">Información general</h5>
                                <p class="text-muted">Apartado donde podrás recibir los avisos y noticias generales por parte del plantel, además de contar con funciones para ordenarlos y acceder a ellas mas fácilmente.</p>
                            </div>
                        </div>
                        <div class="card mt-2 mb-3 col-10 rounded" id="section-card">
                            <div>
                                <img src="{{asset('images/card-icon-white.png')}}" alt="">
                            </div>
                            <div class="card-body text-white p-0 pt-2 ps-1">
                                <h5 class="">Historial de calificaciones</h5>
                                <p class="text-muted">Podrás ver tus calificaciones por parciales y de semestres anteriores.</p>
                            </div>
                        </div>
                        <div class="card mt-2 mb-3 col-10 rounded" id="section-card">
                            <div>
                                <img src="{{asset('images/card-icon-white.png')}}" alt="">
                            </div>
                            <div class="card-body text-white p-0 pt-2 ps-1">
                                <h5 class="">Tareas</h5>
                                <p class="text-muted">Podrás ver y enviar los tareas que asigne el profesor.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center ">
                        <a class="btn btn-outline-light col-9 mb-3" id="" href="{{ route('user.index') }}">Registrarse como alumno</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="d-none d-md-block mt-3 mb-4" id="section-info">
                <div class="container">
                    <div class="row justify-content-center p-0 fs-3">
                        <h2 class="text-white mt-3 text-center fs-1 p-0">Funciones <br> para alumnos</h2>
                        <div class="card mt-2 mb-3 me-4 col-5 rounded" id="section-card">
                            <div>
                                <img src="{{asset('images/card-icon.png')}}" alt="">
                            </div>
                            <div class="card-body text-dark p-0 pt-2 ps-1 " >
                                <h2 class="text-white">Información general</h2>
                                <p class="text-muted text-white">Apartado donde podrás recibir los avisos y noticias generales por parte del plantel, además de contar con funciones para ordenarlos y acceder a ellas mas fácilmente.</p>
                            </div>
                        </div>
                        <div class="card mt-2 mb-3 col-5 rounded" id="section-card">
                            <div>
                                <img src="{{asset('images/card-icon.png')}}" alt="">
                            </div>
                            <div class="card-body text-dark p-0 pt-2 ps-1">
                                <h2 class="text-white">Historial de calificaciones</h2>
                                <p class="text-muted text-white">Podrás ver tus calificaciones por parciales y de semestres anteriores.</p>
                            </div>
                        </div>
                        <div class="card mt-2 mb-3 col-5 rounded" id="section-card">
                            <div>
                                <img src="{{asset('images/card-icon.png')}}" alt="">
                            </div>
                            <div class="card-body text-dark p-0 pt-2 ps-1">
                                <h2 class="text-white">Tareas</h2>
                                <p class="text-muted">Podrás ver y enviar los tareas que asigne el profesor.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <a class="btn btn-outline-light col-2 mb-3 fs-3 p-2" id="" href="{{ route('user.index') }}">Registrarse como alumno</a>
                    </div>
                </div>
        </section>

        <section class="d-md-none mb-4" id="section-info-2">
            <!-- <div class="row"> -->
                <div class="container">
                    <div class="row justify-content-center">
                        <h4 class="mt-3 text-center text-white">Funciones <br> para profesores</h4>
                        <div class="card mt-2 mb-3 col-10 rounded" id="section-card-2">
                            <div>
                                <img src="{{asset('images/card-icon.png')}}" alt="">
                            </div>
                            <div class="card-body p-0 pt-2 ps-1">
                                <h5 class="text-white">Información general</h5>
                                <p class="text-muted">Podrá subir avisos de manera más organizada eligiendo cual grupo desea que lo vea.</p>
                            </div>
                        </div>
                        <div class="card mt-2 mb-3 col-10 rounded" id="section-card-2">
                            <div>
                                <img src="{{asset('images/card-icon.png')}}" alt="">
                            </div>
                            <div class="card-body p-0 pt-2 ps-1">
                                <h5 class="text-white">Historial de calificaciones</h5>
                                <p class="text-muted">Apartado donde podrá calcular el promedio automáticamente al ingresar la calificación de cada actividad.</p>
                            </div>
                        </div>
                        <div class="card mt-2 mb-3 col-10 rounded" id="section-card-2">
                            <div>
                                <img src="{{asset('images/card-icon.png')}}" alt="">
                            </div>
                            <div class="card-body p-0 pt-2 ps-1">
                                <h5 class="text-white">Tareas</h5>
                                <p class="text-muted">Podrá subir y recibir las tareas de sus grupos.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center ">
                        <a class="btn btn-outline-light col-9 mb-3" id="" href="{{ route('register') }}">Registrarse como profesor</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="d-none d-md-block mb-4" id="section-info-2">
            <!-- <div class="row"> -->
                <div class="container">
                    <div class="row justify-content-center fs-3">
                        <h4 class="mt-3 text-center fs-1 text-white">Funciones <br> para profesores</h4>
                        <div class="card mt-2 mb-3 me-5 col-5 rounded" id="section-card-2">
                            <div>
                                <img src="{{asset('images/card-icon.png')}}" alt="">
                            </div>
                            <div class="card-body p-0 pt-2 ps-1">
                                <h2 class="text-white">Información general</h2>
                                <p class="text-muted">Podrá subir avisos de manera más organizada eligiendo cual grupo desea que lo vea.</p>
                            </div>
                        </div>
                        <div class="card mt-2 mb-3 col-5 rounded" id="section-card-2">
                            <div>
                                <img src="{{asset('images/card-icon.png')}}" alt="">
                            </div>
                            <div class="card-body p-0 pt-2 ps-1">
                                <h2 class="text-white">Historial de calificaciones</h2>
                                <p class="text-muted">Apartado donde podrá calcular el promedio automáticamente al ingresar la calificación de cada actividad.</p>
                            </div>
                        </div>
                        <div class="card mt-2 mb-3 col-5 rounded" id="section-card-2">
                            <div>
                                <img src="{{asset('images/card-icon.png')}}" alt="">
                            </div>
                            <div class="card-body p-0 pt-2 ps-1">
                                <h2 class="text-white">Tareas</h2>
                                <p class="text-muted">Podrá subir y recibir las tareas de sus grupos.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center ">
                        <a class="btn btn-outline-light mb-3 col-2 fs-3 p-2" id="" href="{{ route('register') }}">Registrarse como profesor</a>
                    </div>
                </div>
        </section>
    </main>
    
    <footer id="footer" class="pt-4 pb-4 col-12 d-md-none">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 pt-1 ps-1 p-0">
                    <p class="btn text-white p-0 fs-5" id="logo" class="text-white">CRAL101</p>
                </div>
                <div class="col-12 col-lg pe-0">
                    <a href="#">Contactanos</a>
                </div>
                <div class="col-12 col-lg pe-0">
                    <a href="#">Preguntas frecuentes</a>
                </div>
            </div>
        </div> 
    </footer>

    <footer id="footer" class="pt-4 pb-4 col-12 d-none d-md-block ">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 col-lg">
                    <p class="p-0" id="logo-lg">CRAL101 </p>
                </div>
                <div class="col-12 col-lg pe-0">
                    <a href="#">Contactanos</a>
                </div>
                <div class="col-12 col-lg pe-0">
                    <a href="#">Preguntas frecuentes</a>
                </div>
            </div>
        </div> 
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>