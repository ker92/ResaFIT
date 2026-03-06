<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription — ResaFit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500&family=Space+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root { --acid: #c8f135; --dark: #080808; --mid: #111111; --light: #f0f0f0; --gray: #888; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background: var(--dark); color: var(--light); font-family: 'DM Sans', sans-serif; min-height: 100vh; display: grid; grid-template-columns: 1fr 1fr; }

        .left-panel { position: relative; overflow: hidden; background-image: url('/images/photo-inscription.png'); background-size: cover; background-position: center; }
        .left-panel::after { content: ''; position: absolute; inset: 0; background: linear-gradient(135deg, rgba(8,8,8,0.75) 0%, rgba(8,8,8,0.35) 100%); }
        .left-content { position: relative; z-index: 2; height: 100%; display: flex; flex-direction: column; justify-content: space-between; padding: 48px; }
        .left-logo { font-family: 'Bebas Neue', sans-serif; font-size: 32px; letter-spacing: 4px; color: var(--light); text-decoration: none; }
        .left-logo span { color: var(--acid); }
        .left-tagline h2 { font-family: 'Bebas Neue', sans-serif; font-size: clamp(48px, 5vw, 80px); line-height: 0.95; letter-spacing: -1px; margin-bottom: 16px; }
        .left-tagline h2 span { color: var(--acid); }
        .left-tagline p { color: rgba(240,240,240,0.6); font-size: 15px; line-height: 1.6; max-width: 320px; }
        .left-features { display: flex; flex-direction: column; gap: 16px; }
        .left-feature { display: flex; align-items: center; gap: 14px; }
        .left-feature-icon { width: 36px; height: 36px; background: rgba(200,241,53,0.12); border: 1px solid rgba(200,241,53,0.25); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: var(--acid); font-size: 14px; flex-shrink: 0; }
        .left-feature-text { font-size: 13px; color: rgba(240,240,240,0.6); }
        .left-feature-text strong { color: var(--light); display: block; font-size: 14px; margin-bottom: 1px; }

        .right-panel { background: var(--dark); display: flex; align-items: center; justify-content: center; padding: 48px; position: relative; overflow-y: auto; }
        .right-panel::before { content: ''; position: absolute; inset: 0; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.03'/%3E%3C/svg%3E"); pointer-events: none; }

        .form-container { width: 100%; max-width: 400px; position: relative; z-index: 1; }
        .form-eyebrow { font-family: 'Space Mono', monospace; font-size: 10px; color: var(--acid); letter-spacing: 4px; text-transform: uppercase; margin-bottom: 12px; opacity: 0; animation: revealUp 0.6s ease forwards 0.1s; }
        .form-title { font-family: 'Bebas Neue', sans-serif; font-size: 56px; line-height: 1; letter-spacing: -1px; margin-bottom: 8px; opacity: 0; animation: revealUp 0.6s ease forwards 0.2s; }
        .form-subtitle { font-size: 14px; color: var(--gray); margin-bottom: 36px; opacity: 0; animation: revealUp 0.6s ease forwards 0.3s; }

        .alert { padding: 14px 16px; border-radius: 12px; font-size: 13px; margin-bottom: 24px; display: flex; align-items: flex-start; gap: 10px; }
        .alert-error { background: rgba(239,68,68,0.08); border: 1px solid rgba(239,68,68,0.3); color: #f87171; }

        .fields-grid { display: grid; gap: 16px; }
        .field { opacity: 0; animation: revealUp 0.6s ease forwards; }
        .field:nth-child(1) { animation-delay: 0.4s; }
        .field:nth-child(2) { animation-delay: 0.5s; }
        .field:nth-child(3) { animation-delay: 0.6s; }
        .field:nth-child(4) { animation-delay: 0.65s; }
        .field label { display: block; font-size: 11px; font-weight: 500; letter-spacing: 2px; text-transform: uppercase; color: var(--gray); margin-bottom: 8px; }
        .field-wrap { position: relative; }
        .field-icon { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: var(--gray); font-size: 14px; pointer-events: none; transition: color 0.2s; }
        .field input { width: 100%; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.1); padding: 16px 44px 16px 44px; border-radius: 12px; color: var(--light); font-family: 'DM Sans', sans-serif; font-size: 14px; outline: none; transition: all 0.2s; }
        .field input:focus { border-color: var(--acid); background: rgba(200,241,53,0.04); }
        .field-wrap:focus-within .field-icon { color: var(--acid); }

        .toggle-pw { position: absolute; right: 16px; top: 50%; transform: translateY(-50%); color: var(--gray); font-size: 14px; cursor: pointer; transition: color 0.2s; background: none; border: none; padding: 0; }
        .toggle-pw:hover { color: var(--acid); }

        .strength-bar { display: flex; gap: 4px; margin-top: 8px; }
        .strength-bar span { flex: 1; height: 3px; border-radius: 2px; background: rgba(255,255,255,0.08); transition: background 0.3s; }
        .strength-label { font-size: 11px; color: var(--gray); margin-top: 4px; letter-spacing: 1px; }

        .pw-rules { margin-top: 8px; display: flex; flex-direction: column; gap: 4px; }
        .pw-rule { font-size: 11px; color: var(--gray); display: flex; align-items: center; gap: 6px; transition: color 0.2s; }
        .pw-rule i { font-size: 10px; }
        .pw-rule.valid { color: var(--acid); }

        .btn-submit { width: 100%; background: var(--acid); color: var(--dark); font-family: 'DM Sans', sans-serif; font-weight: 700; font-size: 13px; letter-spacing: 2px; text-transform: uppercase; padding: 18px; border: none; border-radius: 12px; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 10px; transition: all 0.25s; position: relative; overflow: hidden; margin-top: 24px; opacity: 0; animation: revealUp 0.6s ease forwards 0.75s; }
        .btn-submit::after { content: ''; position: absolute; inset: 0; background: rgba(255,255,255,0.15); transform: translateX(-100%); transition: transform 0.3s ease; }
        .btn-submit:hover::after { transform: translateX(0); }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 16px 40px rgba(200,241,53,0.3); }

        .terms { font-size: 11px; color: var(--gray); text-align: center; margin-top: 16px; line-height: 1.6; opacity: 0; animation: revealUp 0.6s ease forwards 0.85s; }
        .divider { display: flex; align-items: center; gap: 16px; margin: 24px 0; opacity: 0; animation: revealUp 0.6s ease forwards 0.9s; }
        .divider::before, .divider::after { content: ''; flex: 1; height: 1px; background: rgba(255,255,255,0.08); }
        .divider span { font-size: 11px; color: var(--gray); letter-spacing: 2px; text-transform: uppercase; }
        .login-link { text-align: center; font-size: 13px; color: var(--gray); opacity: 0; animation: revealUp 0.6s ease forwards 0.95s; }
        .login-link a { color: var(--acid); text-decoration: none; font-weight: 500; transition: opacity 0.2s; }
        .login-link a:hover { opacity: 0.8; }

        @keyframes revealUp { from { opacity: 0; transform: translateY(16px); } to { opacity: 1; transform: translateY(0); } }

        @media (max-width: 768px) {
            body { grid-template-columns: 1fr; }
            .left-panel { display: none; }
            .right-panel { padding: 32px 24px; align-items: flex-start; padding-top: 60px; }
        }
    </style>
</head>
<body>

<div class="left-panel">
    <div class="left-content">
        <a href="{{ route('home') }}" class="left-logo">Resa<span>Fit</span></a>
        <div class="left-tagline">
            <h2>Rejoignez<br>la <span>communauté</span></h2>
            <p>Créez votre compte gratuitement et accédez à des centaines de cours partout dans le monde.</p>
        </div>
        <div class="left-features">
            <div class="left-feature">
                <div class="left-feature-icon"><i class="fa-solid fa-bolt"></i></div>
                <div class="left-feature-text"><strong>Inscription en 30 secondes</strong>Aucune carte bancaire requise</div>
            </div>
            <div class="left-feature">
                <div class="left-feature-icon"><i class="fa-solid fa-qrcode"></i></div>
                <div class="left-feature-text"><strong>QR Code personnel</strong>Accès instantané aux salles partenaires</div>
            </div>
            <div class="left-feature">
                <div class="left-feature-icon"><i class="fa-solid fa-earth-americas"></i></div>
                <div class="left-feature-text"><strong>340+ salles partenaires</strong>Paris, Londres, New York, Tokyo et plus</div>
            </div>
        </div>
    </div>
</div>

<div class="right-panel">
    <div class="form-container">

        <p class="form-eyebrow"><i class="fa-solid fa-rocket" style="margin-right:6px"></i>Inscription gratuite</p>
        <h1 class="form-title">Créer un compte</h1>
        <p class="form-subtitle">Rejoignez ResaFit en quelques secondes</p>

        @if($errors->any())
            <div class="alert alert-error">
                <i class="fa-solid fa-circle-xmark"></i>
                <div>@foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div>
            </div>
        @endif

        <form method="POST" action="/register">
            @csrf
            <div class="fields-grid">
                <div class="field">
                    <label>Nom complet</label>
                    <div class="field-wrap">
                        <i class="fa-solid fa-user field-icon"></i>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Votre nom" required>
                    </div>
                </div>
                <div class="field">
                    <label>Adresse email</label>
                    <div class="field-wrap">
                        <i class="fa-solid fa-envelope field-icon"></i>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="entrez votre adresse mail" required>
                    </div>
                </div>
                <div class="field">
                    <label>Mot de passe</label>
                    <div class="field-wrap">
                        <i class="fa-solid fa-lock field-icon"></i>
                        <input type="password" name="password" id="password" placeholder="12 caractères minimum" required oninput="checkStrength(this.value)">
                        <button type="button" class="toggle-pw" onclick="togglePw('password', this)">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                    <div class="strength-bar">
                        <span id="s1"></span><span id="s2"></span><span id="s3"></span><span id="s4"></span>
                    </div>
                    <p class="strength-label" id="strength-label"></p>
                    <div class="pw-rules">
                        <span class="pw-rule" id="rule-length"><i class="fa-solid fa-circle-xmark"></i> 12 caractères minimum</span>
                        <span class="pw-rule" id="rule-upper"><i class="fa-solid fa-circle-xmark"></i> Une majuscule</span>
                        <span class="pw-rule" id="rule-number"><i class="fa-solid fa-circle-xmark"></i> Un chiffre</span>
                        <span class="pw-rule" id="rule-symbol"><i class="fa-solid fa-circle-xmark"></i> Un symbole (!@#$%...)</span>
                    </div>
                </div>
                <div class="field">
                    <label>Confirmer le mot de passe</label>
                    <div class="field-wrap">
                        <i class="fa-solid fa-shield-halved field-icon"></i>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" required>
                        <button type="button" class="toggle-pw" onclick="togglePw('password_confirmation', this)">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                <i class="fa-solid fa-arrow-right"></i> Créer mon compte
            </button>
        </form>

        <p class="terms">
            En vous inscrivant, vous acceptez nos
            <a href="{{ route('cgu') }}" style="color:var(--acid); text-decoration:none;">CGU</a>
            et notre
            <a href="{{ route('confidentialite') }}" style="color:var(--acid); text-decoration:none;">politique de confidentialité</a>.
        </p>

        <div class="divider"><span>ou</span></div>

        <p class="login-link">
            Déjà un compte ? <a href="{{ route('login') }}">Se connecter</a>
        </p>

    </div>
</div>

<script>
    function togglePw(id, btn) {
        const input = document.getElementById(id);
        const icon = btn.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }

    function checkStrength(val) {
        const bars = ['s1','s2','s3','s4'].map(id => document.getElementById(id));
        const label = document.getElementById('strength-label');
        bars.forEach(b => b.style.background = 'rgba(255,255,255,0.08)');

        const rules = {
            length: val.length >= 12,
            upper:  /[A-Z]/.test(val),
            number: /[0-9]/.test(val),
            symbol: /[^A-Za-z0-9]/.test(val),
        };

        updateRule('rule-length', rules.length);
        updateRule('rule-upper',  rules.upper);
        updateRule('rule-number', rules.number);
        updateRule('rule-symbol', rules.symbol);

        const score = Object.values(rules).filter(Boolean).length;
        const colors = ['#f87171', '#fb923c', '#facc15', '#c8f135'];
        const labels = ['Très faible', 'Faible', 'Moyen', 'Fort'];

        if (val.length === 0) { label.textContent = ''; return; }

        for (let i = 0; i < score; i++) bars[i].style.background = colors[score - 1];
        label.textContent = labels[score - 1];
        label.style.color = colors[score - 1];
    }

    function updateRule(id, valid) {
        const el = document.getElementById(id);
        const icon = el.querySelector('i');
        if (valid) {
            el.classList.add('valid');
            icon.classList.replace('fa-circle-xmark', 'fa-circle-check');
        } else {
            el.classList.remove('valid');
            icon.classList.replace('fa-circle-check', 'fa-circle-xmark');
        }
    }
</script>

</body>
</html>
