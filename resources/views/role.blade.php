{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRAL101</title>
    <link href="{{ asset('css/type_user.css') }}" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yatra+One&display=swap" rel="stylesheet">
</head>
<body>
    <header class="pt-0 pb-2">
        <section class="text-center">
            <a class="btn" href="{{ url('/') }}"><span><img id="logo-remaster" src="{{ asset('images/Logo-Cral.png') }}" alt=""></span></a>
        </section>
    </header>
    <main id="main-section">
        <section>
            <div class="card col-10 col-md-7 col-lg-6 border-dark mt-5 m-auto p-0" id="main-card">
                <div class="card-header text-center fw-bold fs-5">
                    <div class="row justify-content-center">
                        <div class="col-12 ms-2">
                            {{ __('Regístrate') }}
                        </div>
                    </div>
                    
                </div>
                    <div class="card-body text-dark">
                        <div class="d-grid gap-2 col-11 col-lg-9 mx-auto">
                            <a href="{{ route('register') }}" id="btn-color" class="btn btn-outline-light mb-3 mt-3" type="button">Profesor</a>
                            <a href="{{ route('dir.index') }}" id="btn-color" class="btn btn-outline-light mb-3" type="button">Administración</a>
                            <a href="{{ route('user.index') }}" id="btn-color" class="btn btn-outline-light mb-3" type="button">Alumno</a>
                        </div>
                            <p class="mt-3 text-center">¿Ya tienes cuenta?
                                <a href="{{ route('login')}}">Iniciar sesión</a>
                            </p>
                    </div>
            </div>
        </section>
    </main>
    <footer id="footer" class="pt-4 mt-2 pb-4 col-12 d-md-none ">
        <section class="container">
            <div class="row text-center">
                <div class="col-12 pt-1 ps-1 p-0">
                    <img class="p-0 pb-2" src="{{asset('images/Logo-Cral.png')}}" style="height:50px; width:120px;" alt="">
                </div>
                <div class="col-12 col-lg pe-0">
                    <a href="mailto:jaciel@cral101.com">Contáctanos</a>
                </div>
            </div>
        </section> 
        <section class="text-center fs-6 text-muted">
            <hr>
            <p class="m-0">© 2022 CRAL101. Todos los derechos reservados.</p>
        </section>
    </footer>

    <footer id="footer" class="pt-4 pb-4 col-12 d-none d-md-block position-absolute bottom-0">
        <section class="container">
            <div class="row text-center">
                <div class="col-12 col-lg">
                    <img class="p-0 pb-2" src="{{asset('images/Logo-Cral.png')}}" style="height:45px; width:120px;" alt="">
                </div>
                <div class="col-12 col-lg pe-0 fs-5">
                    <a href="mailto:jaciel@cral101.com">Contáctanos</a>
                </div>
            </div>
        </section>
        <hr>
         <section class="text-center fs-6 text-muted">
             <p class="m-0">© 2022 CRAL101. Todos los derechos reservados.</p>
         </section>
    </footer>
    {{-- @endsection --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>