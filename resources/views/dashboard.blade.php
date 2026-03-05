<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard ResaFit</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-black min-h-screen text-white">

<!-- Sidebar + Content Layout -->
<div class="flex">

    <!-- =========================
    SIDEBAR MODERNE
    ========================= -->

    <div class="w-64 h-screen bg-white/10 backdrop-blur-xl border-r border-white/10 p-6 hidden md:block">

        <h2 class="text-2xl font-bold mb-10">💪 ResaFit</h2>

        <ul class="space-y-4">

            <li>
                <a href="#" class="hover:text-purple-400 transition">🏠 Dashboard</a>
            </li>

            <li>
                <a href="#" class="hover:text-purple-400 transition">👥 Utilisateurs</a>
            </li>

            <li>
                <a href="#" class="hover:text-purple-400 transition">🏋️ Cours</a>
            </li>

            <li>
                <a href="#" class="hover:text-purple-400 transition">📅 Réservations</a>
            </li>

        </ul>

    </div>

    <!-- =========================
    MAIN CONTENT
    ========================= -->

    <div class="flex-1 p-8">

        <h1 class="text-4xl font-extrabold mb-8">
            Bienvenue dans ResaFit Dashboard 🚀
        </h1>

        <!-- Cards Stats -->
        <div class="grid md:grid-cols-4 gap-6">

            <div class="bg-white/10 backdrop-blur-xl p-6 rounded-2xl shadow-xl hover:scale-105 transition">
                <h3 class="text-gray-300">👤 Utilisateurs</h3>
                <p class="text-3xl font-bold mt-2">{{ $users ?? 0 }}</p>
            </div>

            <div class="bg-white/10 backdrop-blur-xl p-6 rounded-2xl shadow-xl hover:scale-105 transition">
                <h3 class="text-gray-300">🏋️ Cours</h3>
                <p class="text-3xl font-bold mt-2">{{ $courses ?? 0 }}</p>
            </div>

            <div class="bg-white/10 backdrop-blur-xl p-6 rounded-2xl shadow-xl hover:scale-105 transition">
                <h3 class="text-gray-300">📅 Réservations</h3>
                <p class="text-3xl font-bold mt-2">{{ $reservations ?? 0 }}</p>
            </div>

            <div class="bg-white/10 backdrop-blur-xl p-6 rounded-2xl shadow-xl hover:scale-105 transition">
                <h3 class="text-gray-300">🏢 Gyms</h3>
                <p class="text-3xl font-bold mt-2">{{ $gyms ?? 0 }}</p>
            </div>

        </div>

    </div>

</div>

</body>
</html>
