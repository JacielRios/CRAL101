<div>
    <section class="d-lg-none">
        <div class="card">
            <div class="card-header text-center pb-0">
              <span><img class="col-3 col-md-1" src="{{ asset('images/user-profile.png') }}" alt=""></span> <br>
              <p class="m-0 fw-bold">Jaciel Rios</p>
            </div>
            <div class="card-body pb-0" id="chat-container">
              @foreach($mensajes as $mensaje)
              <div>
                <div class="card col-8 p-0 float-right">
                  <div class="card-body p-2 bg-primary text-white">
                    <div class="">
                      <span>{{ $mensaje["usuario"] }} </span><br>
                      <p class="m-0">{{ $mensaje["mensaje"] }}</p> <br>
                      <span class="text-end">{{ $mensaje["fecha"] }}</span>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div id="input-container" class="mt-md-5">
              <input class="fs-3" type="hidden" value="{{ $usuario }}" wire:model="usuario" >
              <input class="" id="input" type="text" placeholder="Mensaje.." wire:model="mensaje"  wire:keydown.enter="enviarMensaje">
              <button class="float-right btn" wire:click="enviarMensaje"><img id="send-icon" class="pt-2 pe-1" src="{{ asset('images/enviar-mensaje.png') }}" alt=""></button> 
            </div>
        </div>
        <div class="alert alert-success collapse" role="alert" id="enviado"> 
          Se ha enviado
        </div>
        <script>
          window.livewire.on('mensajeEnviado', function () {
  
            $("#enviado").fadeIn("slow");
            setTimeout(function () { $("#enviado").fadeOut("slow"); }, 3000);
          });
        </script>
    </section>

    <section class="d-none d-lg-block col-7 mx-auto">
        <div class="card ">
          <div class="card-header text-center pb-0">
            <span><img class="col-1" src="{{ asset('images/user-profile.png') }}" alt=""></span> <br>
            @if (Auth::user()->role == 'admin')
            <p class="m-0 fs-1 fw-bold">Jaciel alumno</p>
            @elseif(Auth::user()->role == 'user')
            <p class="m-0 fs-1 fw-bold">Jaciel Rios</p>
            @elseif(Auth::user()->role == 'dir')
            <p class="m-0 fs-1 fw-bold">Jaciel alumno</p>
            @endif
          </div>

          <div class="card-body pb-0" id="chat-container"> 
            <div>
              @foreach($mensajes as $mensaje)
              @if($mensaje["recibido"])
              <div class="card col-7 p-0 float-left fs-3">
                <div class="card-body p-2 bg-secondary text-white">
                  {{-- <div class="lh-1 text-end">
                    <div class="text-end">
                      <div class="text-start">
                        <span class="fw-bold m-0">{{ $mensaje["usuario"] }} </span>
                      </div>
                      <span>{{ $mensaje["fecha"] }}</span>
                    </div>
                    <p class="text-start m-0">{{ $mensaje["mensaje"] }}</p>
                  </div> --}}
                  <strong>{{$mensaje["usuario"]}}</strong><small class="float-right">{{$mensaje["fecha"]}}</small>
                  <br><span class="text'white">{{$mensaje["mensaje"]}}</span>
                </div>
              </div>
              @else
              <div class="card col-7 p-0 float-right fs-3">
                <div class="card-body p-2 bg-primary text-white">
                  <div class="lh-1 text-end">
                    <small >{{ $mensaje["fecha"] }}</small><br>
                    {{-- <div class="text-start m-0">
                      <strong>{{ $mensaje["usuario"] }} </strong><br>
                    </div> --}}
                    <p class="text-start m-0">{{ $mensaje["mensaje"] }}</p>
                  </div>
                </div>
              </div>
              @endif

              @endforeach
            </div>
          </div>


          <div id="input-container" class="mt-4">
            <input class="fs-3" type="hidden" name="hour" value="antiguo">
            <input class="fs-3" type="hidden" value="{{ $usuario }}" wire:model="usuario" >
            <input class="fs-3" id="input" type="text" placeholder="Mensaje.." wire:model="mensaje"  wire:keydown.enter="enviarMensaje" autofocus>
            <button class="float-right btn" wire:click="enviarMensaje"><img id="send-icon" class="pt-2 pe-1 fs-3" src="{{ asset('images/enviar-mensaje.png') }}" alt=""></button> 
          </div>
      </div>
      {{-- @error("mensaje") <small class="text-danger fs-6">{{ $message }}</small>@enderror --}}

      <div class="alert alert-success collapse" role="alert" id="enviado"> 
        Se ha enviado
      </div>

      <script>
        window.livewire.on('mensajeEnviado', function () {

          $("#enviado").fadeIn("slow");
          setTimeout(function () { $("#enviado").fadeOut("slow"); }, 3000);
        });
      </script>

  </section>

  <script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('e86dfe3daf3beb35a99b', {
      cluster: 'us2'
    });

    var channel = pusher.subscribe('chat-channel');
    channel.bind('chat-event', function(data) {
      // alert(JSON.stringify(data));
      window.livewire.emit('mensajeRecibido', data);
    });
  </script>

</div>
