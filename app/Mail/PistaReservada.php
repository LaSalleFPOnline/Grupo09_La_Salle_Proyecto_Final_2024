<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PistaReservada extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Pista reservada';

    public $nombre;

    public $pista;

    public $fecha;

    public $hora;

    public $enlace;

    /**
     *  Create a new message instance.
     * 
     * @return void
     */
    public function __construct($nombre, $pista, $fecha, $hora, $enlace)
    {
        $this->nombre = $nombre;
        $this->pista = $pista;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->enlace = $enlace;
    }

    /**
     * Build the message.
     * 
     * @return void
     */
    public function build()   
    {
        return $this->view('plantillascorreo.pistareservada');
    }

}