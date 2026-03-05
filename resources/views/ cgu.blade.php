@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto px-6 py-20">

        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-purple-400 transition text-sm mb-10">
            <i class="fa-solid fa-arrow-left"></i> Retour à l'accueil
        </a>

        <h1 class="text-4xl font-bold text-purple-400 mb-2">Conditions Générales d'Utilisation</h1>
        <p class="text-gray-500 text-sm mb-12">Dernière mise à jour : {{ date('d/m/Y') }}</p>

        <div class="space-y-10 text-gray-300 leading-relaxed">

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">1. Objet</h2>
                <p>Les présentes Conditions Générales d'Utilisation (CGU) régissent l'accès et l'utilisation de la plateforme ResaFit, accessible à l'adresse <strong class="text-purple-400">resafit.com</strong>, éditée par ResaFit SAS.</p>
                <p class="mt-2">En créant un compte, vous acceptez sans réserve les présentes CGU.</p>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">2. Accès au service</h2>
                <p>L'accès à ResaFit est réservé aux personnes physiques majeures (18 ans ou plus). L'inscription est gratuite. Certaines fonctionnalités peuvent nécessiter un abonnement payant.</p>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">3. Compte utilisateur</h2>
                <p>Vous êtes responsable de la confidentialité de vos identifiants de connexion. Toute activité effectuée depuis votre compte est sous votre responsabilité. En cas de compromission, contactez-nous immédiatement à <strong class="text-purple-400">support@resafit.com</strong>.</p>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">4. Réservations</h2>
                <ul class="space-y-2 text-gray-400 list-disc list-inside">
                    <li>Les réservations sont soumises à validation par un administrateur.</li>
                    <li>Une réservation validée génère un QR code d'accès valable 5 minutes.</li>
                    <li>Toute réservation en attente peut être annulée par l'utilisateur avant validation.</li>
                    <li>Une réservation validée ne peut pas être annulée en ligne — contacter la salle directement.</li>
                    <li>ResaFit se réserve le droit de refuser toute réservation sans justification.</li>
                </ul>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">5. QR Code d'accès</h2>
                <p>Le QR code généré est strictement personnel et non transférable. Il est valide pendant 5 minutes à compter de sa génération. Tout usage frauduleux ou tentative de contournement entraînera la suspension immédiate du compte.</p>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">6. Comportement attendu</h2>
                <p>En utilisant ResaFit, vous vous engagez à :</p>
                <ul class="mt-3 space-y-1 text-gray-400 list-disc list-inside">
                    <li>Ne pas tenter de contourner les systèmes de sécurité</li>
                    <li>Ne pas usurper l'identité d'un autre utilisateur</li>
                    <li>Respecter le règlement intérieur des salles partenaires</li>
                    <li>Ne pas utiliser la plateforme à des fins illicites</li>
                </ul>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">7. Suspension et résiliation</h2>
                <p>ResaFit se réserve le droit de suspendre ou supprimer tout compte en cas de violation des présentes CGU, sans préavis ni indemnité. L'utilisateur peut supprimer son compte à tout moment en contactant <strong class="text-purple-400">support@resafit.com</strong>.</p>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">8. Limitation de responsabilité</h2>
                <p>ResaFit ne saurait être tenu responsable des dommages résultant d'une indisponibilité temporaire du service, d'une fermeture d'une salle partenaire, ou d'un usage inapproprié de la plateforme par l'utilisateur.</p>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">9. Modification des CGU</h2>
                <p>ResaFit se réserve le droit de modifier les présentes CGU à tout moment. Les utilisateurs seront informés par email en cas de modification substantielle. La poursuite de l'utilisation du service après notification vaut acceptation des nouvelles conditions.</p>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">10. Droit applicable</h2>
                <p>Les présentes CGU sont soumises au droit français. Tout litige sera porté devant les tribunaux compétents de Paris.</p>
            </section>

        </div>
    </div>
@endsection
