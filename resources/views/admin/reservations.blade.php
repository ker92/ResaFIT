<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation QR - ResaFit</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-900 via-purple-900 to-gray-900
             flex items-center justify-center px-4">

<div class="w-full max-w-md text-center">
    <div class="bg-white/10 backdrop-blur-xl border border-white/20 p-10 rounded-3xl shadow-2xl text-white">

        @if($success)
            <i class="fa-solid fa-circle-check text-green-400 text-6xl mb-6"></i>
            <h1 class="text-3xl font-extrabold text-green-400 mb-3">Accès Autorisé</h1>
            <p class="text-xl text-white mb-2">{{ $message }}</p>
            @if(isset($user))
                <p class="text-gray-400 text-sm">{{ $user->email }}</p>
            @endif
        @else
            <i class="fa-solid fa-circle-xmark text-red-400 text-6xl mb-6"></i>
            <h1 class="text-3xl font-extrabold text-red-400 mb-3">Accès Refusé</h1>
            <p class="text-xl text-white">{{ $message }}</p>
        @endif

        <a href="{{ route('admin.dashboard') }}"
           class="mt-8 inline-block bg-purple-600 hover:bg-purple-700 px-6 py-3 rounded-xl
                  font-semibold transition">
            <i class="fa-solid fa-arrow-left mr-2"></i>Retour au dashboard
        </a>

    </div>
</div>

</body>
</html>
