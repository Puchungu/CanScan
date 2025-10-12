<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Usuarios;

class ReporteDeUsuario extends Mailable
{
    use Queueable, SerializesModels;

    public $datosFormulario;
    public $usuario;

    /**
     * Create a new message instance.
     */
    public function __construct(array $datosFormulario, Usuarios $usuario)
    {
        $this->datosFormulario = $datosFormulario;
        $this->usuario = $usuario;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $asuntoDelCorreo = '[Reporte CanScan] - ' . $this->datosFormulario['asunto'];
        return new Envelope(
            subject: $asuntoDelCorreo,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.reporte-usuario',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
