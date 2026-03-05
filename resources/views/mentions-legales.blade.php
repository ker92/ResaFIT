@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto px-6 py-20">

        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-purple-400 transition text-sm mb-10">
            <i class="fa-solid fa-arrow-left"></i> Retour à l'accueil
        </a>

        <h1 class="text-4xl font-bold text-purple-400 mb-2">Mentions légales</h1>
        <p class="text-gray-500 text-sm mb-12">Dernière mise à jour : {{ date('d/m/Y') }}</p>

        <div class="space-y-10 text-gray-300 leading-relaxed">

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">1. Éditeur du site</h2>
                <p>Le site <strong class="text-purple-400">ResaFit</strong> est édité par :</p>
                <ul class="mt-3 space-y-1 text-gray-400">
                    <li><strong>Raison sociale :</strong> ResaFit SAS</li>
                    <li><strong>Siège social :</strong> 12 rue du Sport, 75001 Paris, France</li>
                    <li><strong>Capital social :</strong> 10 000 €</li>
                    <li><strong>SIRET :</strong> 123 456 789 00012</li>
                    <li><strong>RCS :</strong> Paris B 123 456 789</li>
                    <li><strong>Email :</strong> contact@resafit.com</li>
                    <li><strong>Téléphone :</strong> +33 1 23 45 67 89</li>
                </ul>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">2. Directeur de la publication</h2>
                <p>Le directeur de la publication est <strong>M. Jean Dupont</strong>, en qualité de Président de ResaFit SAS.</p>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">3. Hébergement</h2>
                <p>Le site est hébergé par :</p>
                <ul class="mt-3 space-y-1 text-gray-400">
                    <li><strong>Hébergeur :</strong> OVH SAS</li>
                    <li><strong>Adresse :</strong> 2 rue Kellermann, 59100 Roubaix, France</li>
                    <li><strong>Site web :</strong> www.ovh.com</li>
                </ul>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">4. Propriété intellectuelle</h2>
                <p>L'ensemble du contenu présent sur le site ResaFit (textes, images, logos, icônes, vidéos, sons, logiciels) est protégé par le droit d'auteur et la propriété intellectuelle. Toute reproduction, même partielle, est interdite sans autorisation préalable écrite de ResaFit SAS.</p>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">5. Responsabilité</h2>
                <p>ResaFit s'efforce de fournir des informations exactes et à jour. Toutefois, ResaFit ne saurait être tenu responsable des erreurs ou omissions présentes sur le site, ni des dommages directs ou indirects résultant de l'utilisation de ces informations.</p>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">6. Données personnelles</h2>
                <p>Les données personnelles collectées via le site ResaFit sont traitées conformément à notre <a href="{{ route('confidentialite') }}" class="text-purple-400 hover:underline">Politique de confidentialité</a> et au Règlement Général sur la Protection des Données (RGPD).</p>
                <p class="mt-2">Pour exercer vos droits (accès, rectification, suppression), contactez-nous à : <strong class="text-purple-400">privacy@resafit.com</strong></p>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">7. Cookies</h2>
                <p>Le site ResaFit utilise des cookies techniques nécessaires au bon fonctionnement de la plateforme (sessions d'authentification). Aucun cookie publicitaire ou de tracking tiers n'est utilisé sans votre consentement.</p>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-white mb-3">8. Droit applicable</h2>
                <p>Les présentes mentions légales sont régies par le droit français. Tout litige relatif à l'utilisation du site sera soumis à la compétence exclusive des tribunaux français.</p>
            </section>

        </div>
    </div>
@endsection
