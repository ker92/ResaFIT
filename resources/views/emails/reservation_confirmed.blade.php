<h2 style="color:#6B46C1">
    Réservation confirmée ResaFit
</h2>

<p>
    Bonjour {{ $reservation->user->name }},
</p>

<p>
    Votre réservation pour le cours
    <strong>{{ $reservation->course->nom }}</strong>
    a été validée.
</p>
