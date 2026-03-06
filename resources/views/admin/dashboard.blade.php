@extends('layouts.app')

@section('content')
    <style>
        .admin-wrap { max-width: 1300px; margin: 0 auto; padding: 48px; position: relative; z-index: 1; }
        .page-eyebrow { font-family: 'Space Mono', monospace; font-size: 10px; color: var(--acid); letter-spacing: 4px; text-transform: uppercase; margin-bottom: 8px; }
        .page-title { font-family: 'Bebas Neue', sans-serif; font-size: clamp(48px, 6vw, 72px); line-height: 1; letter-spacing: -1px; margin-bottom: 48px; }

        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1px; background: var(--border); margin-bottom: 64px; border-radius: 16px; overflow: hidden; }
        .stat-card { background: var(--mid); padding: 32px 28px; position: relative; overflow: hidden; transition: background 0.2s; }
        .stat-card:hover { background: #141414; }
        .stat-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px; background: linear-gradient(90deg, var(--acid), transparent); transform: scaleX(0); transform-origin: left; transition: transform 0.4s ease; }
        .stat-card:hover::before { transform: scaleX(1); }
        .stat-icon { font-size: 18px; margin-bottom: 20px; }
        .stat-num { font-family: 'Bebas Neue', sans-serif; font-size: 56px; line-height: 1; color: var(--acid); }
        .stat-lbl { font-size: 11px; color: var(--gray); letter-spacing: 2px; text-transform: uppercase; margin-top: 4px; }

        .section { margin-bottom: 60px; }
        .section-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding-bottom: 16px; border-bottom: 1px solid var(--border); }
        .section-title { font-family: 'Bebas Neue', sans-serif; font-size: 28px; letter-spacing: 1px; display: flex; align-items: center; gap: 12px; }
        .section-title i { color: var(--acid); font-size: 18px; }
        .section-count { font-family: 'Space Mono', monospace; font-size: 11px; color: var(--gray); background: rgba(255,255,255,0.05); padding: 3px 10px; border-radius: 20px; }

        .card { background: rgba(17,17,17,0.85); border: 1px solid var(--border); border-radius: 14px; padding: 20px 24px; margin-bottom: 8px; display: flex; justify-content: space-between; align-items: center; gap: 16px; transition: border-color 0.2s, background 0.2s; backdrop-filter: blur(8px); }
        .card:hover { border-color: rgba(255,255,255,0.12); background: rgba(19,19,19,0.9); }
        .card-info { flex: 1; min-width: 0; }
        .card-name { font-size: 15px; font-weight: 500; margin-bottom: 6px; display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
        .card-meta { display: flex; flex-wrap: wrap; gap: 16px; }
        .card-meta-item { font-size: 12px; color: var(--gray); display: flex; align-items: center; gap: 6px; }
        .card-meta-item i { color: rgba(200,241,53,0.4); font-size: 11px; }
        .card-actions { display: flex; gap: 8px; flex-shrink: 0; }

        .badge-pending { font-size: 10px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; padding: 3px 10px; border-radius: 6px; background: rgba(251,191,36,0.1); border: 1px solid rgba(251,191,36,0.3); color: #fbbf24; }

        .btn-validate { background: rgba(200,241,53,0.08); border: 1px solid rgba(200,241,53,0.25); color: var(--acid); font-size: 11px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; padding: 9px 16px; border-radius: 8px; cursor: pointer; font-family: 'DM Sans', sans-serif; display: inline-flex; align-items: center; gap: 6px; transition: all 0.2s; }
        .btn-validate:hover { background: rgba(200,241,53,0.16); }
        .btn-reject { background: rgba(239,68,68,0.06); border: 1px solid rgba(239,68,68,0.2); color: #f87171; font-size: 11px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; padding: 9px 16px; border-radius: 8px; cursor: pointer; font-family: 'DM Sans', sans-serif; display: inline-flex; align-items: center; gap: 6px; transition: all 0.2s; }
        .btn-reject:hover { background: rgba(239,68,68,0.14); }
        .btn-edit { background: rgba(96,165,250,0.06); border: 1px solid rgba(96,165,250,0.2); color: #60a5fa; font-size: 13px; padding: 9px 13px; border-radius: 8px; text-decoration: none; display: inline-flex; align-items: center; transition: all 0.2s; }
        .btn-edit:hover { background: rgba(96,165,250,0.14); }
        .btn-delete { background: rgba(239,68,68,0.06); border: 1px solid rgba(239,68,68,0.2); color: #f87171; font-size: 13px; padding: 9px 13px; border-radius: 8px; cursor: pointer; font-family: 'DM Sans', sans-serif; display: inline-flex; align-items: center; transition: all 0.2s; }
        .btn-delete:hover { background: rgba(239,68,68,0.14); }

        .progress-bar { height: 2px; background: rgba(255,255,255,0.06); border-radius: 2px; margin-top: 10px; overflow: hidden; max-width: 200px; }
        .progress-fill { height: 100%; background: var(--acid); border-radius: 2px; }

        .empty-state { text-align: center; padding: 40px; color: var(--gray); background: rgba(17,17,17,0.85); border: 1px solid var(--border); border-radius: 14px; backdrop-filter: blur(8px); }
        .empty-state i { font-size: 28px; margin-bottom: 10px; display: block; opacity: 0.4; }
        .empty-state p { font-size: 13px; }

        @media (max-width: 1024px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 768px) { .admin-wrap { padding: 24px 20px; } .stats-grid { grid-template-columns: 1fr 1fr; } .card { flex-direction: column; align-items: flex-start; } }
    </style>

    {{-- BACKGROUND --}}
    <div style="position:fixed; inset:0; z-index:0; background-image:url('/images/dashboard-user.jpg'); background-size:cover; background-position:center;"></div>
    <div style="position:fixed; inset:0; z-index:0; background:linear-gradient(135deg, rgba(8,8,8,0.92) 0%, rgba(8,8,8,0.75) 100%);"></div>

    <div class="admin-wrap">

        <p class="page-eyebrow"><i class="fa-solid fa-chart-line" style="margin-right:8px"></i>Administration</p>
        <h1 class="page-title">Dashboard</h1>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-hourglass-half" style="color:#fbbf24"></i></div>
                <div class="stat-num">{{ $pendingReservations->count() }}</div>
                <div class="stat-lbl">En attente</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-dumbbell" style="color:var(--acid)"></i></div>
                <div class="stat-num">{{ $approvedReservations }}</div>
                <div class="stat-lbl">Cours validés</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-users" style="color:#60a5fa"></i></div>
                <div class="stat-num">{{ $users->count() }}</div>
                <div class="stat-lbl">Utilisateurs</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-building" style="color:#34d399"></i></div>
                <div class="stat-num">{{ $gyms->count() }}</div>
                <div class="stat-lbl">Salles</div>
            </div>
        </div>

        <div class="section">
            <div class="section-header">
                <div class="section-title">
                    <i class="fa-solid fa-hourglass-half"></i>
                    Réservations en attente
                    <span class="section-count">{{ $pendingReservations->count() }}</span>
                </div>
            </div>
            @forelse($pendingReservations as $reservation)
                <div class="card">
                    <div class="card-info">
                        <div class="card-name">
                            {{ optional($reservation->user)->name ?? 'Utilisateur supprimé' }}
                            <span class="badge-pending">En attente</span>
                        </div>
                        <div class="card-meta">
                            <span class="card-meta-item">
                                <i class="fa-solid fa-dumbbell"></i>
                                {{ optional($reservation->course)->nom ?? 'Sans cours assigné' }}
                                @if($reservation->course && $reservation->course->gym)
                                    — {{ $reservation->course->gym->nom }}
                                @endif
                            </span>
                            <span class="card-meta-item"><i class="fa-solid fa-calendar"></i>{{ $reservation->date_reservation->format('d/m/Y') }} à {{ $reservation->heure_reservation }}</span>
                            <span class="card-meta-item"><i class="fa-solid fa-tag"></i>{{ ucfirst($reservation->type_cours) }} — {{ $reservation->lieu }}</span>
                        </div>
                    </div>
                    <div class="card-actions">
                        <form method="POST" action="{{ route('admin.reservation.validate', $reservation->id) }}">
                            @csrf
                            <button type="submit" class="btn-validate"><i class="fa-solid fa-check"></i> Valider</button>
                        </form>
                        <form method="POST" action="{{ route('admin.reservation.reject', $reservation->id) }}">
                            @csrf
                            <button type="submit" class="btn-reject"><i class="fa-solid fa-xmark"></i> Refuser</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="fa-solid fa-circle-check" style="color:var(--acid); opacity:0.6"></i>
                    <p>Aucune réservation en attente.</p>
                </div>
            @endforelse
        </div>

        <div class="section">
            <div class="section-header">
                <div class="section-title">
                    <i class="fa-solid fa-dumbbell"></i>
                    Cours
                    <span class="section-count">{{ $courses->count() }}</span>
                </div>
            </div>
            @forelse($courses as $course)
                <div class="card">
                    <div class="card-info">
                        <div class="card-name">{{ $course->nom }}</div>
                        <div class="card-meta">
                            <span class="card-meta-item"><i class="fa-solid fa-building"></i>{{ optional($course->gym)->nom }}</span>
                            <span class="card-meta-item"><i class="fa-solid fa-calendar"></i>{{ $course->date_heure->format('d/m/Y à H:i') }}</span>
                            <span class="card-meta-item"><i class="fa-solid fa-users"></i>{{ $course->places_reservees }} / {{ $course->places_max }} places</span>
                        </div>
                        @if($course->places_max > 0)
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ min(($course->places_reservees / $course->places_max) * 100, 100) }}%"></div>
                            </div>
                        @endif
                    </div>
                    <div class="card-actions">
                        <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn-edit"><i class="fa-solid fa-pen"></i></a>
                        <form method="POST" action="{{ route('admin.courses.destroy', $course->id) }}" onsubmit="return confirm('Supprimer ce cours ?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-delete"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="empty-state"><i class="fa-solid fa-dumbbell"></i><p>Aucun cours créé.</p></div>
            @endforelse
        </div>

        <div class="section">
            <div class="section-header">
                <div class="section-title">
                    <i class="fa-solid fa-users"></i>
                    Utilisateurs
                    <span class="section-count">{{ $users->count() }}</span>
                </div>
            </div>
            @forelse($users as $user)
                <div class="card">
                    <div class="card-info">
                        <div class="card-name">{{ $user->name }}</div>
                        <div class="card-meta">
                            <span class="card-meta-item"><i class="fa-solid fa-envelope"></i>{{ $user->email }}</span>
                            <span class="card-meta-item"><i class="fa-solid fa-calendar"></i>Inscrit le {{ $user->created_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                    <div class="card-actions">
                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" onsubmit="return confirm('Supprimer cet utilisateur ?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-delete"><i class="fa-solid fa-user-minus"></i></button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="empty-state"><i class="fa-solid fa-users"></i><p>Aucun utilisateur.</p></div>
            @endforelse
        </div>

    </div>
@endsection
