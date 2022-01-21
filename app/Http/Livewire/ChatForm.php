<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatForm extends Component
{
    public $mensaje;
    public $usuario;
    public $mensajes;
    public $ultimoId;
    protected $listeners = ['mensajeRecibido', 'cambioUsuario'];
    protected $updatesQueryString = ['usuario']; 

    public function mount()
    {
        $this->mensaje = "";
        $this->usuario = Auth::user()->name;
        $this->mensajes = [];
        // $this->mensajes = Chat::all();
        $this->ultimoId = 0;
        
        // $this->usuario = request()->query('usuario', $this->usuario) ?? "";     
    }

    public function mensajeRecibido($data, Request $request)
    {
        $this->actualizarMensajes($data, $request);
    }

    // public function cambioUsuario($usuario)
    // {
    //     $this->usuario = $usuario;
    // }

    public function actualizarMensajes($data, Request $request)
    {
        if($this->usuario != "")
        {
            // El contenido de la Push
            //$data = \json_decode(\json_encode($data));

            //$mensajes = Chat::orderBy('id', 'asc')->oldest()->get();

            $hour = $request->get('hour');
            $mensajes = Chat::with('user')
                 ->hour($hour)
                 ->get();
            // dd($mensajes);

            // dd($mensajes);
            // $mensajes = $mensajes_all->orderBy('created_at', 'desc')->get();
            // echo json_encode($mensajes);
            //$this->mensajes = [];            
            // var_dump($mensajes);
            foreach($mensajes as $mensaje)
            {
                if($this->ultimoId < $mensaje->id)
                {
                    $this->ultimoId = $mensaje->id;
                    // dd($mensaje->id);
                    $item = [
                        "id" => $mensaje->id,
                        "usuario" => $mensaje->usuario,
                        "mensaje" => $mensaje->mensaje,
                        "recibido" => ($mensaje->usuario != $this->usuario),
                        "fecha" => $mensaje->created_at->diffForHumans(),
                    ];
                    //array_unshift($this->mensajes, $item);                
                    array_push($this->mensajes ,$item);                
                }
                
            }

            // if(count($this->mensajes) > 5)
            // {
            //     array_pop($this->mensajes);
            // }
        }
        else
        {            
            $this->emit('solicitaUsuario');
        }
}

        public function resetMensajes()
        {
            $this->mensajes = [];
            $this->actualizarMensajes;
        }
    
        public function dydrate()
        {
            if($this->usuario == "")
            {
                // Le pedimos el uisuario al otro componente
                $this->emit('solicitaUsuario');
            }
        }

        public function solicitaUsuario()
    {
        // Lo emitimos por evento
        $this->emit('cambioUsuario', $this->usuario);
    }

    public function updatedUsuario()
    {
        // Notificamos al otro componente el cambio
        $this->emit('cambioUsuario', $this->usuario);
    }

    public function enviarMensaje()
    {
        $this->validate([
            "mensaje" => "required"
        ]);

        \App\Models\Chat::create([
            "usuario" => $this->usuario,
            "mensaje" => $this->mensaje
        ]);

        event(new \App\Events\EnviarMensaje($this->usuario, $this->mensaje)); 

        $this->emit("mensajeEnviado");

        // $datos = [
        //     "usuario" => $this->usuario,
        //     "mensaje" => $this->mensaje
        // ];

        // $this->emit("mensajeRecibido", $datos);

       
    }

    //protected $listeners = ["mensajeRecibido"];

    

    public function render()
    {
        return view('livewire.chat-form');
    }

}

