<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class notificacion2 extends Mailable
{
    use Queueable, SerializesModels;
    public $correo;
    public $encid;

    /**
     * Create a new message instance.
     */
    public function __construct($correo,$encid)
    {
        $this->correo = $correo;
        $this->encid = $encid;
    }

    public function build()
    {
        return $this->view('recupera2')
        ->subject("Recuperar Contraseña");
    }
}
