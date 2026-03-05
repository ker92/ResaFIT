@extends('layouts.app')

@section('content')

    <div class="max-w-7xl mx-auto px-6 py-10">

        <!-- Header -->
        <div class="flex justify-between items-center mb-12">
            <h1 class="text-4xl font-extrabold text-purple-400">
                <i class="fa-solid fa-chart-line mr-3"></i>Dashboard Admin
            </h1>
            <span class="text-gray-400">
            <i class="fa-solid fa-user-shield mr-2"></i>{{ auth()->user()->name }}
        </span>
        </div>

        <!-- STATS -->
        <div class="grid md:grid-cols-4 gap-6 mb-14">
            <div class="bg-white/5 backdrop-blur-xl border border-white/10 p-6 rounded-2xl text-center">
                <i class="fa-solid fa-clock text-yellow-400 text-3xl mb-3"></i>
                <p class="text-3xl font-bold">{{ $pendingReservations->count() }}</p>
                <p class="text-gray-400 text-sm">En attente</p>
            </div>
            <div class="bg-white/5 backdrop-blur-xl border border-white/10 p-6 rounded-2xl text-center">
                <i class="fa-solid fa-dumbbell text-purple-400 text-3xl mb-3"></i>
                <p class="text-3xl font-bold">{{ $courses->count() }}</p>
                <p class="text-gray-400 text-sm">Cours</p>
            </div>
            <div class="bg-white/5 backdrop-blur-xl border border-white/10 p-6 rounded-2xl text-center">
                <i class="fa-solid fa-users text-blue-400 text-3xl mb-3"></i>
                <p class="text-3xl font-bold">{{ $users->count() }}</p>
                <p class="text-gray-400 text-sm">Utilisateurs</p>
            </div>
            <div class="bg-white/5 backdrop-blur-xl border border-white/10 p-6 rounded-2xl text-center">
                <i class="fa-solid fa-building text-green-400 text-3xl mb-3"></i>
                <p class="text-3xl font-bold">{{ $gyms->count() }}</p>
                <p class="text-gray-400 text-sm">Salles</p>
            </div>
        </div>

        <!-- RESERVATIONS EN ATTENTE -->
        <div class="mb-16">
            <h2 class="text-2xl font-bold mb-6 text-purple-300">
                <i class="fa-solid fa-hourglass-half mr-2"></i>Réservations en attente
            </h2>

            @forelse($pendingReservations as $reservation)
                <div class="bg-white/5 border border-white/10 rounded-2xl p-5 mb-4 flex justify-between items-center">
                    <div class="space-y-1">
                        <p class="font-semibold flex items-center gap-2">
                            <i class="fa-solid fa-user text-blue-400"></i>
                            {{ optional($reservation->user)->name ?? 'Utilisateur supprimé' }}
                        </p>
                        <p class="text-gray-300 text-sm flex items-center gap-2">
                            <i class="fa-solid fa-fire text-orange-400"></i>
                            {{ optional($reservation->course)->nom ?? 'Cours supprimé' }}
                            @if($reservation->course)
                                — {{ optional($reservation->course->gym)->nom }}
                            @endif
                        </p>
                        <p class="text-gray-400 text-sm flex items-center gap-2">
                            <i class="fa-solid fa-calendar"></i>
                            {{ $reservation->date_reservation->format('d/m/Y') }}
                            à {{ $reservation->heure_reservation }}
                        </p>
                        <p class="text-gray-400 text-sm flex items-center gap-2">
                            <i class="fa-solid fa-tag"></i>
                            {{ ucfirst($reservation->type_cours) }} — {{ $reservation->lieu }}
                        </p>
                    </div>

                    <div class="flex gap-3">
                        <!-- Valider via POST -->
                        <form method="POST" action="{{ route('admin.reservation.validate', $reservation->id) }}">
                            @csrf
                            <button type="submit"
                                    class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded-xl text-sm font-semibold transition">
                                <i class="fa-solid fa-check mr-1"></i>Valider
                            </button>
                        </form>

                        <!-- Refuser via POST -->
                        <form method="POST" action="{{ route('admin.reservation.reject', $reservation->id) }}">
                            @csrf
                            <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-xl text-sm font-semibold transition">
                                <i class="fa-solid fa-xmark mr-1"></i>Refuser
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-400 text-center py-8">
                    <i class="fa-solid fa-circle-check text-green-400 text-3xl mb-2 block"></i>
                    Aucune réservation en attente.
                </p>
            @endforelse
        </div>

        <!-- COURS -->
        <div class="mb-16">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-purple-300">
                    <i class="fa-solid fa-dumbbell mr-2"></i>Gestion des cours
                </h2>
                <a href="{{ route('admin.courses.create') }}"
                   class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded-xl text-sm font-semibold transition">
                    <i class="fa-solid fa-plus mr-1"></i>Ajouter un cours
                </a>
            </div>

            @forelse($courses as $course)
                <div class="bg-white/5 border border-white/10 rounded-2xl p-5 mb-4 flex justify-between items-center">
                    <div>
                        <p class="font-semibold">{{ $course->nom }}</p>
                        <p class="text-gray-400 text-sm">
                            <i class="fa-solid fa-building mr-1"></i>{{ optional($course->gym)->nom }}
                            &nbsp;•&nbsp;
                            <i class="fa-solid fa-calendar mr-1"></i>{{ $course->date_heure->format('d/m/Y à H:i') }}
                        </p>
                        <p class="text-gray-400 text-sm">
                            <i class="fa-solid fa-users mr-1"></i>
                            {{ $course->places_reservees }} / {{ $course->places_max }} places
                        </p>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('admin.courses.edit', $course->id) }}"
                           class="bg-blue-600 hover:bg-blue-700 px-3 py-2 rounded-xl text-sm transition">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <form method="POST" action="{{ route('admin.courses.destroy', $course->id) }}"
                              onsubmit="return confirm('Supprimer ce cours ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 px-3 py-2 rounded-xl text-sm transition">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-400">Aucun cours créé.</p>
            @endforelse
        </div>

        <!-- UTILISATEURS -->
        <div>
            <h2 class="text-2xl font-bold mb-6 text-purple-300">
                <i class="fa-solid fa-users mr-2"></i>Gestion des utilisateurs
            </h2>

            @forelse($users as $user)
                <div class="bg-white/5 border border-white/10 rounded-2xl p-5 mb-4 flex justify-between items-center">
                    <div>
                        <p class="font-semibold">{{ $user->name }}</p>
                        <p class="text-gray-400 text-sm">{{ $user->email }}</p>
                    </div>
                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}"
                          onsubmit="return confirm('Supprimer cet utilisateur ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-600 hover:bg-red-700 px-3 py-2 rounded-xl text-sm transition">
                            <i class="fa-solid fa-user-minus"></i>
                        </button>
                    </form>
                </div>
            @empty
                <p class="text-gray-400">Aucun utilisateur.</p>
            @endforelse
        </div>

    </div>

@endsection
