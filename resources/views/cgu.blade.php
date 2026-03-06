@extends('layouts.app')

@section('content')

    <div style="position:fixed; inset:0; z-index:0; background-image:url('/images/dashboard-user.jpg'); background-size:cover; background-position:center;"></div>
    <div style="position:fixed; inset:0; z-index:0; background:linear-gradient(135deg, rgba(8,8,8,0.92) 0%, rgba(8,8,8,0.75) 100%);"></div>

    <div style="position:relative; z-index:1; max-width:800px; margin:0 auto; padding:60px 48px; font-family:'DM Sans',sans-serif; color:#f0f0f0;">

        <a href="{{ route('home') }}" style="display:inline-flex;align-items:center;gap:8px;color:#888;font-size:13px;text-decoration:none;margin-bottom:40px;transition:color 0.2s;" onmouseover="this.style.color='#c8f135'" onmouseout="this.style.color='#888'">
            <i class="fa-solid fa-arrow-left"></i> Retour à l'accueil
        </a>

        <p style="font-family:'Space Mono',monospace;font-size:10px;color:#c8f135;letter-spacing:4px;text-transform:uppercase;margin-bottom:12px;">
            <i class="fa-solid fa-file-contract" style="margin-right:6px"></i>Conditions générales
        </p>
        <h1 style="font-family:'Bebas Neue',sans-serif;font-size:clamp(48px,6vw,80px);line-height:0.95;letter-spacing:-2px;margin-bottom:12px;">
            Conditions générales <span style="color:#c8f135;">d'utilisation</span>
        </h1>
        <p style="font-size:13px;color:#888;margin-bottom:56px;font-family:'Space Mono',monospace;">
            Dernière mise à jour : {{ date('d/m/Y') }} — Version 1.0
        </p>

        @php
            $articles = [
                ['num'=>'01','icon'=>'fa-circle-info','title'=>'Objet','content'=>'Les présentes Conditions Générales d\'Utilisation (ci-après « CGU ») ont pour objet de définir les modalités d\'accès et d\'utilisation de la plateforme ResaFit, accessible à l\'adresse <span style="color:#c8f135;">https://resafit.fr</span>, éditée par Keran Nguema Theydert, 57000 Metz, France. En créant un compte et en utilisant les services ResaFit, vous acceptez sans réserve les présentes CGU. Si vous n\'acceptez pas ces conditions, veuillez ne pas utiliser le service.'],
                ['num'=>'02','icon'=>'fa-user-plus','title'=>'Inscription et compte utilisateur','content'=>'L\'accès aux services ResaFit nécessite la création d\'un compte. Vous vous engagez à :
                <ul style="display:flex;flex-direction:column;gap:8px;list-style:none;padding:0;margin-top:12px;">
                    <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span>Fournir des informations exactes, complètes et à jour lors de votre inscription</span></li>
                    <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span>Maintenir la confidentialité de vos identifiants de connexion</span></li>
                    <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span>Ne pas céder, partager ou transférer votre compte à un tiers</span></li>
                    <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span>Informer immédiatement ResaFit de toute utilisation non autorisée de votre compte</span></li>
                </ul>
                <p style="margin-top:12px;">Un compte est strictement personnel. ResaFit se réserve le droit de suspendre ou supprimer tout compte dont les informations seraient inexactes ou frauduleuses.</p>'],
                ['num'=>'03','icon'=>'fa-calendar-check','title'=>'Réservations et accès aux cours','content'=>'Les réservations effectuées via ResaFit sont soumises aux conditions suivantes :
                <ul style="display:flex;flex-direction:column;gap:8px;list-style:none;padding:0;margin-top:12px;">
                    <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span>Toute réservation est soumise à validation par un administrateur ResaFit</span></li>
                    <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span>Une confirmation par email vous est adressée lors de la validation ou du refus</span></li>
                    <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span>Le QR code d\'accès généré est personnel, temporaire (5 minutes) et à usage unique</span></li>
                    <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span>L\'accès à la salle est conditionné au scan du QR code par le personnel autorisé</span></li>
                    <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span>Une réservation en attente peut être annulée par l\'utilisateur avant validation</span></li>
                </ul>'],
                ['num'=>'04','icon'=>'fa-ban','title'=>'Comportements interdits','content'=>'Il est strictement interdit d\'utiliser ResaFit pour :
                <ul style="display:flex;flex-direction:column;gap:8px;list-style:none;padding:0;margin-top:12px;">
                    <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span>Usurper l\'identité d\'un autre utilisateur ou d\'un administrateur</span></li>
                    <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span>Tenter de contourner le système d\'authentification ou les contrôles d\'accès QR</span></li>
                    <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span>Effectuer des réservations frauduleuses ou en série sans intention d\'y assister</span></li>
                    <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span>Reproduire, copier ou exploiter tout ou partie de la plateforme sans autorisation écrite</span></li>
                    <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span>Utiliser des robots, scrapers ou tout outil automatisé pour accéder au service</span></li>
                </ul>'],
                ['num'=>'05','icon'=>'fa-envelope','title'=>'Communications par email','content'=>'En créant un compte ResaFit, vous acceptez de recevoir les emails suivants, nécessaires au fonctionnement du service :
                <ul style="display:flex;flex-direction:column;gap:8px;list-style:none;padding:0;margin-top:12px;">
                    <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span>Confirmation de réservation (validation ou refus par l\'administrateur)</span></li>
                    <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span>Réinitialisation de mot de passe (à votre demande uniquement)</span></li>
                </ul>
                <p style="margin-top:12px;">ResaFit ne vous enverra jamais d\'emails promotionnels, publicitaires ou non sollicités.</p>'],
                ['num'=>'06','icon'=>'fa-gavel','title'=>'Responsabilité','content'=>'ResaFit met tout en œuvre pour assurer la disponibilité et la sécurité du service. Toutefois, ResaFit ne peut être tenu responsable de :
                <ul style="display:flex;flex-direction:column;gap:8px;list-style:none;padding:0;margin-top:12px;">
                    <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span>Toute interruption temporaire du service pour maintenance</span></li>
                    <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span>Tout incident survenu dans une salle partenaire indépendamment du service ResaFit</span></li>
                    <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span>Toute utilisation frauduleuse résultant d\'une négligence de l\'utilisateur (partage d\'identifiants)</span></li>
                </ul>'],
                ['num'=>'07','icon'=>'fa-pen-to-square','title'=>'Modification des CGU','content'=>'ResaFit se réserve le droit de modifier les présentes CGU à tout moment. Les utilisateurs seront informés de toute modification substantielle par email. La poursuite de l\'utilisation du service après notification vaut acceptation des nouvelles conditions.'],
                ['num'=>'08','icon'=>'fa-landmark','title'=>'Droit applicable','content'=>'Les présentes CGU sont soumises au droit français. En cas de litige, et à défaut de résolution amiable, les tribunaux compétents de Metz (57) seront seuls compétents.'],
            ];
        @endphp

        @foreach($articles as $a)
            <div style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px 32px;margin-bottom:12px;backdrop-filter:blur(12px);transition:all 0.25s;" onmouseover="this.style.borderColor='rgba(200,241,53,0.2)';this.style.background='rgba(200,241,53,0.02)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.07)';this.style.background='rgba(255,255,255,0.03)'">
                <div style="display:flex;align-items:center;gap:16px;margin-bottom:18px;">
                    <span style="font-family:'Space Mono',monospace;font-size:11px;color:#c8f135;background:rgba(200,241,53,0.08);border:1px solid rgba(200,241,53,0.2);padding:4px 10px;border-radius:6px;">{{ $a['num'] }}</span>
                    <i class="fa-solid {{ $a['icon'] }}" style="color:rgba(200,241,53,0.5);font-size:14px;"></i>
                    <h2 style="font-family:'Bebas Neue',sans-serif;font-size:22px;letter-spacing:0.5px;">{{ $a['title'] }}</h2>
                </div>
                <div style="font-size:14px;color:#aaa;line-height:1.8;">{!! $a['content'] !!}</div>
            </div>
        @endforeach

        <div style="margin-top:40px;text-align:center;">
            <a href="{{ route('home') }}" style="color:#888;font-size:13px;text-decoration:none;display:inline-flex;align-items:center;gap:8px;transition:color 0.2s;" onmouseover="this.style.color='#c8f135'" onmouseout="this.style.color='#888'">
                <i class="fa-solid fa-arrow-left"></i> Retour à l'accueil
            </a>
        </div>

    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500;700&family=Space+Mono&display=swap');
    </style>

@endsection
