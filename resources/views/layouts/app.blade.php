<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResaFit</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gray-900 text-white min-h-screen">

<!-- NAVBAR -->
<nav class="fixed top-0 w-full bg-black/70 backdrop-blur-xl z-50 border-b border-white/10">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <a href="{{ route('home') }}" class="text-2xl font-bold text-purple-400">
            <i class="fa-solid fa-dumbbell mr-2"></i>ResaFit
        </a>

        <div class="flex items-center gap-6">
            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-purple-400 transition">
                        <i class="fa-solid fa-chart-line mr-1"></i>Admin
                    </a>
                @else
                    <a href="{{ route('user.dashboard') }}" class="hover:text-purple-400 transition">
                        <i class="fa-solid fa-house mr-1"></i>Dashboard
                    </a>
                    <a href="{{ route('courses.index') }}" class="hover:text-purple-400 transition">
                        <i class="fa-solid fa-dumbbell mr-1"></i>Cours
                    </a>
                    <a href="{{ route('reservations.index') }}" class="hover:text-purple-400 transition">
                        <i class="fa-solid fa-calendar mr-1"></i>Mes réservations
                    </a>
                @endif

                <span class="text-gray-400 text-sm">{{ auth()->user()->name }}</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-xl text-sm transition">
                        <i class="fa-solid fa-right-from-bracket mr-1"></i>Déconnexion
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-purple-400 transition">Connexion</a>
                <a href="{{ route('register') }}"
                   class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded-xl transition">
                    Inscription
                </a>
            @endauth
        </div>

    </div>
</nav>

<!-- MESSAGES FLASH -->
<div class="pt-20 px-6">
    @if(session('success'))
        <div class="max-w-7xl mx-auto mb-4 bg-green-600/20 border border-green-500 text-green-300
                    px-5 py-3 rounded-xl flex items-center gap-3">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto mb-4 bg-red-600/20 border border-red-500 text-red-300
                    px-5 py-3 rounded-xl flex items-center gap-3">
            <i class="fa-solid fa-circle-xmark"></i>
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="max-w-7xl mx-auto mb-4 bg-red-600/20 border border-red-500 text-red-300
                    px-5 py-3 rounded-xl">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<!-- CONTENU -->
@yield('content')

</body>
</html>
