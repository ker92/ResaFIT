<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResaFit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500&family=Space+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root { --acid: #c8f135; --dark: #080808; --mid: #111111; --light: #f0f0f0; --gray: #888; --border: rgba(255,255,255,0.07); }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background: var(--dark); color: var(--light); font-family: 'DM Sans', sans-serif; min-height: 100vh; }
        body::before { content: ''; position: fixed; inset: 0; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.03'/%3E%3C/svg%3E"); pointer-events: none; z-index: 0; }

        .topbar { position: fixed; top: 0; left: 0; right: 0; z-index: 50; background: rgba(8,8,8,0.95); backdrop-filter: blur(20px); border-bottom: 1px solid var(--border); padding: 0 48px; height: 64px; display: flex; justify-content: space-between; align-items: center; }
        .topbar-logo { font-family: 'Bebas Neue', sans-serif; font-size: 24px; letter-spacing: 3px; color: var(--light); text-decoration: none; }
        .topbar-logo span { color: var(--acid); }
        .topbar-nav { display: flex; align-items: center; gap: 4px; }
        .nav-link { color: var(--gray); text-decoration: none; font-size: 12px; font-weight: 500; letter-spacing: 1px; text-transform: uppercase; padding: 8px 16px; border-radius: 8px; transition: all 0.2s; display: flex; align-items: center; gap: 7px; }
        .nav-link:hover { color: var(--light); background: rgba(255,255,255,0.06); }
        .nav-link i { font-size: 11px; color: rgba(200,241,53,0.5); }
        .nav-sep { width: 1px; height: 20px; background: var(--border); margin: 0 8px; }
        .nav-user { font-family: 'Space Mono', monospace; font-size: 11px; color: var(--gray); display: flex; align-items: center; gap: 8px; padding: 0 12px; }
        .nav-dot { width: 7px; height: 7px; background: var(--acid); border-radius: 50%; animation: pulse 2s infinite; flex-shrink: 0; }
        @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.3; } }
        .btn-logout { background: none; border: 1px solid rgba(255,255,255,0.1); color: var(--gray); font-size: 11px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase; padding: 8px 14px; border-radius: 8px; cursor: pointer; font-family: 'DM Sans', sans-serif; transition: all 0.2s; display: flex; align-items: center; gap: 7px; margin-left: 8px; }
        .btn-logout:hover { border-color: rgba(239,68,68,0.4); color: #f87171; }
        .btn-logout i { font-size: 11px; }

        .page-wrapper { padding-top: 64px; position: relative; z-index: 1; }

        .flash-wrap { max-width: 1300px; margin: 0 auto; padding: 24px 48px 0; }
        .flash { padding: 14px 18px; border-radius: 12px; margin-bottom: 12px; font-size: 13px; display: flex; align-items: center; gap: 10px; }
        .flash-success { background: rgba(200,241,53,0.06); border: 1px solid rgba(200,241,53,0.2); color: var(--acid); }
        .flash-error { background: rgba(239,68,68,0.06); border: 1px solid rgba(239,68,68,0.2); color: #f87171; }
        .flash-errors { background: rgba(239,68,68,0.06); border: 1px solid rgba(239,68,68,0.2); color: #f87171; padding: 14px 18px; border-radius: 12px; margin-bottom: 12px; font-size: 13px; }
        .flash-errors ul { list-style: none; display: flex; flex-direction: column; gap: 4px; }
        .flash-errors ul li::before { content: '— '; color: rgba(248,113,113,0.5); }

        @media (max-width: 768px) {
            .topbar { padding: 0 20px; }
            .nav-link span { display: none; }
            .flash-wrap { padding: 16px 20px 0; }
        }
    </style>
</head>
<body>

<nav class="topbar">
    <a href="{{ route('home') }}" class="topbar-logo">Resa<span>Fit</span></a>

    <div class="topbar-nav">
        @auth
            @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="fa-solid fa-chart-line"></i><span>Dashboard</span>
                </a>
            @else
                <a href="{{ route('user.dashboard') }}" class="nav-link">
                    <i class="fa-solid fa-house"></i><span>Accueil</span>
                </a>
                <a href="{{ route('courses.index') }}" class="nav-link">
                    <i class="fa-solid fa-dumbbell"></i><span>Cours</span>
                </a>
                <a href="{{ route('reservations.index') }}" class="nav-link">
                    <i class="fa-solid fa-calendar"></i><span>Réservations</span>
                </a>
            @endif

            <div class="nav-sep"></div>
            <span class="nav-user"><span class="nav-dot"></span>{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="fa-solid fa-right-from-bracket"></i><span>Déconnexion</span>
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="nav-link">
                <i class="fa-solid fa-right-to-bracket"></i><span>Connexion</span>
            </a>
            <a href="{{ route('register') }}" class="nav-link" style="background: var(--acid); color: var(--dark); font-weight:700;">
                <i class="fa-solid fa-rocket" style="color:var(--dark)"></i><span>S'inscrire</span>
            </a>
        @endauth
    </div>
</nav>

<div class="page-wrapper">
    <div class="flash-wrap">
        @if(session('success'))
            <div class="flash flash-success">
                <i class="fa-solid fa-circle-check"></i>{{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="flash flash-error">
                <i class="fa-solid fa-circle-xmark"></i>{{ session('error') }}
            </div>
        @endif
        @if($errors->any())
            <div class="flash-errors">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    @yield('content')
</div>

</body>
</html>
