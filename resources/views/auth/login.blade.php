{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<!DOCTYPE html>
<html lang="es" class="" >
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
<body class="">
    <header class="pt-3 pb-2">
        <section class="text-center">
            <a class="btn" href="{{ url('/') }}"><h1>CRAL101</h1></a>
        </section>
    </header>

    <section class="container container col-11 col-md-8 col-xl-6 mx-auto rounded-3 mt-4" id="main-section">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" id="main-card">
                    <div class="card-header text-center fw-bold fs-5">
                        <div class="row justify-content-center">
                            <div class="col-10 ms-2">
                                {{ __('Iniciar sesión') }}
                            </div>
                            <div class="col-1 text-end">
                                <a class="btn btn-close fs-5" href="javascript: history.go(-1)"></a>
                            </div>
                        </div>
                    </div>
                    
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="">
                                <label for="email" class="form-label mb-0"><span><img src="{{asset('images/man-user.png')}}"></span>{{ __('Correo electrónico') }}</label>
    
                                <div class="">
                                    <input id="email" type="email" class="form-control p-0 border-top-0 border-start-0 border-end-0 rounded-0 border-bottom border-2 border-dark @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
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
                                    <input id="password" type="password" class="form-control p-0 border-top-0 border-start-0 border-end-0 rounded-0 border-bottom border-2 border-dark @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="">
                                <div class="">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Recuerdame') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="d-grid col-11 mx-auto mt-4">
                                    <button type="submit" class="btn btn-outline-light" id="btn-color">
                                        {{ __('Iniciar sesión') }}
                                    </button>
    
                                    @if (Route::has('password.request'))
                                        <a class="text-center" href="{{ route('password.request') }}">
                                            {{ __('¿Olvidaste tu contraseña?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <p class="mt-3 text-center">¿No tienes cuenta?
                            <a href="{{ route('role') }}">Registrate</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer" class="pt-4 pb-4 col-12 d-lg-none mt-4">
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

    <footer id="footer" class="pt-4 pb-4 col-12 d-none d-lg-block mt-3  position-absolute bottom-0">
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
    {{-- @endsection --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>
