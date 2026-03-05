<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ReservationConfirmedMail extends Mailable
{
    public $reservation;

    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }

    public function build()
    {
        return $this->subject('Réservation ResaFit confirmée')
            ->view('emails.reservation_confirmed');
    }
}
