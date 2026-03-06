@extends('layouts.app')

@section('content')

    <div style="
    min-height: 100vh;
    background: #080808;
    position: relative;
    font-family: 'DM Sans', sans-serif;
    color: #f0f0f0;
">
        <div style="position:absolute; inset:0; background-image:url('data:image/svg+xml,%3Csvg viewBox=\'0 0 256 256\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cfilter id=\'n\'%3E%3CfeTurbulence type=\'fractalNoise\' baseFrequency=\'0.9\' numOctaves=\'4\'/%3E%3C/filter%3E%3Crect width=\'100%25\' height=\'100%25\' filter=\'url(%23n)\' opacity=\'0.025\'/%3E%3C/svg%3E'); z-index:0; pointer-events:none;"></div>

        <div style="position:relative; z-index:1; padding: 60px 48px; max-width:1000px; margin:0 auto;">


            <div style="margin-bottom:48px; animation: revealUp 0.6s ease forwards;">
                <p style="font-family:'Space Mono',monospace; font-size:10px; color:#c8f135; letter-spacing:4px; text-transform:uppercase; margin-bottom:12px;">
                    <i class="fa-solid fa-circle-check" style="margin-right:6px"></i>Mes cours validés
                </p>
                <h1 style="font-family:'Bebas Neue',sans-serif; font-size:clamp(48px,6vw,80px); line-height:0.95; letter-spacing:-2px; margin-bottom:14px;">
                    Mes <span style="color:#c8f135;">cours</span>
                </h1>
                <p style="font-size:15px; color:rgba(240,240,240,0.5);">
                    Les cours approuvés! prêts à rejoindre.
                </p>
            </div>

            @forelse($coursValides as $reservation)
                <div style="
                background: rgba(255,255,255,0.03);
                border: 1px solid rgba(255,255,255,0.08);
                border-radius: 20px;
                padding: 28px 32px;
                margin-bottom: 12px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 20px;
                transition: all 0.25s;
                animation: revealUp 0.5s ease forwards;
                backdrop-filter: blur(12px);
            " onmouseover="this.style.borderColor='rgba(200,241,53,0.25)';this.style.background='rgba(200,241,53,0.03)'"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.08)';this.style.background='rgba(255,255,255,0.03)'">

                    <div style="display:flex; align-items:center; gap:20px; flex:1; min-width:0;">
                        <div style="width:52px; height:52px; border-radius:14px; background:rgba(200,241,53,0.1); border:1px solid rgba(200,241,53,0.2); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <i class="fa-solid fa-dumbbell" style="font-size:20px; color:#c8f135;"></i>
                        </div>

                        <div>
                            <div style="font-family:'Bebas Neue',sans-serif; font-size:22px; letter-spacing:0.5px; margin-bottom:6px;">
                                {{ ucfirst($reservation->type_cours) }}
                                @if($reservation->course)
                                    — {{ $reservation->course->nom }}
                                @endif
                            </div>
                            <div style="display:flex; flex-wrap:wrap; gap:16px;">
                            <span style="font-size:12px; color:#888; display:flex; align-items:center; gap:6px;">
                                <i class="fa-solid fa-calendar" style="color:rgba(200,241,53,0.4); font-size:11px;"></i>
                                {{ $reservation->date_reservation->format('d/m/Y') }}
                            </span>
                                <span style="font-size:12px; color:#888; display:flex; align-items:center; gap:6px;">
                                <i class="fa-solid fa-clock" style="color:rgba(200,241,53,0.4); font-size:11px;"></i>
                                {{ $reservation->heure_reservation }}
                            </span>
                                <span style="font-size:12px; color:#888; display:flex; align-items:center; gap:6px;">
                                <i class="fa-solid fa-location-dot" style="color:rgba(200,241,53,0.4); font-size:11px;"></i>
                                {{ $reservation->lieu }}
                            </span>
                            </div>
                        </div>
                    </div>

                    <div style="display:inline-flex; align-items:center; gap:6px; background:rgba(200,241,53,0.08); border:1px solid rgba(200,241,53,0.25); border-radius:8px; padding:6px 14px; font-size:11px; color:#c8f135; font-family:'Space Mono',monospace; flex-shrink:0;">
                        <i class="fa-solid fa-check" style="font-size:10px;"></i>
                        Validé
                    </div>
                </div>

            @empty
                <div style="text-align:center; padding:80px 40px; background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.06); border-radius:20px;">
                    <i class="fa-solid fa-hourglass-half" style="font-size:40px; color:rgba(200,241,53,0.3); margin-bottom:16px; display:block;"></i>
                    <p style="font-family:'Bebas Neue',sans-serif; font-size:28px; margin-bottom:8px;">Aucun cours validé</p>
                    <p style="font-size:14px; color:#888; margin-bottom:28px;">Vos réservations sont en attente .</p>
                    <a href="{{ route('user.dashboard') }}" style="background:#c8f135; color:#080808; font-family:'DM Sans',sans-serif; font-weight:700; font-size:12px; letter-spacing:2px; text-transform:uppercase; padding:14px 24px; border-radius:12px; text-decoration:none; display:inline-flex; align-items:center; gap:8px;">
                        <i class="fa-solid fa-arrow-left"></i> Retour au dashboard
                    </a>
                </div>
            @endforelse

            @if($coursValides->count() > 0)
                <div style="margin-top:32px;">
                    <a href="{{ route('user.dashboard') }}" style="color:#888; font-size:13px; text-decoration:none; display:inline-flex; align-items:center; gap:8px; transition:color 0.2s;"
                       onmouseover="this.style.color='#c8f135'"
                       onmouseout="this.style.color='#888'">
                        <i class="fa-solid fa-arrow-left"></i> Retour au dashboard
                    </a>
                </div>
            @endif

        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500;700&family=Space+Mono&display=swap');
        @keyframes revealUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>

@endsection
