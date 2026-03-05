<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>QR Code Accès - ResaFit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative min-h-screen flex items-center justify-center px-4 bg-gray-900">

<div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-purple-900 to-black opacity-90"></div>

<div class="relative z-10 w-full max-w-md">

    <div class="bg-white/10 backdrop-blur-xl border border-white/20
                p-8 rounded-3xl shadow-2xl text-white text-center">

        <h2 class="text-3xl font-extrabold mb-2 tracking-wide">
            Accès Salle
        </h2>

        <p class="text-gray-300 text-sm mb-6">
            Ce QR code est personnel et expire automatiquement après 5 minutes.
        </p>

        <div class="bg-white p-6 rounded-2xl inline-block shadow-xl">
            {!! QrCode::size(260)->generate($qrUrl) !!}
        </div>

        <div class="mt-6 text-xs text-gray-400 space-y-1">
            <p>QR sécurisé • Généré le {{ now()->format('d/m/Y H:i') }}</p>
            <p>Expiration : {{ now()->addMinutes(5)->format('H:i') }}</p>
        </div>

        <a href="{{ route('user.dashboard') }}"
           class="mt-8 inline-block bg-gradient-to-r from-blue-500 to-purple-600
                  px-6 py-3 rounded-xl font-semibold hover:scale-105
                  transition duration-300 shadow-lg">

            Retour au tableau de bord

        </a>

    </div>

</div>

</body>
</html>
