@extends('layouts.app')

@section('content')

    <!-- ===== MODAL RESERVATION ===== -->

    <div id="reservationModal"
         class="fixed inset-0 bg-black/80 backdrop-blur-xl flex items-center justify-center hidden z-50">

        <div class="bg-white/10 border border-white/20 p-8 rounded-3xl w-full max-w-lg text-white shadow-2xl">

            <h2 class="text-2xl mb-6 font-bold text-purple-400 flex items-center gap-3">
                <i class="fa-solid fa-calendar-check"></i>
                Nouvelle réservation fitness
            </h2>

            <form method="POST" action="{{ route('reservations.store') }}" class="space-y-5">

                @csrf



                <!-- Type cours -->

                <div class="space-y-2">

                    <label class="text-gray-300 text-sm flex items-center gap-2">
                        <i class="fa-solid fa-layer-group text-purple-400"></i>
                        Type de cours
                    </label>

                    <select name="type_cours" required
                            class="w-full bg-black/40 border border-white/20 p-3 rounded-xl
                   focus:ring-2 focus:ring-purple-500 outline-none">

                        <option value="" disabled selected>-- Choisir type cours --</option>
                        <option value="collectif">Collectif</option>
                        <option value="individuel">Individuel</option>

                    </select>

                </div>

                <!-- Date -->
                <div>
                    <label class="text-gray-300 text-sm">Date réservation</label>

                    <input type="date" name="date_reservation" required
                           class="w-full bg-white/20 border border-white/30 p-3 rounded-xl">
                </div>

                <!-- Heure -->
                <div>
                    <label class="text-gray-300 text-sm">Heure réservation</label>

                    <input type="time" name="heure_reservation" required
                           class="w-full bg-white/20 border border-white/30 p-3 rounded-xl">
                </div>

                <!-- Lieu -->
                <div>
                    <label class="text-gray-300 text-sm">Lieu</label>

                    <input type="text" name="lieu"
                           placeholder="Salle / Studio / Gym..."
                           required
                           class="w-full bg-white/20 border border-white/30 p-3 rounded-xl">
                </div>

                <button type="submit"
                        class="w-full bg-gradient-to-r from-purple-600 to-purple-800 hover:scale-105 transition p-3 rounded-xl font-semibold">

                    <i class="fa-solid fa-paper-plane"></i>
                    Envoyer la réservation

                </button>

            </form>

            <button onclick="closeModal()"
                    class="mt-4 w-full bg-red-600 hover:bg-red-700 p-2 rounded-xl">
                Fermer
            </button>

        </div>
    </div>

    <!-- ===== DASHBOARD ===== -->

    <div class="relative min-h-screen bg-gradient-to-br from-black via-gray-900 to-black text-white overflow-hidden">

        <div class="relative z-10 p-10 max-w-7xl mx-auto">

            <!-- Header -->
            <div class="mb-12">

                <h2 class="text-4xl font-bold flex items-center gap-3 text-purple-400">
                    <i class="fa-solid fa-user"></i>
                    Bienvenue sur ton espace fitness
                </h2>

                <p class="text-gray-400 flex items-center gap-2 text-lg mt-2">
                    <i class="fa-solid fa-dumbbell"></i>
                    Gère tes réservations et ton accès salle
                </p>
            </div>

            <!-- Cards -->
            <div class="grid md:grid-cols-3 gap-10">

                <!-- Voir cours -->
                <div class="group bg-white/5 backdrop-blur-xl border border-white/10 p-8 rounded-3xl shadow-2xl text-center hover:scale-105 transition">

                    <i class="fa-solid fa-calendar-check text-purple-400 text-5xl mb-6"></i>

                    <h3 class="text-2xl mb-4 font-semibold">
                        Réserver un cours
                    </h3>

                    <p class="text-gray-400 mb-6 text-sm">
                        Choisis un cours disponible
                    </p>

                    <a href="{{ route('courses.index') }}"
                       class="bg-gradient-to-r from-purple-600 to-purple-800 px-6 py-3 rounded-xl inline-flex gap-2 items-center font-semibold">

                        <i class="fa-solid fa-list"></i>
                        Voir les cours

                    </a>

                </div>

                <!-- Réservation modal -->
                <div class="group bg-white/5 backdrop-blur-xl border border-white/10 p-8 rounded-3xl shadow-2xl text-center hover:scale-105 transition">

                    <i class="fa-solid fa-list-check text-blue-400 text-5xl mb-6"></i>

                    <h3 class="text-2xl mb-4 font-semibold">
                        Réserver maintenant
                    </h3>

                    <button onclick="openModal()"
                            class="bg-gradient-to-r from-blue-600 to-blue-800 px-6 py-3 rounded-xl inline-flex gap-2 items-center font-semibold">

                        <i class="fa-solid fa-calendar-plus"></i>
                        Réserver un cours
                    </button>

                </div>

                <!-- QR -->
                <div class="group bg-white/5 backdrop-blur-xl border border-white/10 p-8 rounded-3xl shadow-2xl text-center hover:scale-105 transition">

                    <i class="fa-solid fa-qrcode text-green-400 text-5xl mb-6"></i>

                    <h3 class="text-2xl mb-4 font-semibold">
                        Mon QR Accès
                    </h3>

                    <p class="text-gray-400 mb-6 text-sm">
                        QR personnel pour accéder à la salle
                    </p>

                    <a href="{{ route('user.qr.generate') }}"
                       class="bg-gradient-to-r from-green-600 to-green-800 px-6 py-3 rounded-xl inline-flex gap-2 items-center font-semibold">

                        <i class="fa-solid fa-eye"></i>
                        Afficher QR

                    </a>

                </div>

            </div>

        </div>
    </div>

    <script>
        function openModal(){
            document.getElementById('reservationModal').classList.remove('hidden');
        }

        function closeModal(){
            document.getElementById('reservationModal').classList.add('hidden');
        }
    </script>

@endsection
