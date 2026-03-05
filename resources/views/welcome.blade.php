<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResaFit — Repousse tes limites</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500&family=Space+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root { --acid: #c8f135; --dark: #080808; --mid: #111111; --light: #f0f0f0; --gray: #888; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { background: var(--dark); color: var(--light); font-family: 'DM Sans', sans-serif; overflow-x: hidden; }
        body::before { content: ''; position: fixed; inset: 0; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E"); pointer-events: none !important; z-index: 0; opacity: 0.35; }
        nav { position: fixed; top: 0; left: 0; right: 0; z-index: 100; padding: 24px 48px; display: flex; justify-content: space-between; align-items: center; transition: padding 0.3s ease; }
        nav::after { content: ''; position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(8,8,8,0.95) 0%, transparent 100%); z-index: -1; }
        .nav-logo { font-family: 'Bebas Neue', sans-serif; font-size: 28px; letter-spacing: 3px; color: var(--light); text-decoration: none; }
        .nav-logo span { color: var(--acid); }
        .nav-links { display: flex; gap: 8px; align-items: center; }
        .nav-link { color: var(--gray); text-decoration: none; font-size: 13px; font-weight: 500; letter-spacing: 1px; text-transform: uppercase; padding: 10px 20px; border-radius: 100px; transition: all 0.2s; }
        .nav-link:hover { color: var(--light); background: rgba(255,255,255,0.06); }
        .nav-cta { background: var(--acid); color: var(--dark); font-size: 12px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; text-decoration: none; padding: 12px 24px; border-radius: 100px; transition: all 0.2s; display: inline-flex; align-items: center; gap: 8px; }
        .nav-cta:hover { background: #d4f550; transform: scale(1.04); }
        #hero { height: 100vh; display: flex; flex-direction: column; justify-content: flex-end; padding: 0 48px 80px; position: relative; overflow: hidden; background-image: url('/images/photo-connexion.png'); background-size: cover; background-position: center; background-repeat: no-repeat; }
        #hero::after { content: ''; position: absolute; inset: 0; background: linear-gradient(to top, rgba(8,8,8,0.95) 0%, rgba(8,8,8,0.5) 50%, rgba(8,8,8,0.3) 100%); z-index: 1; pointer-events: none; }
        #particle-canvas { position: absolute; inset: 0; z-index: 2; pointer-events: none; }
        .hero-grid { position: absolute; inset: 0; background-image: linear-gradient(rgba(200,241,53,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(200,241,53,0.04) 1px, transparent 1px); background-size: 80px 80px; z-index: 2; pointer-events: none; }
        .hero-orb { position: absolute; width: 600px; height: 600px; background: radial-gradient(circle, rgba(200,241,53,0.12) 0%, transparent 70%); top: -100px; right: -100px; border-radius: 50%; z-index: 2; pointer-events: none; animation: orbPulse 6s ease-in-out infinite; }
        @keyframes orbPulse { 0%, 100% { transform: scale(1); opacity: 0.8; } 50% { transform: scale(1.15); opacity: 1; } }
        .hero-content { position: relative; z-index: 3; }
        .hero-eyebrow { font-family: 'Space Mono', monospace; font-size: 11px; color: var(--acid); letter-spacing: 4px; text-transform: uppercase; margin-bottom: 24px; opacity: 0; transform: translateY(20px); animation: revealUp 0.8s ease forwards 0.3s; }
        .hero-title { font-family: 'Bebas Neue', sans-serif; font-size: clamp(80px, 12vw, 180px); line-height: 0.9; letter-spacing: -2px; margin-bottom: 32px; opacity: 0; transform: translateY(40px); animation: revealUp 1s ease forwards 0.5s; }
        .hero-title .accent { color: var(--acid); }
        .hero-title .outline { -webkit-text-stroke: 1px rgba(240,240,240,0.3); color: transparent; }
        .hero-bottom { display: flex; justify-content: space-between; align-items: flex-end; opacity: 0; animation: revealUp 0.8s ease forwards 0.9s; }
        .hero-desc { max-width: 380px; color: var(--gray); font-size: 15px; line-height: 1.7; }
        .hero-actions { display: flex; gap: 16px; align-items: center; }
        .btn-primary { background: var(--acid); color: var(--dark); font-weight: 700; font-size: 13px; letter-spacing: 1.5px; text-transform: uppercase; text-decoration: none; padding: 18px 36px; border-radius: 100px; display: inline-flex; align-items: center; gap: 10px; transition: all 0.25s; position: relative; overflow: hidden; }
        .btn-primary::after { content: ''; position: absolute; inset: 0; background: rgba(255,255,255,0.2); transform: translateX(-100%); transition: transform 0.3s ease; }
        .btn-primary:hover::after { transform: translateX(0); }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 20px 40px rgba(200,241,53,0.25); }
        .btn-ghost { color: var(--light); font-size: 13px; letter-spacing: 1px; text-transform: uppercase; text-decoration: none; display: inline-flex; align-items: center; gap: 10px; opacity: 0.6; transition: all 0.2s; }
        .btn-ghost:hover { opacity: 1; gap: 16px; }
        .scroll-hint { position: absolute; bottom: 40px; left: 50%; transform: translateX(-50%); z-index: 3; display: flex; flex-direction: column; align-items: center; gap: 8px; opacity: 0; animation: revealUp 0.8s ease forwards 1.4s; }
        .scroll-hint span { font-family: 'Space Mono', monospace; font-size: 9px; letter-spacing: 3px; color: var(--gray); text-transform: uppercase; }
        .scroll-line { width: 1px; height: 60px; background: linear-gradient(to bottom, var(--acid), transparent); animation: scrollDrop 2s ease-in-out infinite; }
        @keyframes scrollDrop { 0% { transform: scaleY(0); transform-origin: top; } 50% { transform: scaleY(1); transform-origin: top; } 51% { transform: scaleY(1); transform-origin: bottom; } 100% { transform: scaleY(0); transform-origin: bottom; } }
        .marquee-section { border-top: 1px solid rgba(255,255,255,0.06); border-bottom: 1px solid rgba(255,255,255,0.06); padding: 20px 0; overflow: hidden; background: var(--mid); }
        .marquee-track { display: flex; gap: 60px; animation: marquee 20s linear infinite; white-space: nowrap; }
        .marquee-item { font-family: 'Bebas Neue', sans-serif; font-size: 18px; letter-spacing: 4px; color: var(--gray); display: flex; align-items: center; gap: 20px; flex-shrink: 0; }
        .marquee-dot { width: 6px; height: 6px; background: var(--acid); border-radius: 50%; }
        @keyframes marquee { from { transform: translateX(0); } to { transform: translateX(-50%); } }
        .stats-section { padding: 120px 48px; display: grid; grid-template-columns: repeat(3, 1fr); gap: 1px; background: rgba(255,255,255,0.06); }
        .stat-card { background: var(--dark); padding: 60px 48px; position: relative; overflow: hidden; opacity: 0; transform: translateY(30px); transition: all 0.6s ease; }
        .stat-card.visible { opacity: 1; transform: translateY(0); }
        .stat-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px; background: linear-gradient(90deg, var(--acid), transparent); transform: scaleX(0); transform-origin: left; transition: transform 0.6s ease; }
        .stat-card.visible::before { transform: scaleX(1); }
        .stat-number { font-family: 'Bebas Neue', sans-serif; font-size: 80px; color: var(--acid); line-height: 1; margin-bottom: 8px; }
        .stat-label { font-size: 13px; color: var(--gray); letter-spacing: 2px; text-transform: uppercase; }
        .features-section { padding: 120px 48px; }
        .section-label { font-family: 'Space Mono', monospace; font-size: 10px; color: var(--acid); letter-spacing: 4px; text-transform: uppercase; margin-bottom: 16px; }
        .section-title { font-family: 'Bebas Neue', sans-serif; font-size: clamp(48px, 6vw, 80px); line-height: 1; margin-bottom: 80px; }
        .features-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 2px; background: rgba(255,255,255,0.04); }
        .feature-card { background: var(--dark); padding: 48px 40px; position: relative; overflow: hidden; opacity: 0; transform: translateY(20px); transition: all 0.5s ease; }
        .feature-card.visible { opacity: 1; transform: translateY(0); }
        .feature-card:hover { background: #0f0f0f; }
        .feature-card:hover .feature-icon { color: var(--acid); transform: scale(1.1); }
        .feature-icon { font-size: 32px; color: var(--gray); margin-bottom: 24px; display: block; transition: all 0.3s; }
        .feature-title { font-family: 'Bebas Neue', sans-serif; font-size: 28px; letter-spacing: 1px; margin-bottom: 12px; }
        .feature-desc { font-size: 14px; color: var(--gray); line-height: 1.7; }
        .feature-num { position: absolute; top: 24px; right: 24px; font-family: 'Space Mono', monospace; font-size: 11px; color: rgba(255,255,255,0.1); letter-spacing: 2px; }
        .cta-section { margin: 0 48px 120px; background: var(--acid); border-radius: 24px; padding: 80px; display: flex; justify-content: space-between; align-items: center; position: relative; overflow: hidden; opacity: 0; transform: translateY(30px); transition: all 0.7s ease; }
        .cta-section.visible { opacity: 1; transform: translateY(0); }
        .cta-section::before { content: 'RF'; position: absolute; right: -20px; bottom: -60px; font-family: 'Bebas Neue', sans-serif; font-size: 280px; color: rgba(0,0,0,0.08); line-height: 1; pointer-events: none; }
        .cta-title { font-family: 'Bebas Neue', sans-serif; font-size: clamp(40px, 5vw, 64px); color: var(--dark); line-height: 1; }
        .btn-dark { background: var(--dark); color: var(--acid); font-weight: 700; font-size: 13px; letter-spacing: 1.5px; text-transform: uppercase; text-decoration: none; padding: 20px 40px; border-radius: 100px; display: inline-flex; align-items: center; gap: 10px; transition: all 0.25s; flex-shrink: 0; }
        .btn-dark:hover { transform: scale(1.05); box-shadow: 0 20px 40px rgba(0,0,0,0.3); }
        .cities-section { padding: 0 48px 120px; }
        .cities-grid { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 40px; }
        .city-tag { border: 1px solid rgba(255,255,255,0.1); color: var(--gray); font-size: 13px; letter-spacing: 2px; text-transform: uppercase; padding: 12px 24px; border-radius: 100px; opacity: 0; transform: scale(0.9); transition: opacity 0.4s ease, transform 0.4s ease, border-color 0.2s, color 0.2s; }
        .city-tag.visible { opacity: 1; transform: scale(1); }
        .city-tag:hover { border-color: var(--acid); color: var(--acid); }
        footer { border-top: 1px solid rgba(255,255,255,0.06); padding: 48px; display: grid; grid-template-columns: 1fr auto 1fr; align-items: center; gap: 24px; }
        .footer-logo { font-family: 'Bebas Neue', sans-serif; font-size: 22px; letter-spacing: 3px; color: var(--gray); }
        .footer-logo span { color: var(--acid); }
        .footer-center { text-align: center; }
        .footer-center p { font-size: 12px; color: rgba(255,255,255,0.2); letter-spacing: 1px; }
        .footer-links { display: flex; justify-content: flex-end; gap: 24px; }
        .footer-link { font-size: 11px; color: rgba(255,255,255,0.3); text-decoration: none; letter-spacing: 1px; text-transform: uppercase; transition: color 0.2s; }
        .footer-link:hover { color: var(--acid); }
        @keyframes revealUp { to { opacity: 1; transform: translateY(0); } }
        @media (max-width: 768px) {
            nav { padding: 20px 24px; }
            .nav-links .nav-link { display: none; }
            #hero { padding: 0 24px 60px; }
            .hero-bottom { flex-direction: column; align-items: flex-start; gap: 32px; }
            .stats-section { grid-template-columns: 1fr; padding: 60px 24px; }
            .features-section { padding: 80px 24px; }
            .features-grid { grid-template-columns: 1fr; }
            .cta-section { margin: 0 24px 80px; padding: 48px 32px; flex-direction: column; gap: 32px; }
            .cities-section { padding: 0 24px 80px; }
            footer { padding: 32px 24px; grid-template-columns: 1fr; text-align: center; }
            .footer-links { justify-content: center; }
        }
    </style>
</head>
<body>

<nav>
    <a href="{{ route('home') }}" class="nav-logo">Resa<span>Fit</span></a>
    <div class="nav-links">
        <a href="#features" class="nav-link">Services</a>
        <a href="#cities" class="nav-link">Salles</a>
        <a href="/login" class="nav-link">Connexion</a>
        <a href="/register" class="nav-cta">
            <i class="fa-solid fa-rocket" style="font-size:11px"></i> Commencer
        </a>
    </div>
</nav>

<section id="hero">
    <canvas id="particle-canvas"></canvas>
    <div class="hero-grid"></div>
    <div class="hero-orb"></div>
    <div class="hero-content">
        <p class="hero-eyebrow">
            <i class="fa-solid fa-bolt" style="margin-right:8px"></i>
            Plateforme de réservation fitness #1
        </p>
        <h1 class="hero-title">
            Repousse<br>
            <span class="outline">tes</span>
            <span class="accent"> limites</span>
        </h1>
        <div class="hero-bottom">
            <p class="hero-desc">
                Réservez vos cours de sport en quelques secondes. Accédez à toutes les salles partenaires avec votre QR code personnel.
            </p>
            <div class="hero-actions">
                <a href="/register" class="btn-primary">
                    <i class="fa-solid fa-arrow-right"></i> S'inscrire gratuitement
                </a>
                <a href="/login" class="btn-ghost">
                    Connexion <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="scroll-hint">
        <span>Scroll</span>
        <div class="scroll-line"></div>
    </div>
</section>

<div class="marquee-section">
    <div class="marquee-track">
        <div class="marquee-item"><div class="marquee-dot"></div> YOGA</div>
        <div class="marquee-item"><div class="marquee-dot"></div> CROSSFIT</div>
        <div class="marquee-item"><div class="marquee-dot"></div> PILATES</div>
        <div class="marquee-item"><div class="marquee-dot"></div> MUSCULATION</div>
        <div class="marquee-item"><div class="marquee-dot"></div> CARDIO</div>
        <div class="marquee-item"><div class="marquee-dot"></div> BOXE</div>
        <div class="marquee-item"><div class="marquee-dot"></div> NATATION</div>
        <div class="marquee-item"><div class="marquee-dot"></div> SPINNING</div>
        <div class="marquee-item"><div class="marquee-dot"></div> YOGA</div>
        <div class="marquee-item"><div class="marquee-dot"></div> CROSSFIT</div>
        <div class="marquee-item"><div class="marquee-dot"></div> PILATES</div>
        <div class="marquee-item"><div class="marquee-dot"></div> MUSCULATION</div>
        <div class="marquee-item"><div class="marquee-dot"></div> CARDIO</div>
        <div class="marquee-item"><div class="marquee-dot"></div> BOXE</div>
        <div class="marquee-item"><div class="marquee-dot"></div> NATATION</div>
        <div class="marquee-item"><div class="marquee-dot"></div> SPINNING</div>
    </div>
</div>

<div class="stats-section">
    <div class="stat-card">
        <div class="stat-number" data-count="12000">0</div>
        <div class="stat-label">Membres actifs</div>
    </div>
    <div class="stat-card" style="transition-delay:0.1s">
        <div class="stat-number" data-count="340">0</div>
        <div class="stat-label">Salles partenaires</div>
    </div>
    <div class="stat-card" style="transition-delay:0.2s">
        <div class="stat-number" data-count="98">0</div>
        <div class="stat-label">% de satisfaction</div>
    </div>
</div>

<section class="features-section" id="features">
    <p class="section-label">Pourquoi ResaFit</p>
    <h2 class="section-title">Tout ce dont<br>vous avez besoin</h2>
    <div class="features-grid">
        <div class="feature-card">
            <span class="feature-num">01</span>
            <i class="fa-solid fa-earth-americas feature-icon"></i>
            <div class="feature-title">Accès Mondial</div>
            <p class="feature-desc">Accédez à plus de 340 salles partenaires dans 28 pays. Un seul abonnement, un accès illimité.</p>
        </div>
        <div class="feature-card" style="transition-delay:0.1s">
            <span class="feature-num">02</span>
            <i class="fa-solid fa-bolt feature-icon"></i>
            <div class="feature-title">Réservation Instantanée</div>
            <p class="feature-desc">Réservez un cours en moins de 10 secondes. Confirmation immédiate, zéro paperasse.</p>
        </div>
        <div class="feature-card" style="transition-delay:0.2s">
            <span class="feature-num">03</span>
            <i class="fa-solid fa-qrcode feature-icon"></i>
            <div class="feature-title">QR Code d'Accès</div>
            <p class="feature-desc">Votre badge numérique personnel. Générez un QR sécurisé valable 5 minutes pour entrer en salle.</p>
        </div>
        <div class="feature-card" style="transition-delay:0.15s">
            <span class="feature-num">04</span>
            <i class="fa-solid fa-shield-halved feature-icon"></i>
            <div class="feature-title">Sécurité Totale</div>
            <p class="feature-desc">Données chiffrées, tokens à usage unique, accès contrôlé. Votre sécurité est notre priorité.</p>
        </div>
        <div class="feature-card" style="transition-delay:0.25s">
            <span class="feature-num">05</span>
            <i class="fa-solid fa-chart-line feature-icon"></i>
            <div class="feature-title">Suivi en Temps Réel</div>
            <p class="feature-desc">Consultez vos réservations, votre historique d'accès et vos statistiques sportives en direct.</p>
        </div>
        <div class="feature-card" style="transition-delay:0.35s">
            <span class="feature-num">06</span>
            <i class="fa-solid fa-bell feature-icon"></i>
            <div class="feature-title">Notifications</div>
            <p class="feature-desc">Rappels automatiques avant vos cours, confirmations instantanées et alertes de disponibilité.</p>
        </div>
    </div>
</section>

<div class="cta-section">
    <div>
        <div class="cta-title">Prêt à commencer<br>votre parcours ?</div>
        <p style="color:rgba(8,8,8,0.5); margin-top:12px; font-size:14px;">Inscription gratuite • Aucune carte requise</p>
    </div>
    <a href="/register" class="btn-dark">
        <i class="fa-solid fa-rocket"></i> Créer mon compte
    </a>
</div>

<section class="cities-section" id="cities">
    <p class="section-label">Présence mondiale</p>
    <h2 class="section-title">Nos salles<br>partenaires</h2>
    <div class="cities-grid">
        @foreach(['Paris', 'Lyon', 'Marseille', 'Londres', 'Berlin', 'Madrid', 'New York', 'Montréal', 'Dakar', 'Dubai', 'Tokyo', 'Barcelone'] as $city)
            <div class="city-tag">
                <i class="fa-solid fa-location-dot" style="margin-right:8px; opacity:0.5"></i>{{ $city }}
            </div>
        @endforeach
    </div>
</section>

<footer>
    <div class="footer-logo">Resa<span>Fit</span></div>
    <div class="footer-center">
        <p>© {{ date('Y') }} ResaFit — Tous droits réservés</p>
        <p style="margin-top:6px; font-size:11px; letter-spacing:2px;">SPORT • PERFORMANCE • LIBERTÉ</p>
    </div>
    <div class="footer-links">
        <a href="{{ route('mentions-legales') }}" class="footer-link">Mentions légales</a>
        <a href="{{ route('confidentialite') }}" class="footer-link">Confidentialité</a>
        <a href="{{ route('cgu') }}" class="footer-link">CGU</a>
    </div>
</footer>

<script>
    const canvas = document.getElementById('particle-canvas');
    const ctx = canvas.getContext('2d');
    let W, H, particles = [];
    function resize() { W = canvas.width = window.innerWidth; H = canvas.height = window.innerHeight; }
    resize();
    window.addEventListener('resize', () => { resize(); initParticles(); });
    function initParticles() {
        particles = [];
        const count = Math.floor(W * H / 14000);
        for (let i = 0; i < count; i++) {
            particles.push({ x: Math.random() * W, y: Math.random() * H, r: Math.random() * 1.5 + 0.3, vx: (Math.random() - 0.5) * 0.3, vy: (Math.random() - 0.5) * 0.3, opacity: Math.random() * 0.5 + 0.1 });
        }
    }
    initParticles();
    function drawParticles() {
        ctx.clearRect(0, 0, W, H);
        particles.forEach(p => {
            p.x += p.vx; p.y += p.vy;
            if (p.x < 0) p.x = W; if (p.x > W) p.x = 0;
            if (p.y < 0) p.y = H; if (p.y > H) p.y = 0;
            particles.forEach(p2 => {
                const dx = p.x - p2.x, dy = p.y - p2.y, dist = Math.sqrt(dx*dx + dy*dy);
                if (dist < 120) { ctx.beginPath(); ctx.strokeStyle = `rgba(200,241,53,${0.06*(1-dist/120)})`; ctx.lineWidth = 0.5; ctx.moveTo(p.x, p.y); ctx.lineTo(p2.x, p2.y); ctx.stroke(); }
            });
            ctx.beginPath(); ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2); ctx.fillStyle = `rgba(200,241,53,${p.opacity})`; ctx.fill();
        });
        requestAnimationFrame(drawParticles);
    }
    drawParticles();
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => { if (entry.isIntersecting) setTimeout(() => entry.target.classList.add('visible'), parseFloat(entry.target.style.transitionDelay || '0') * 1000); });
    }, { threshold: 0.1 });
    document.querySelectorAll('.stat-card, .feature-card, .cta-section, .city-tag').forEach(el => observer.observe(el));
    document.querySelectorAll('.city-tag').forEach((tag, i) => { tag.style.transitionDelay = (i * 0.05) + 's'; });
    function countUp(el, target, duration = 2000) {
        let start = 0; const step = target / (duration / 16);
        const timer = setInterval(() => { start += step; if (start >= target) { el.textContent = target.toLocaleString('fr'); clearInterval(timer); } else el.textContent = Math.floor(start).toLocaleString('fr'); }, 16);
    }
    const countObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => { if (entry.isIntersecting) { countUp(entry.target, parseInt(entry.target.dataset.count)); countObserver.unobserve(entry.target); } });
    }, { threshold: 0.5 });
    document.querySelectorAll('[data-count]').forEach(el => countObserver.observe(el));
    window.addEventListener('scroll', () => {
        const y = window.scrollY;
        document.querySelector('.hero-orb').style.transform = `translateY(${y * 0.3}px)`;
        document.querySelector('.hero-grid').style.transform = `translateY(${y * 0.1}px)`;
        document.querySelector('nav').style.padding = y > 60 ? '16px 48px' : '24px 48px';
    });
</script>
</body>
</html>
