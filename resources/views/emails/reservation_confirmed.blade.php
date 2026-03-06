<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: 'DM Sans', Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 40px auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08); }
        .header { background: #080808; padding: 40px 48px; text-align: center; }
        .logo { font-size: 28px; font-weight: 900; color: #ffffff; letter-spacing: 4px; text-transform: uppercase; }
        .logo span { color: #c8f135; }
        .body { padding: 48px; }
        .badge { display: inline-block; background: #f0fce8; border: 1px solid #c8f135; color: #3a6b00; font-size: 12px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; padding: 6px 16px; border-radius: 20px; margin-bottom: 24px; }
        h1 { font-size: 28px; color: #111111; margin: 0 0 16px; line-height: 1.3; }
        p { font-size: 15px; color: #555555; line-height: 1.7; margin: 0 0 16px; }
        .details-box { background: #f9f9f9; border-left: 4px solid #c8f135; border-radius: 8px; padding: 20px 24px; margin: 28px 0; }
        .detail-row { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #eeeeee; font-size: 14px; }
        .detail-row:last-child { border-bottom: none; }
        .detail-label { color: #888888; font-weight: 500; }
        .detail-value { color: #111111; font-weight: 600; }
        .footer { background: #f9f9f9; padding: 24px 48px; text-align: center; font-size: 12px; color: #aaaaaa; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="logo">Resa<span>Fit</span></div>
    </div>
    <div class="body">
        <div class="badge">✓ Réservation confirmée</div>
        <h1>Votre réservation a été validée !</h1>
        <p>Bonjour <strong>{{ optional($reservation->user)->name }}</strong>,</p>
        <p>Bonne nouvelle ! Votre réservation a été approuvée par l'administrateur ResaFit. Voici les détails :</p>

        <div class="details-box">
            <div class="detail-row">
                <span class="detail-label">Type de cours</span>
                <span class="detail-value">{{ ucfirst($reservation->type_cours) }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Date</span>
                <span class="detail-value">{{ $reservation->date_reservation->format('d/m/Y') }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Heure</span>
                <span class="detail-value">{{ $reservation->heure_reservation }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Lieu</span>
                <span class="detail-value">{{ $reservation->lieu }}</span>
            </div>
        </div>

        <p>N'oubliez pas d'avoir votre QR code prêt pour accéder à la salle. À bientôt !</p>
    </div>
    <div class="footer">
        © {{ date('Y') }} ResaFit — Tous droits réservés
    </div>
</div>
</body>
</html>
