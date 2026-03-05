<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - ResaFit</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-900 via-purple-900 to-gray-900
             flex items-center justify-center px-4">

<div class="w-full max-w-md">

    <div class="bg-white/10 backdrop-blur-xl border border-white/20 p-8 rounded-3xl shadow-2xl text-white">

        <div class="text-center mb-8">
            <i class="fa-solid fa-dumbbell text-purple-400 text-4xl mb-3"></i>
            <h1 class="text-3xl font-extrabold">ResaFit</h1>
            <p class="text-gray-400 text-sm mt-1">Connectez-vous à votre espace</p>
        </div>

        @if(session('success'))
            <div class="bg-green-600/20 border border-green-500 text-green-300 px-4 py-3 rounded-xl mb-5 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-600/20 border border-red-500 text-red-300 px-4 py-3 rounded-xl mb-5 text-sm">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="/login" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm text-gray-300 mb-1">
                    <i class="fa-solid fa-envelope mr-1 text-purple-400"></i>Email
                </label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full bg-white/10 border border-white/20 p-3 rounded-xl
                              focus:ring-2 focus:ring-purple-500 outline-none text-white">
            </div>

            <div>
                <label class="block text-sm text-gray-300 mb-1">
                    <i class="fa-solid fa-lock mr-1 text-purple-400"></i>Mot de passe
                </label>
                <input type="password" name="password" required
                       class="w-full bg-white/10 border border-white/20 p-3 rounded-xl
                              focus:ring-2 focus:ring-purple-500 outline-none text-white">
            </div>

            <button type="submit"
                    class="w-full bg-gradient-to-r from-purple-600 to-purple-800
                           hover:from-purple-700 hover:to-purple-900 p-3 rounded-xl
                           font-semibold transition duration-300">
                <i class="fa-solid fa-right-to-bracket mr-2"></i>Se connecter
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-gray-400 space-y-2">
            <p>
                <a href="{{ route('password.request') }}" class="text-purple-400 hover:underline">
                    Mot de passe oublié ?
                </a>
            </p>
            <p>
                Pas de compte ?
                <a href="{{ route('register') }}" class="text-purple-400 hover:underline">S'inscrire</a>
            </p>
        </div>

    </div>
</div>

</body>
</html>
