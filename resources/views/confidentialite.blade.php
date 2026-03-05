@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto px-6 py-20">

        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-purple-400 transition text-sm mb-10">
            <i class="fa-solid fa-arrow-left"></i> Retour à l'accueil
        </a>

        <h1 class="text-4xl font-bold text-purple-400 mb-2">Politique de confidentialité</h1>
        <p class="text-gray-500 text-sm mb-12">Dernière mise à jour : {{ date('d/m/Y') }}</p>

        <div class="space-y-10 text-gray-300 leading-relaxed">

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">1. Responsable du traitement</h2>
                <p>ResaFit SAS, 12 rue du Sport, 75001 Paris — <strong class="text-purple-400">privacy@resafit.com</strong></p>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">2. Données collectées</h2>
                <p>Dans le cadre de votre utilisation de ResaFit, nous collectons les données suivantes :</p>
                <ul class="mt-3 space-y-1 text-gray-400 list-disc list-inside">
                    <li>Nom et prénom</li>
                    <li>Adresse email</li>
                    <li>Mot de passe (chiffré, non lisible)</li>
                    <li>Historique de réservations</li>
                    <li>Logs d'accès aux salles (horodatage, salle, token QR)</li>
                </ul>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">3. Finalités du traitement</h2>
                <p>Vos données sont utilisées pour :</p>
                <ul class="mt-3 space-y-1 text-gray-400 list-disc list-inside">
                    <li>Créer et gérer votre compte utilisateur</li>
                    <li>Gérer vos réservations de cours</li>
                    <li>Générer et valider vos QR codes d'accès</li>
                    <li>Vous envoyer des confirmations et notifications par email</li>
                    <li>Assurer la sécurité des accès aux salles partenaires</li>
                </ul>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">4. Base légale</h2>
                <p>Le traitement de vos données est fondé sur l'exécution du contrat (article 6.1.b du RGPD) entre vous et ResaFit lors de votre inscription.</p>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">5. Durée de conservation</h2>
                <ul class="mt-3 space-y-1 text-gray-400 list-disc list-inside">
                    <li>Données de compte : jusqu'à suppression du compte + 1 an</li>
                    <li>Logs d'accès : 12 mois glissants</li>
                    <li>Données de réservation : 3 ans (obligation légale)</li>
                </ul>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">6. Partage des données</h2>
                <p>Vos données ne sont jamais vendues à des tiers. Elles peuvent être transmises aux salles partenaires dans le seul but de valider votre accès physique (token QR anonymisé).</p>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">7. Vos droits</h2>
                <p>Conformément au RGPD, vous disposez des droits suivants :</p>
                <ul class="mt-3 space-y-1 text-gray-400 list-disc list-inside">
                    <li><strong>Accès</strong> : obtenir une copie de vos données</li>
                    <li><strong>Rectification</strong> : corriger des données inexactes</li>
                    <li><strong>Suppression</strong> : demander l'effacement de vos données</li>
                    <li><strong>Portabilité</strong> : recevoir vos données dans un format structuré</li>
                    <li><strong>Opposition</strong> : vous opposer à certains traitements</li>
                </ul>
                <p class="mt-3">Pour exercer ces droits : <strong class="text-purple-400">privacy@resafit.com</strong></p>
                <p class="mt-2 text-sm text-gray-500">En cas de désaccord, vous pouvez saisir la CNIL (www.cnil.fr).</p>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">8. Sécurité</h2>
                <p>Nous mettons en œuvre des mesures techniques et organisationnelles appropriées pour protéger vos données : chiffrement des mots de passe (bcrypt), tokens d'accès à durée limitée (5 minutes), connexions sécurisées (HTTPS).</p>
            </section>

        </div>
    </div>
@endsection
