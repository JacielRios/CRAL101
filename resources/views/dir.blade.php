<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRAL101</title>
    <link href="{{ asset('css/sign-up.css') }}" rel="stylesheet"> 
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
        <section class="container col-11 col-md-10 col-xl-6 mx-auto rounded-3 mt-2">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mt-1" id="main-card">
                        <div class="card-header text-center fw-bold fs-5">
                            <div class="row justify-content-center">
                                <div class="col-12 ms-2">
                                    {{ __('Regístrate') }}
                                </div>
                            </div>
                        </div>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('dir.store') }}">
                                @csrf
        
                                <div class="">
                                    <label for="name" class="form-label mb-0"><span><img src="{{asset('images/man-user.png')}}"></span>{{ __('Nombre de usuario') }}</label>
        
                                    <div class="">
                                        <input id="name" type="text" class="form-control p-0 border-top-0 border-start-0 border-end-0 rounded-0 border-bottom border-2 border-dark @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div>
                                    <label for="code" class="form-label mb-0 mt-2"><span><img src="{{asset('images/codep-icon.png')}}"></span>{{ __('Código') }}</label>
        
                                    <div class="">
                                        <input id="code" type="number" class="form-control p-0 border-top-0 border-start-0 border-end-0 rounded-0 border-bottom border-2 border-dark @error('code') is-invalid @enderror" name="code" required>
        
                                        @error('code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="">
                                    <label for="email" class="form-label mb-0 mt-2"><span><img src="{{asset('images/email-icon.png')}}"></span>{{ __('Correo electrónico') }}</label>
        
                                    <div class="">
                                        <input id="email" type="email" class="form-control p-0 border-top-0 border-start-0 border-end-0 rounded-0 border-bottom border-2 border-dark @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="">
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
                                    <label for="password_confirmation" class="form-label mb-0 mt-2"><span><img src="{{asset('images/pass-icon.png')}}"></span>{{ __('Confirmar contraseña') }}</label>
        
                                    <div class="">
                                        <input id="password_confirmation" type="password" class="form-control p-0 border-top-0 border-start-0 border-end-0 rounded-0 border-bottom border-2 border-dark" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="">
                                    <input type="hidden" class="form-control p-0 border-top-0 border-start-0 border-end-0 rounded-0 border-bottom border-2 border-dark" name="role" value="dir">
                                </div>
        
                                <div class="">
                                    <div class="d-grid col-11 mx-auto mt-4">
                                        <button type="submit" class="btn btn-outline-light" id="btn-color">
                                            {{ __('Crear cuenta') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <p class="mt-3 text-center">¿Ya tienes cuenta?
                                <a href="{{ route('login') }}">Iniciar sesión</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer id="footer" class="pt-4 pb-4 col-12 d-lg-none ">
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
    
        <footer id="footer" class="pt-4 pb-4 col-12 d-none d-lg-block mt-3 ">
            <div class="container">
                <div class="row text-center">
                    <div class="col-12">
                        <p class="p-0 fs-3 text-center" id="logo-lg">CRAL101 </p>
                    </div>
                    <div class="col-12  fs-4 col-lg-12 pe-0">
                        <a class="" href="#">Contactanos</a>
                    </div>
                    <div class="col-12 fs-4 col-lg-12 pe-0">
                        <a class="" href="#">Preguntas frecuentes</a>
                    </div>
                </div>
            </div> 
        </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>