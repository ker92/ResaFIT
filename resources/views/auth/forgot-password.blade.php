<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié — ResaFit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500&family=Space+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root { --acid: #c8f135; --dark: #080808; --mid: #111111; --light: #f0f0f0; --gray: #888; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background: var(--dark); color: var(--light); font-family: 'DM Sans', sans-serif; min-height: 100vh; display: grid; grid-template-columns: 1fr 1fr; }

        .left-panel {
            position: relative;
            overflow: hidden;
            background-image: url('/images/photo-inscription.png');
            background-size: cover;
            background-position: center;
        }
        .left-panel::after {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(8,8,8,0.7) 0%, rgba(8,8,8,0.3) 100%);
        }
        .left-content {
            position: relative; z-index: 2;
            height: 100%;
            display: flex; flex-direction: column;
            justify-content: space-between;
            padding: 48px;
        }
        .left-logo { font-family: 'Bebas Neue', sans-serif; font-size: 32px; letter-spacing: 4px; color: var(--light); text-decoration: none; }
        .left-logo span { color: var(--acid); }
        .left-tagline h2 { font-family: 'Bebas Neue', sans-serif; font-size: clamp(48px, 5vw, 80px); line-height: 0.95; letter-spacing: -1px; margin-bottom: 16px; }
        .left-tagline h2 span { color: var(--acid); }
        .left-tagline p { color: rgba(240,240,240,0.6); font-size: 15px; line-height: 1.6; max-width: 320px; }
        .left-stats { display: flex; gap: 40px; }
        .left-stat .num { font-family: 'Bebas Neue', sans-serif; font-size: 36px; color: var(--acid); line-height: 1; }
        .left-stat .lbl { font-size: 11px; color: rgba(240,240,240,0.4); letter-spacing: 2px; text-transform: uppercase; margin-top: 2px; }

        .right-panel {
            background: var(--dark);
            display: flex; align-items: center; justify-content: center;
            padding: 48px;
            position: relative;
        }
        .right-panel::before {
            content: '';
            position: absolute; inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none;
        }
        .form-container { width: 100%; max-width: 400px; position: relative; z-index: 1; }

        .form-eyebrow { font-family: 'Space Mono', monospace; font-size: 10px; color: var(--acid); letter-spacing: 4px; text-transform: uppercase; margin-bottom: 12px; opacity: 0; animation: revealUp 0.6s ease forwards 0.1s; }
        .form-title { font-family: 'Bebas Neue', sans-serif; font-size: 56px; line-height: 1; letter-spacing: -1px; margin-bottom: 8px; opacity: 0; animation: revealUp 0.6s ease forwards 0.2s; }
        .form-subtitle { font-size: 14px; color: var(--gray); margin-bottom: 40px; line-height: 1.6; opacity: 0; animation: revealUp 0.6s ease forwards 0.3s; }

        .alert { padding: 14px 16px; border-radius: 12px; font-size: 13px; margin-bottom: 24px; display: flex; align-items: flex-start; gap: 10px; }
        .alert-success { background: rgba(200,241,53,0.08); border: 1px solid rgba(200,241,53,0.3); color: #c8f135; }
        .alert-error { background: rgba(239,68,68,0.08); border: 1px solid rgba(239,68,68,0.3); color: #f87171; }

        .field { margin-bottom: 20px; opacity: 0; animation: revealUp 0.6s ease forwards 0.4s; }
        .field label { display: block; font-size: 11px; font-weight: 500; letter-spacing: 2px; text-transform: uppercase; color: var(--gray); margin-bottom: 8px; }
        .field-wrap { position: relative; }
        .field-icon { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: var(--gray); font-size: 14px; pointer-events: none; transition: color 0.2s; }
        .field input {
            width: 100%; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.1);
            padding: 16px 16px 16px 44px; border-radius: 12px; color: var(--light); font-family: 'DM Sans', sans-serif;
            font-size: 14px; outline: none; transition: all 0.2s;
        }
        .field input:focus { border-color: var(--acid); background: rgba(200,241,53,0.04); }
        .field-wrap:focus-within .field-icon { color: var(--acid); }
        .field input.is-invalid { border-color: #f87171; }
        .invalid-msg { font-size: 12px; color: #f87171; margin-top: 6px; display: flex; align-items: center; gap: 6px; }

        .btn-submit {
            width: 100%; background: var(--acid); color: var(--dark);
            font-family: 'DM Sans', sans-serif; font-weight: 700; font-size: 13px;
            letter-spacing: 2px; text-transform: uppercase; padding: 18px;
            border: none; border-radius: 12px; cursor: pointer;
            display: flex; align-items: center; justify-content: center; gap: 10px;
            transition: all 0.25s; position: relative; overflow: hidden;
            opacity: 0; animation: revealUp 0.6s ease forwards 0.55s;
        }
        .btn-submit::after { content: ''; position: absolute; inset: 0; background: rgba(255,255,255,0.15); transform: translateX(-100%); transition: transform 0.3s ease; }
        .btn-submit:hover::after { transform: translateX(0); }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 16px 40px rgba(200,241,53,0.3); }

        /* Loading state */
        .btn-submit.loading { pointer-events: none; opacity: 0.8; }
        .btn-submit .spinner { width: 16px; height: 16px; border: 2px solid rgba(8,8,8,0.3); border-top-color: var(--dark); border-radius: 50%; animation: spin 0.7s linear infinite; display: none; }
        .btn-submit.loading .spinner { display: block; }
        .btn-submit.loading .btn-text { display: none; }

        .back-link { text-align: center; margin-top: 24px; font-size: 13px; color: var(--gray); opacity: 0; animation: revealUp 0.6s ease forwards 0.65s; }
        .back-link a { color: var(--acid); text-decoration: none; font-weight: 500; transition: opacity 0.2s; }
        .back-link a:hover { opacity: 0.8; }

        @keyframes revealUp { from { opacity: 0; transform: translateY(16px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes spin { to { transform: rotate(360deg); } }

        @media (max-width: 768px) {
            body { grid-template-columns: 1fr; }
            .left-panel { display: none; }
            .right-panel { padding: 32px 24px; }
        }
    </style>
</head>
<body>

<div class="left-panel">
    <div class="left-content">
        <a href="{{ route('home') }}" class="left-logo">Resa<span>Fit</span></a>
        <div class="left-tagline">
            <h2>Mot de passe<br><span>oublié ?</span></h2>
            <p>Pas de panique — entrez votre email et nous vous enverrons un lien pour récupérer l'accès à votre compte.</p>
        </div>
        <div class="left-stats">
            <div class="left-stat">
                <div class="num">12K+</div>
                <div class="lbl">Membres</div>
            </div>
            <div class="left-stat">
                <div class="num">340</div>
                <div class="lbl">Salles</div>
            </div>
            <div class="left-stat">
                <div class="num">98%</div>
                <div class="lbl">Satisfaits</div>
            </div>
        </div>
    </div>
</div>

<div class="right-panel">
    <div class="form-container">

        <p class="form-eyebrow"><i class="fa-solid fa-shield-halved" style="margin-right:6px"></i>Récupération de compte</p>
        <h1 class="form-title">Mot de<br>passe oublié</h1>
        <p class="form-subtitle">Entrez votre adresse email et nous vous enverrons un lien de réinitialisation.</p>

        @if(session('status'))
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <i class="fa-solid fa-circle-xmark"></i>
                <div>@foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" onsubmit="handleSubmit(this)">
            @csrf

            <div class="field">
                <label>Adresse email</label>
                <div class="field-wrap">
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="vous@exemple.com"
                        class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                        required
                    >
                    <i class="fa-solid fa-envelope field-icon"></i>
                </div>
                @error('email')
                <p class="invalid-msg"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn-submit" id="submitBtn">
                <div class="spinner"></div>
                <span class="btn-text">
                    <i class="fa-solid fa-paper-plane"></i> Envoyer le lien
                </span>
            </button>
        </form>

        <p class="back-link">
            <a href="{{ route('login') }}"><i class="fa-solid fa-arrow-left" style="margin-right:6px"></i>Retour à la connexion</a>
        </p>

    </div>
</div>

<script>
    function handleSubmit(form) {
        const btn = document.getElementById('submitBtn');
        btn.classList.add('loading');
    }
</script>

</body>
</html>
