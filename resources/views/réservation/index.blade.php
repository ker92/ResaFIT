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

            <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:48px; animation: revealUp 0.6s ease forwards;">
                <div>
                    <p style="font-family:'Space Mono',monospace; font-size:10px; color:#c8f135; letter-spacing:4px; text-transform:uppercase; margin-bottom:12px;">
                        <i class="fa-solid fa-calendar" style="margin-right:6px"></i>Espace membre
                    </p>
                    <h1 style="font-family:'Bebas Neue',sans-serif; font-size:clamp(48px,6vw,80px); line-height:0.95; letter-spacing:-2px;">
                        Mes <span style="color:#c8f135;">réservations</span>
                    </h1>
                </div>
                <a href="{{ route('reservations.create') }}" style="
                background:#c8f135; color:#080808;
                font-family:'DM Sans',sans-serif; font-weight:700; font-size:12px;
                letter-spacing:2px; text-transform:uppercase;
                padding:14px 24px; border-radius:12px;
                display:inline-flex; align-items:center; gap:8px;
                text-decoration:none; transition:all 0.25s; flex-shrink:0;
            " onmouseover="this.style.boxShadow='0 12px 32px rgba(200,241,53,0.35)';this.style.transform='translateY(-2px)'"
                   onmouseout="this.style.boxShadow='none';this.style.transform='translateY(0)'">
                    <i class="fa-solid fa-plus"></i> Nouvelle réservation
                </a>
            </div>

            @forelse($reservations as $reservation)
                <div style="
                background: rgba(255,255,255,0.03);
                border: 1px solid rgba(255,255,255,0.08);
                border-radius: 20px;
                padding: 24px 28px;
                margin-bottom: 10px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 20px;
                transition: all 0.25s;
                backdrop-filter: blur(12px);
            " onmouseover="this.style.borderColor='rgba(200,241,53,0.2)';this.style.background='rgba(200,241,53,0.02)'"
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.08)';this.style.background='rgba(255,255,255,0.03)'">

                    <div style="display:flex; align-items:center; gap:18px; flex:1; min-width:0;">
                        <div style="width:48px; height:48px; border-radius:12px; background:rgba(200,241,53,0.08); border:1px solid rgba(200,241,53,0.15); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <i class="fa-solid fa-dumbbell" style="font-size:18px; color:#c8f135;"></i>
                        </div>

                        <div>
                            <div style="font-size:15px; font-weight:500; margin-bottom:6px;">
                                {{ optional($reservation->course)->nom ?? 'Sans cours assigné' }}
                            </div>
                            <div style="display:flex; flex-wrap:wrap; gap:14px;">
                                @if(optional(optional($reservation->course)->gym)->nom)
                                    <span style="font-size:12px; color:#888; display:flex; align-items:center; gap:5px;">
                                    <i class="fa-solid fa-building" style="color:rgba(200,241,53,0.4); font-size:10px;"></i>
                                    {{ $reservation->course->gym->nom }}
                                </span>
                                @endif
                                <span style="font-size:12px; color:#888; display:flex; align-items:center; gap:5px;">
                                <i class="fa-solid fa-calendar" style="color:rgba(200,241,53,0.4); font-size:10px;"></i>
                                {{ $reservation->date_reservation->format('d/m/Y') }} à {{ $reservation->heure_reservation }}
                            </span>
                                <span style="font-size:12px; color:#888; display:flex; align-items:center; gap:5px;">
                                <i class="fa-solid fa-tag" style="color:rgba(200,241,53,0.4); font-size:10px;"></i>
                                {{ ucfirst($reservation->type_cours) }}
                            </span>
                                <span style="font-size:12px; color:#888; display:flex; align-items:center; gap:5px;">
                                <i class="fa-solid fa-location-dot" style="color:rgba(200,241,53,0.4); font-size:10px;"></i>
                                {{ $reservation->lieu }}
                            </span>
                            </div>
                        </div>
                    </div>

                    <div style="display:flex; align-items:center; gap:10px; flex-shrink:0;">

                        @if($reservation->status === 'approved')
                            <div style="display:inline-flex; align-items:center; gap:6px; background:rgba(200,241,53,0.08); border:1px solid rgba(200,241,53,0.25); border-radius:8px; padding:6px 12px; font-size:11px; color:#c8f135; font-family:'Space Mono',monospace;">
                                <i class="fa-solid fa-check" style="font-size:9px;"></i> Validée
                            </div>
                        @elseif($reservation->status === 'rejected')
                            <div style="display:inline-flex; align-items:center; gap:6px; background:rgba(239,68,68,0.08); border:1px solid rgba(239,68,68,0.25); border-radius:8px; padding:6px 12px; font-size:11px; color:#f87171; font-family:'Space Mono',monospace;">
                                <i class="fa-solid fa-xmark" style="font-size:9px;"></i> Refusée
                            </div>
                        @else
                            <div style="display:inline-flex; align-items:center; gap:6px; background:rgba(251,191,36,0.08); border:1px solid rgba(251,191,36,0.25); border-radius:8px; padding:6px 12px; font-size:11px; color:#fbbf24; font-family:'Space Mono',monospace;">
                                <i class="fa-solid fa-hourglass-half" style="font-size:9px;"></i> En attente
                            </div>
                        @endif

                        @if($reservation->status === 'pending')
                            <form method="POST" action="{{ route('reservations.destroy', $reservation->id) }}"
                                  onsubmit="return confirm('Annuler cette réservation ?')">
                                @csrf @method('DELETE')
                                <button type="submit" style="
                                background:rgba(239,68,68,0.06); border:1px solid rgba(239,68,68,0.2);
                                color:#f87171; width:38px; height:38px; border-radius:10px;
                                cursor:pointer; display:flex; align-items:center; justify-content:center;
                                transition:all 0.2s; font-size:13px;
                            " onmouseover="this.style.background='rgba(239,68,68,0.14)'"
                                        onmouseout="this.style.background='rgba(239,68,68,0.06)'">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

            @empty
                <div style="text-align:center; padding:80px 40px; background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.06); border-radius:20px;">
                    <i class="fa-solid fa-calendar-xmark" style="font-size:40px; color:rgba(200,241,53,0.3); margin-bottom:16px; display:block;"></i>
                    <p style="font-family:'Bebas Neue',sans-serif; font-size:28px; margin-bottom:8px;">Aucune réservation</p>
                    <p style="font-size:14px; color:#888; margin-bottom:28px;">Vous n'avez pas encore effectué de réservation.</p>
                    <a href="{{ route('user.dashboard') }}" style="background:#c8f135; color:#080808; font-family:'DM Sans',sans-serif; font-weight:700; font-size:12px; letter-spacing:2px; text-transform:uppercase; padding:14px 24px; border-radius:12px; text-decoration:none; display:inline-flex; align-items:center; gap:8px;">
                        <i class="fa-solid fa-arrow-left"></i> Retour au dashboard
                    </a>
                </div>
            @endforelse

            @if($reservations->count() > 0)
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
