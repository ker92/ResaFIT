@extends('layouts.app')

@section('content')

    <div class="max-w-4xl mx-auto px-6 py-10">

        <div class="flex justify-between items-center mb-10">
            <h1 class="text-3xl font-bold text-purple-400">
                <i class="fa-solid fa-calendar-check mr-2"></i>Mes réservations
            </h1>
            <a href="{{ route('reservations.create') }}"
               class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded-xl text-sm font-semibold transition">
                <i class="fa-solid fa-plus mr-1"></i>Nouvelle réservation
            </a>
        </div>

        @forelse($reservations as $reservation)
            <div class="bg-white/5 border border-white/10 rounded-2xl p-5 mb-4 flex justify-between items-center">
                <div class="space-y-1">
                    <p class="font-semibold">
                        {{ optional($reservation->course)->nom ?? 'Cours supprimé' }}
                    </p>
                    <p class="text-gray-400 text-sm">
                        <i class="fa-solid fa-building mr-1"></i>
                        {{ optional(optional($reservation->course)->gym)->nom ?? '—' }}
                    </p>
                    <p class="text-gray-400 text-sm">
                        <i class="fa-solid fa-calendar mr-1"></i>
                        {{ $reservation->date_reservation->format('d/m/Y') }}
                        à {{ $reservation->heure_reservation }}
                    </p>
                    <p class="text-gray-400 text-sm">
                        <i class="fa-solid fa-tag mr-1"></i>
                        {{ ucfirst($reservation->type_cours) }}
                        &nbsp;•&nbsp;
                        <i class="fa-solid fa-location-dot mr-1"></i>
                        {{ $reservation->lieu }}
                    </p>
                </div>

                <div class="flex items-center gap-4">
                    @if($reservation->status === 'approved')
                        <span class="bg-green-600/20 border border-green-500 text-green-400
                                 px-3 py-1 rounded-full text-xs font-semibold">
                        <i class="fa-solid fa-check mr-1"></i>Validée
                    </span>
                    @elseif($reservation->status === 'rejected')
                        <span class="bg-red-600/20 border border-red-500 text-red-400
                                 px-3 py-1 rounded-full text-xs font-semibold">
                        <i class="fa-solid fa-xmark mr-1"></i>Refusée
                    </span>
                    @else
                        <span class="bg-yellow-600/20 border border-yellow-500 text-yellow-400
                                 px-3 py-1 rounded-full text-xs font-semibold">
                        <i class="fa-solid fa-hourglass mr-1"></i>En attente
                    </span>
                    @endif

                    @if($reservation->status === 'pending')
                        <form method="POST"
                              action="{{ route('reservations.destroy', $reservation->id) }}"
                              onsubmit="return confirm('Annuler cette réservation ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 px-3 py-2 rounded-xl text-sm transition">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    @endif
                </div>
            </div>

        @empty
            <div class="text-center py-20 text-gray-400">
                <i class="fa-solid fa-calendar-xmark text-5xl mb-5 block"></i>
                <p class="text-xl mb-4">Vous n'avez aucune réservation.</p>
                <a href="{{ route('courses.index') }}"
                   class="bg-purple-600 hover:bg-purple-700 px-6 py-3 rounded-xl font-semibold transition">
                    Voir les cours disponibles
                </a>
            </div>
        @endforelse

    </div>

@endsection
