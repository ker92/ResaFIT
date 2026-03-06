<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Accès — ResaFit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500;700&family=Space+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root { --acid: #c8f135; --dark: #080808; --light: #f0f0f0; --gray: #888; }
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px 16px;
            font-family: 'DM Sans', sans-serif;
            color: var(--light);
            background-image: url('/images/qr-code.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed; inset: 0;
            background: linear-gradient(135deg, rgba(8,8,8,0.9) 0%, rgba(8,8,8,0.65) 100%);
            z-index: 0;
        }
        body::after {
            content: '';
            position: fixed; inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.025'/%3E%3C/svg%3E");
            z-index: 0; pointer-events: none;
        }

        .card {
            position: relative; z-index: 1;
            width: 100%; max-width: 440px;
            background: rgba(17,17,17,0.85);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 28px;
            padding: 48px 40px;
            text-align: center;
            backdrop-filter: blur(20px);
            animation: revealUp 0.7s cubic-bezier(0.34,1.2,0.64,1) forwards;
        }

        .eyebrow {
            font-family: 'Space Mono', monospace;
            font-size: 10px; color: var(--acid);
            letter-spacing: 4px; text-transform: uppercase;
            margin-bottom: 12px;
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }

        .card-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 52px; line-height: 0.95;
            letter-spacing: -1px; margin-bottom: 10px;
        }

        .card-subtitle {
            font-size: 13px; color: rgba(240,240,240,0.45);
            line-height: 1.6; margin-bottom: 32px;
            max-width: 300px; margin-left: auto; margin-right: auto;
        }

        .qr-wrapper {
            background: #ffffff;
            border-radius: 20px;
            padding: 20px;
            display: inline-block;
            position: relative;
            margin-bottom: 28px;
            box-shadow: 0 0 0 1px rgba(200,241,53,0.2), 0 24px 48px rgba(0,0,0,0.4);
            animation: pulse-border 2.5s ease-in-out infinite;
        }
        .timer-block {
            display: flex; align-items: center; justify-content: center; gap: 10px;
            background: rgba(200,241,53,0.06);
            border: 1px solid rgba(200,241,53,0.15);
            border-radius: 12px;
            padding: 12px 20px;
            margin-bottom: 12px;
        }
        .timer-block i { color: var(--acid); font-size: 14px; }
        .timer-text { font-family: 'Space Mono', monospace; font-size: 13px; color: var(--acid); }
        .timer-countdown { font-family: 'Space Mono', monospace; font-size: 18px; font-weight: bold; color: var(--acid); margin-left: 4px; }

        .meta {
            font-size: 11px; color: rgba(240,240,240,0.3);
            letter-spacing: 1px; margin-bottom: 32px;
            display: flex; flex-direction: column; gap: 4px;
        }

        .divider {
            height: 1px; background: rgba(255,255,255,0.07);
            margin-bottom: 28px;
        }

        .btn-back {
            display: inline-flex; align-items: center; gap: 10px;
            background: var(--acid); color: var(--dark);
            font-family: 'DM Sans', sans-serif; font-weight: 700;
            font-size: 12px; letter-spacing: 2px; text-transform: uppercase;
            padding: 16px 32px; border-radius: 12px;
            text-decoration: none; transition: all 0.25s;
            position: relative; overflow: hidden;
        }
        .btn-back::after {
            content: ''; position: absolute; inset: 0;
            background: rgba(255,255,255,0.15);
            transform: translateX(-100%); transition: transform 0.3s ease;
        }
        .btn-back:hover::after { transform: translateX(0); }
        .btn-back:hover { transform: translateY(-2px); box-shadow: 0 16px 40px rgba(200,241,53,0.3); }

        @keyframes revealUp {
            from { opacity: 0; transform: translateY(24px) scale(0.97); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes pulse-border {
            0%, 100% { box-shadow: 0 0 0 1px rgba(200,241,53,0.2), 0 24px 48px rgba(0,0,0,0.4); }
            50%       { box-shadow: 0 0 0 4px rgba(200,241,53,0.15), 0 24px 48px rgba(0,0,0,0.4); }
        }

        @media (max-width: 480px) {
            .card { padding: 36px 24px; }
            .card-title { font-size: 40px; }
        }
    </style>
</head>
<body>

<div class="card">

    <p class="eyebrow">
        <i class="fa-solid fa-shield-halved"></i>
        Accès sécurisé
    </p>

    <h1 class="card-title">Mon QR<br>d'<span style="color:var(--acid)">accès</span></h1>

    <p class="card-subtitle">
        Ce QR code est personnel et expire automatiquement après 5 minutes.
    </p>

    <div class="qr-wrapper">
        {!! QrCode::size(240)->generate($qrUrl) !!}
    </div>

    <div class="timer-block">
        <i class="fa-solid fa-clock"></i>
        <span class="timer-text">Expire dans</span>
        <span class="timer-countdown" id="countdown">05:00</span>
    </div>

    <div class="meta">
        <span><i class="fa-solid fa-lock" style="margin-right:5px;color:rgba(200,241,53,0.4)"></i>QR sécurisé • Généré le {{ now()->format('d/m/Y H:i') }}</span>
        <span><i class="fa-solid fa-hourglass-half" style="margin-right:5px;color:rgba(200,241,53,0.4)"></i>Expiration : {{ now()->addMinutes(5)->format('H:i') }}</span>
    </div>

    <div class="divider"></div>

    <a href="{{ route('user.dashboard') }}" class="btn-back">
        <i class="fa-solid fa-arrow-left"></i>
        Retour au tableau de bord
    </a>

</div>

<script>
    let seconds = 5 * 60;
    const el = document.getElementById('countdown');

    const timer = setInterval(() => {
        seconds--;
        if (seconds <= 0) {
            clearInterval(timer);
            el.textContent = '00:00';
            el.style.color = '#f87171';
            document.querySelector('.timer-block').style.borderColor = 'rgba(248,113,113,0.3)';
            document.querySelector('.timer-block').style.background = 'rgba(248,113,113,0.06)';
            document.querySelector('.timer-block i').style.color = '#f87171';
            return;
        }
        const m = String(Math.floor(seconds / 60)).padStart(2, '0');
        const s = String(seconds % 60).padStart(2, '0');
        el.textContent = `${m}:${s}`;

        if (seconds < 60) {
            el.style.color = '#fb923c';
            document.querySelector('.timer-block').style.borderColor = 'rgba(251,146,60,0.3)';
        }
    }, 1000);
</script>

</body>
</html>
