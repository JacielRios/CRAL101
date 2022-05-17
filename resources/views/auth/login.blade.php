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
    <header class="pt-0 pb-2">
        <section class="text-center">
            <a class="btn" href="{{ url('/') }}"><span><img id="logo-remaster" src="{{ asset('images/Logo-Cral.png') }}" alt=""></span></a>
        </section>
    </header>
    <div class="container d-md-none mt-2">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
          </svg>
          
          <div class="alert alert-primary d-flex align-items-center mb-2 p-2" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
            <p class="m-0">
              <strong>¡Atención!</strong> asegúrese de tener la última versión de Google Chrome
            </p>
          </div>
    </div>
    <div class="container col-7 mt-2 d-none d-md-block d-lg-none">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
          </svg>
          
          <div class="alert alert-primary d-flex align-items-center mb-2 p-2" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
            <p class="m-0">
              <strong>¡Atención!</strong> asegúrese de tener la última versión de Google Chrome
            </p>
          </div>
    </div>
    <div class="container col-5 mt-2 d-none d-lg-block">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
          </svg>
          
          <div class="alert alert-primary d-flex align-items-center mb-2 p-2" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
            <p class="m-0">
              <strong>¡Atención!</strong> asegúrese de tener la última versión de Google Chrome
            </p>
          </div>
    </div>
    <section class="container container col-11 col-md-8 col-xl-6 mx-auto rounded-3 mt-4" id="main-section">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" id="main-card">
                    <div class="card-header text-center fw-bold fs-5">
                        <div class="row justify-content-center">
                            <div class="col-12 ms-2">
                                {{ __('Iniciar sesión') }}
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
    
    <footer id="footer" class="pt-4 pb-4 col-12 d-md-none mt-4 ">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 pt-1 ps-1 p-0">
                    <p class="btn text-white p-0 fs-5" id="logo" class="text-white">CRAL101</p>
                </div>
                <div class="col-12 col-lg pe-0">
                    <a href="mailto:jaciel@cral101.com">Contactanos</a>
                </div>
            </div>
        </div> 
        <section class="text-center fs-6 text-muted">
            <hr>
            <p class="m-0">© 2022 CRAL101. Todos los derechos reservados.</p>
        </section>
    </footer>

    <footer id="footer" class="pt-4 pb-4 col-12 d-none d-md-block d-lg-none mt-3 ">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <p class="p-0 fs-3 text-center" id="logo-lg">CRAL101 </p>
                </div>
                <div class="col-12  fs-4 col-lg-12 pe-0">
                    <a class="" href="mailto:jaciel@cral101.com">Contactanos</a>
                </div>
                <div class="col-12 fs-4 col-lg-12 pe-0">
            </div>
        </div> 
        <section class="text-center fs-6 text-muted">
            <hr>
            <p class="m-0">© 2022 CRAL101. Todos los derechos reservados.</p>
        </section>
    </footer>
    <footer id="footer" class="pt-4 pb-4 col-12 d-none d-lg-block mt-3  ">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <p class="p-0 fs-3 text-center" id="logo-lg">CRAL101 </p>
                </div>
                <div class="col-12  fs-4 col-lg-12 pe-0">
                    <a class="" href="mailto:jaciel@cral101.com">Contactanos</a>
                </div>
            </div>
        </div> 
        <section class="text-center fs-6 text-muted">
            <hr>
            <p class="m-0">© 2022 CRAL101. Todos los derechos reservados.</p>
        </section>
    </footer>

    {{-- @endsection --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>
