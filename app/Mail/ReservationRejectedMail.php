<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class ReservationRejectedMail extends Mailable
{
    public function __construct(public $reservation)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Réservation non disponible - ResaFit'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.reservation-rejected'
        );
    }
}
