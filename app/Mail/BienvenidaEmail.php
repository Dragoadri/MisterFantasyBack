<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BienvenidaEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario, $pass_sin_hashear)
    {
        $this->usuario = $usuario;
        $this->usuario->password = $pass_sin_hashear;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //ruta resources/views/emails/welcome.blade.php, venia creado por defecto
        return $this->view('welcome')
            ->subject('Bienvenido a FantasyRef')
            ->with([
                'nickname' => $this->usuario->nickname,
                'password' => $this->usuario->password
            ]);
    }

}
