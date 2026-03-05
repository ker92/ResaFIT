@extends('layouts.app')

@section('content')

    <div class="max-w-7xl mx-auto px-6 py-10">

        <div class="flex justify-between items-center mb-10">
            <h1 class="text-4xl font-bold text-purple-400">
                <i class="fa-solid fa-dumbbell mr-3"></i>Cours disponibles
            </h1>
            <a href="{{ route('user.dashboard') }}" class="text-gray-400 hover:text-white transition text-sm">
                <i class="fa-solid fa-arrow-left mr-1"></i>Retour
            </a>
        </div>

        @if($courses->count() > 0)
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($courses as $course)
                    <div class="bg-white/5 backdrop-blur-xl border border-white/10 p-6 rounded-3xl
                            shadow-xl hover:border-purple-500 transition duration-300">

                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-semibold">{{ $course->nom }}</h3>
                            @if($course->estComplet())
                                <span class="bg-red-600/20 border border-red-500 text-red-400
                                         text-xs px-2 py-1 rounded-full">Complet</span>
                            @else
                                <span class="bg-green-600/20 border border-green-500 text-green-400
                                         text-xs px-2 py-1 rounded-full">Disponible</span>
                            @endif
                        </div>

                        <div class="space-y-2 text-sm text-gray-400 mb-5">
                            <p><i class="fa-solid fa-building mr-2 text-purple-400"></i>
                                {{ optional($course->gym)->nom }} — {{ optional($course->gym)->ville }}
                            </p>
                            <p><i class="fa-solid fa-clock mr-2 text-purple-400"></i>
                                {{ $course->date_heure->format('d/m/Y à H:i') }}
                            </p>
                            <p><i class="fa-solid fa-users mr-2 text-purple-400"></i>
                                {{ $course->placesRestantes() }} place(s) restante(s)
                            </p>
                            @if($course->description)
                                <p><i class="fa-solid fa-circle-info mr-2 text-purple-400"></i>
                                    {{ $course->description }}
                                </p>
                            @endif
                        </div>

                        @if(!$course->estComplet())
                            <a href="{{ route('reservations.create', ['course_id' => $course->id]) }}"
                               class="w-full bg-purple-600 hover:bg-purple-700 px-5 py-3 rounded-xl
                                  font-semibold transition flex items-center justify-center gap-2">
                                <i class="fa-solid fa-calendar-plus"></i>Réserver
                            </a>
                        @else
                            <button disabled
                                    class="w-full bg-gray-700 cursor-not-allowed px-5 py-3 rounded-xl
                                       font-semibold text-gray-500">
                                Cours complet
                            </button>
                        @endif

                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20 text-gray-400">
                <i class="fa-solid fa-circle-info text-5xl mb-5 block"></i>
                <p class="text-xl">Aucun cours disponible pour le moment.</p>
            </div>
        @endif

    </div>

@endsection
