<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class notificacion extends Mailable
{
    use Queueable, SerializesModels;
    public $correo;
    public $nuevaclave;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($correo,$nuevaclave)
    {
        $this->correo = $correo;
        $this->nuevaclave = $nuevaclave;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('recupera')
        ->subject("Recuperar Contraseña");
    }
}
