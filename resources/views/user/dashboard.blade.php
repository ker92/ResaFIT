@extends('layouts.app')

@section('content')

    <div id="reservationModal"
         class="fixed inset-0 z-50"
         style="background: rgba(0,0,0,0.85); backdrop-filter: blur(20px); display:none; align-items:center; justify-content:center;">

        <div style="
        background: #111111;
        border: 1px solid rgba(200,241,53,0.2);
        border-radius: 24px;
        padding: 40px;
        width: 100%;
        max-width: 480px;
        position: relative;
        max-height: 90vh;
        overflow-y: auto;
        animation: modalIn 0.35s cubic-bezier(0.34,1.56,0.64,1) forwards;
    ">
            <button onclick="closeModal()" style="
            position: absolute; top: 20px; right: 20px;
            background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1);
            color: #888; width: 36px; height: 36px; border-radius: 50%;
            cursor: pointer; font-size: 14px; transition: all 0.2s;
        " onmouseover="this.style.color='#c8f135';this.style.borderColor='rgba(200,241,53,0.4)'"
                    onmouseout="this.style.color='#888';this.style.borderColor='rgba(255,255,255,0.1)'">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <p style="font-family:'Space Mono',monospace; font-size:10px; color:#c8f135; letter-spacing:4px; text-transform:uppercase; margin-bottom:10px;">
                <i class="fa-solid fa-bolt" style="margin-right:6px"></i>Nouvelle réservation
            </p>
            <h2 style="font-family:'Bebas Neue',sans-serif; font-size:40px; color:#f0f0f0; line-height:1; margin-bottom:28px; letter-spacing:-1px;">
                Réserver un cours
            </h2>

            @if(session('error'))
                <div style="background:rgba(239,68,68,0.08); border:1px solid rgba(239,68,68,0.3); color:#f87171; padding:12px 16px; border-radius:10px; font-size:13px; margin-bottom:20px; display:flex; align-items:center; gap:8px;">
                    <i class="fa-solid fa-circle-xmark"></i> {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('reservations.store') }}">
                @csrf

                <div style="margin-bottom:18px;">
                    <label style="display:block; font-size:11px; font-weight:500; letter-spacing:2px; text-transform:uppercase; color:#888; margin-bottom:8px;">Type de cours</label>
                    <div style="position:relative;">
                        <i class="fa-solid fa-layer-group" style="position:absolute; left:16px; top:50%; transform:translateY(-50%); color:#888; font-size:13px;"></i>
                        <select name="type_cours" required style="width:100%; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.1); padding:14px 14px 14px 42px; border-radius:12px; color:#f0f0f0; font-family:'DM Sans',sans-serif; font-size:14px; outline:none; appearance:none; cursor:pointer; transition:all 0.2s;"
                                onfocus="this.style.borderColor='#c8f135';this.style.background='rgba(200,241,53,0.04)'"
                                onblur="this.style.borderColor='rgba(255,255,255,0.1)';this.style.background='rgba(255,255,255,0.04)'">
                            <option value="" disabled selected style="background:#111;">-- Choisir type --</option>
                            <option value="collectif" style="background:#111;">Collectif</option>
                            <option value="individuel" style="background:#111;">Individuel</option>
                        </select>
                        <i class="fa-solid fa-chevron-down" style="position:absolute; right:16px; top:50%; transform:translateY(-50%); color:#888; font-size:11px; pointer-events:none;"></i>
                    </div>
                </div>

                <div style="margin-bottom:18px;">
                    <label style="display:block; font-size:11px; font-weight:500; letter-spacing:2px; text-transform:uppercase; color:#888; margin-bottom:8px;">Date</label>
                    <div style="position:relative;">
                        <i class="fa-solid fa-calendar" style="position:absolute; left:16px; top:50%; transform:translateY(-50%); color:#888; font-size:13px;"></i>
                        <input type="date" name="date_reservation" required style="width:100%; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.1); padding:14px 14px 14px 42px; border-radius:12px; color:#f0f0f0; font-family:'DM Sans',sans-serif; font-size:14px; outline:none; transition:all 0.2s; color-scheme:dark;"
                               onfocus="this.style.borderColor='#c8f135';this.style.background='rgba(200,241,53,0.04)'"
                               onblur="this.style.borderColor='rgba(255,255,255,0.1)';this.style.background='rgba(255,255,255,0.04)'">
                    </div>
                </div>

                <div style="margin-bottom:18px;">
                    <label style="display:block; font-size:11px; font-weight:500; letter-spacing:2px; text-transform:uppercase; color:#888; margin-bottom:8px;">Heure</label>
                    <div style="position:relative;">
                        <i class="fa-solid fa-clock" style="position:absolute; left:16px; top:50%; transform:translateY(-50%); color:#888; font-size:13px;"></i>
                        <input type="time" name="heure_reservation" required style="width:100%; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.1); padding:14px 14px 14px 42px; border-radius:12px; color:#f0f0f0; font-family:'DM Sans',sans-serif; font-size:14px; outline:none; transition:all 0.2s; color-scheme:dark;"
                               onfocus="this.style.borderColor='#c8f135';this.style.background='rgba(200,241,53,0.04)'"
                               onblur="this.style.borderColor='rgba(255,255,255,0.1)';this.style.background='rgba(255,255,255,0.04)'">
                    </div>
                </div>

                <div style="margin-bottom:28px;">
                    <label style="display:block; font-size:11px; font-weight:500; letter-spacing:2px; text-transform:uppercase; color:#888; margin-bottom:8px;">Lieu</label>
                    <div style="position:relative;">
                        <i class="fa-solid fa-location-dot" style="position:absolute; left:16px; top:50%; transform:translateY(-50%); color:#888; font-size:13px;"></i>
                        <input type="text" name="lieu" placeholder="Salle / Studio / Gym..." required style="width:100%; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.1); padding:14px 14px 14px 42px; border-radius:12px; color:#f0f0f0; font-family:'DM Sans',sans-serif; font-size:14px; outline:none; transition:all 0.2s;"
                               onfocus="this.style.borderColor='#c8f135';this.style.background='rgba(200,241,53,0.04)'"
                               onblur="this.style.borderColor='rgba(255,255,255,0.1)';this.style.background='rgba(255,255,255,0.04)'">
                    </div>
                </div>

                <button type="submit" style="width:100%; background:#c8f135; color:#080808; font-family:'DM Sans',sans-serif; font-weight:700; font-size:13px; letter-spacing:2px; text-transform:uppercase; padding:17px; border:none; border-radius:12px; cursor:pointer; display:flex; align-items:center; justify-content:center; gap:10px; transition:all 0.25s;"
                        onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 16px 40px rgba(200,241,53,0.3)'"
                        onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">
                    <i class="fa-solid fa-paper-plane"></i>
                    Confirmer la réservation
                </button>
            </form>
        </div>
    </div>

    <div style="
    min-height: 100vh;
    background-image: url('/images/dashboard-user.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    position: relative;
    font-family: 'DM Sans', sans-serif;
    color: #f0f0f0;
">
        <div style="position:absolute; inset:0; background:linear-gradient(135deg, rgba(8,8,8,0.88) 0%, rgba(8,8,8,0.65) 100%); z-index:0;"></div>
        <div style="position:absolute; inset:0; background-image:url('data:image/svg+xml,%3Csvg viewBox=\'0 0 256 256\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cfilter id=\'n\'%3E%3CfeTurbulence type=\'fractalNoise\' baseFrequency=\'0.9\' numOctaves=\'4\'/%3E%3C/filter%3E%3Crect width=\'100%25\' height=\'100%25\' filter=\'url(%23n)\' opacity=\'0.025\'/%3E%3C/svg%3E'); z-index:0; pointer-events:none;"></div>

        <div style="position:relative; z-index:1; padding: 60px 48px; max-width:1200px; margin:0 auto;">

            @if(session('success'))
                <div style="background:rgba(200,241,53,0.08); border:1px solid rgba(200,241,53,0.3); color:#c8f135; padding:14px 18px; border-radius:12px; font-size:13px; margin-bottom:32px; display:flex; align-items:center; gap:10px;">
                    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                </div>
            @endif

            <div style="margin-bottom:56px; animation: revealUp 0.6s ease forwards;">
                <p style="font-family:'Space Mono',monospace; font-size:10px; color:#c8f135; letter-spacing:4px; text-transform:uppercase; margin-bottom:12px;">
                    <i class="fa-solid fa-bolt" style="margin-right:6px"></i>Espace membre
                </p>
                <h1 style="font-family:'Bebas Neue',sans-serif; font-size:clamp(52px,6vw,88px); line-height:0.95; letter-spacing:-2px; margin-bottom:14px;">
                    Bienvenue<br>sur ton <span style="color:#c8f135;">espace</span>
                </h1>
                <p style="font-size:15px; color:rgba(240,240,240,0.55); display:flex; align-items:center; gap:8px;">
                    <i class="fa-solid fa-dumbbell" style="color:#c8f135;"></i>
                    Gère tes réservations et ton accès salle
                </p>
            </div>

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:24px;">
                <div style="background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.08); border-radius:24px; padding:36px 32px; text-align:center; transition:all 0.3s; animation:revealUp 0.6s ease forwards 0.2s; opacity:0; backdrop-filter:blur(12px);"
                     onmouseover="this.style.transform='translateY(-6px)';this.style.borderColor='rgba(200,241,53,0.3)';this.style.background='rgba(200,241,53,0.04)'"
                     onmouseout="this.style.transform='translateY(0)';this.style.borderColor='rgba(255,255,255,0.08)';this.style.background='rgba(255,255,255,0.03)'">
                    <div style="width:72px; height:72px; border-radius:20px; background:rgba(200,241,53,0.1); border:1px solid rgba(200,241,53,0.2); display:flex; align-items:center; justify-content:center; margin:0 auto 24px;">
                        <i class="fa-solid fa-circle-check" style="font-size:28px; color:#c8f135;"></i>
                    </div>
                    <h3 style="font-family:'Bebas Neue',sans-serif; font-size:28px; letter-spacing:0.5px; margin-bottom:10px;">Mes cours</h3>
                    <p style="font-size:13px; color:rgba(240,240,240,0.45); margin-bottom:20px; line-height:1.6;">
                        Consulte les cours validés par l'administrateur et prêts à rejoindre.
                    </p>
                    @if(isset($coursValides) && $coursValides->count() > 0)
                        <div style="display:inline-flex; align-items:center; gap:6px; background:rgba(200,241,53,0.1); border:1px solid rgba(200,241,53,0.25); border-radius:8px; padding:6px 14px; margin-bottom:24px; font-size:12px; color:#c8f135; font-family:'Space Mono',monospace;">
                            <i class="fa-solid fa-bolt" style="font-size:10px;"></i>
                            {{ $coursValides->count() }} cours disponible{{ $coursValides->count() > 1 ? 's' : '' }}
                        </div>
                    @else
                        <div style="display:inline-flex; align-items:center; gap:6px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); border-radius:8px; padding:6px 14px; margin-bottom:24px; font-size:12px; color:#888; font-family:'Space Mono',monospace;">
                            <i class="fa-solid fa-hourglass-half" style="font-size:10px;"></i>
                            En attente de validation
                        </div>
                    @endif
                    <br>
                    <a href="{{ route('user.mes-cours') }}" style="background:#c8f135; color:#080808; font-family:'DM Sans',sans-serif; font-weight:700; font-size:12px; letter-spacing:2px; text-transform:uppercase; padding:14px 24px; border-radius:12px; display:inline-flex; align-items:center; gap:8px; text-decoration:none; transition:all 0.25s;"
                       onmouseover="this.style.boxShadow='0 12px 32px rgba(200,241,53,0.35)';this.style.transform='translateY(-2px)'"
                       onmouseout="this.style.boxShadow='none';this.style.transform='translateY(0)'">
                        <i class="fa-solid fa-list-check"></i> Voir mes cours
                    </a>
                </div>

                <div style="background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.08); border-radius:24px; padding:36px 32px; text-align:center; transition:all 0.3s; animation:revealUp 0.6s ease forwards 0.35s; opacity:0; backdrop-filter:blur(12px);"
                     onmouseover="this.style.transform='translateY(-6px)';this.style.borderColor='rgba(200,241,53,0.3)';this.style.background='rgba(200,241,53,0.04)'"
                     onmouseout="this.style.transform='translateY(0)';this.style.borderColor='rgba(255,255,255,0.08)';this.style.background='rgba(255,255,255,0.03)'">
                    <div style="width:72px; height:72px; border-radius:20px; background:rgba(200,241,53,0.1); border:1px solid rgba(200,241,53,0.2); display:flex; align-items:center; justify-content:center; margin:0 auto 24px;">
                        <i class="fa-solid fa-calendar-plus" style="font-size:28px; color:#c8f135;"></i>
                    </div>
                    <h3 style="font-family:'Bebas Neue',sans-serif; font-size:28px; letter-spacing:0.5px; margin-bottom:10px;">Réserver maintenant</h3>
                    <p style="font-size:13px; color:rgba(240,240,240,0.45); margin-bottom:28px; line-height:1.6;">
                        Crée une réservation rapide pour aujourd'hui ou une date à venir.
                    </p>
                    <button onclick="openModal()" style="background:#c8f135; color:#080808; font-family:'DM Sans',sans-serif; font-weight:700; font-size:12px; letter-spacing:2px; text-transform:uppercase; padding:14px 24px; border-radius:12px; border:none; display:inline-flex; align-items:center; gap:8px; cursor:pointer; transition:all 0.25s;"
                            onmouseover="this.style.boxShadow='0 12px 32px rgba(200,241,53,0.35)';this.style.transform='translateY(-2px)'"
                            onmouseout="this.style.boxShadow='none';this.style.transform='translateY(0)'">
                        <i class="fa-solid fa-bolt"></i> Réserver
                    </button>
                </div>


                <div style="background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.08); border-radius:24px; padding:36px 32px; text-align:center; transition:all 0.3s; animation:revealUp 0.6s ease forwards 0.5s; opacity:0; backdrop-filter:blur(12px);"
                     onmouseover="this.style.transform='translateY(-6px)';this.style.borderColor='rgba(200,241,53,0.3)';this.style.background='rgba(200,241,53,0.04)'"
                     onmouseout="this.style.transform='translateY(0)';this.style.borderColor='rgba(255,255,255,0.08)';this.style.background='rgba(255,255,255,0.03)'">
                    <div style="width:72px; height:72px; border-radius:20px; background:rgba(200,241,53,0.1); border:1px solid rgba(200,241,53,0.2); display:flex; align-items:center; justify-content:center; margin:0 auto 24px;">
                        <i class="fa-solid fa-qrcode" style="font-size:28px; color:#c8f135;"></i>
                    </div>
                    <h3 style="font-family:'Bebas Neue',sans-serif; font-size:28px; letter-spacing:0.5px; margin-bottom:10px;">Mon QR Accès</h3>
                    <p style="font-size:13px; color:rgba(240,240,240,0.45); margin-bottom:28px; line-height:1.6;">
                        Ton QR code personnel pour accéder à toutes les salles affiliées.
                    </p>
                    <a href="{{ route('user.qr.generate') }}" style="background:#c8f135; color:#080808; font-family:'DM Sans',sans-serif; font-weight:700; font-size:12px; letter-spacing:2px; text-transform:uppercase; padding:14px 24px; border-radius:12px; display:inline-flex; align-items:center; gap:8px; text-decoration:none; transition:all 0.25s;"
                       onmouseover="this.style.boxShadow='0 12px 32px rgba(200,241,53,0.35)';this.style.transform='translateY(-2px)'"
                       onmouseout="this.style.boxShadow='none';this.style.transform='translateY(0)'">
                        <i class="fa-solid fa-eye"></i> Afficher QR
                    </a>
                </div>

            </div>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500;700&family=Space+Mono&display=swap');
        @keyframes revealUp { from { opacity:0; transform:translateY(20px); } to { opacity:1; transform:translateY(0); } }
        @keyframes modalIn { from { opacity:0; transform:scale(0.92) translateY(20px); } to { opacity:1; transform:scale(1) translateY(0); } }
    </style>

    <script>
        function openModal() {
            document.getElementById('reservationModal').style.display = 'flex';
        }
        function closeModal() {
            document.getElementById('reservationModal').style.display = 'none';
        }
        document.getElementById('reservationModal').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });
        @if($errors->any() || session('error'))
        document.addEventListener('DOMContentLoaded', () => openModal());
        @endif
    </script>

@endsection
