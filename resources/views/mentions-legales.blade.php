@extends('layouts.app')

@section('content')

    <div style="position:fixed; inset:0; z-index:0; background-image:url('/images/dashboard-user.jpg'); background-size:cover; background-position:center;"></div>
    <div style="position:fixed; inset:0; z-index:0; background:linear-gradient(135deg, rgba(8,8,8,0.92) 0%, rgba(8,8,8,0.75) 100%);"></div>

    <div style="position:relative; z-index:1; max-width:800px; margin:0 auto; padding:60px 48px; font-family:'DM Sans',sans-serif; color:#f0f0f0;">

        <a href="{{ route('home') }}" style="display:inline-flex;align-items:center;gap:8px;color:#888;font-size:13px;text-decoration:none;margin-bottom:40px;transition:color 0.2s;" onmouseover="this.style.color='#c8f135'" onmouseout="this.style.color='#888'">
            <i class="fa-solid fa-arrow-left"></i> Retour à l'accueil
        </a>

        <p style="font-family:'Space Mono',monospace;font-size:10px;color:#c8f135;letter-spacing:4px;text-transform:uppercase;margin-bottom:12px;">
            <i class="fa-solid fa-balance-scale" style="margin-right:6px"></i>Informations légales
        </p>
        <h1 style="font-family:'Bebas Neue',sans-serif;font-size:clamp(48px,6vw,80px);line-height:0.95;letter-spacing:-2px;margin-bottom:12px;">
            Mentions <span style="color:#c8f135;">légales</span>
        </h1>
        <p style="font-size:13px;color:#888;margin-bottom:56px;font-family:'Space Mono',monospace;">
            Conformément à la loi n° 2004-575 du 21 juin 2004 pour la Confiance dans l'Économie Numérique (LCEN)
        </p>

        <div style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px 32px;margin-bottom:12px;backdrop-filter:blur(12px);transition:all 0.25s;" onmouseover="this.style.borderColor='rgba(200,241,53,0.2)';this.style.background='rgba(200,241,53,0.02)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.07)';this.style.background='rgba(255,255,255,0.03)'">
            <div style="display:flex;align-items:center;gap:16px;margin-bottom:18px;">
                <span style="font-family:'Space Mono',monospace;font-size:11px;color:#c8f135;background:rgba(200,241,53,0.08);border:1px solid rgba(200,241,53,0.2);padding:4px 10px;border-radius:6px;">01</span>
                <i class="fa-solid fa-user-tie" style="color:rgba(200,241,53,0.5);font-size:14px;"></i>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:22px;letter-spacing:0.5px;">Éditeur du site</h2>
            </div>
            <div style="background:rgba(200,241,53,0.04);border:1px solid rgba(200,241,53,0.15);border-radius:12px;padding:20px 24px;font-size:14px;color:#aaa;line-height:2.2;">
                <strong style="color:#f0f0f0;">Keran Nguema Theydert</strong><br>
                Porteur du projet — Étudiant BTS SIO SLAM<br>
                57000 Metz, Moselle, France<br>
                Email : <span style="color:#c8f135;">contact@resafit.fr</span><br>
                Site : <span style="color:#c8f135;">https://resafit.fr</span>
            </div>
            <p style="font-size:12px;color:#666;margin-top:12px;">ResaFit est un projet développé dans le cadre du BTS Services Informatiques aux Organisations, option Solutions Logicielles et Applications Métiers (SLAM).</p>
        </div>

        <div style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px 32px;margin-bottom:12px;backdrop-filter:blur(12px);transition:all 0.25s;" onmouseover="this.style.borderColor='rgba(200,241,53,0.2)';this.style.background='rgba(200,241,53,0.02)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.07)';this.style.background='rgba(255,255,255,0.03)'">
            <div style="display:flex;align-items:center;gap:16px;margin-bottom:18px;">
                <span style="font-family:'Space Mono',monospace;font-size:11px;color:#c8f135;background:rgba(200,241,53,0.08);border:1px solid rgba(200,241,53,0.2);padding:4px 10px;border-radius:6px;">02</span>
                <i class="fa-solid fa-server" style="color:rgba(200,241,53,0.5);font-size:14px;"></i>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:22px;letter-spacing:0.5px;">Hébergeur</h2>
            </div>
            <div style="background:rgba(255,255,255,0.03);border-radius:12px;padding:20px 24px;font-size:14px;color:#aaa;line-height:2.2;">
                <strong style="color:#f0f0f0;">Infomaniak Network SA</strong><br>
                Rue Eugène-Marziano 25<br>
                1227 Les Acacias, Genève — Suisse<br>
                Tél : +41 22 820 35 44<br>
                Site : <a href="https://www.infomaniak.com" target="_blank" style="color:#c8f135;text-decoration:none;">www.infomaniak.com</a>
            </div>
        </div>

        <div style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px 32px;margin-bottom:12px;backdrop-filter:blur(12px);transition:all 0.25s;" onmouseover="this.style.borderColor='rgba(200,241,53,0.2)';this.style.background='rgba(200,241,53,0.02)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.07)';this.style.background='rgba(255,255,255,0.03)'">
            <div style="display:flex;align-items:center;gap:16px;margin-bottom:18px;">
                <span style="font-family:'Space Mono',monospace;font-size:11px;color:#c8f135;background:rgba(200,241,53,0.08);border:1px solid rgba(200,241,53,0.2);padding:4px 10px;border-radius:6px;">03</span>
                <i class="fa-solid fa-copyright" style="color:rgba(200,241,53,0.5);font-size:14px;"></i>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:22px;letter-spacing:0.5px;">Propriété intellectuelle</h2>
            </div>
            <p style="font-size:14px;color:#aaa;line-height:1.8;">L'ensemble des éléments constituant le site ResaFit (structure, design, code source, textes, logos, identité visuelle) est la propriété exclusive de Keran Nguema Theydert et est protégé par les lois françaises et internationales relatives à la propriété intellectuelle.</p>
            <p style="font-size:14px;color:#aaa;line-height:1.8;margin-top:12px;">Toute reproduction, représentation, modification ou exploitation, totale ou partielle, de ces éléments sans autorisation écrite préalable est strictement interdite et constituerait une contrefaçon sanctionnée par les articles L.335-2 et suivants du Code de la propriété intellectuelle.</p>
        </div>

        <div style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px 32px;margin-bottom:12px;backdrop-filter:blur(12px);transition:all 0.25s;" onmouseover="this.style.borderColor='rgba(200,241,53,0.2)';this.style.background='rgba(200,241,53,0.02)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.07)';this.style.background='rgba(255,255,255,0.03)'">
            <div style="display:flex;align-items:center;gap:16px;margin-bottom:18px;">
                <span style="font-family:'Space Mono',monospace;font-size:11px;color:#c8f135;background:rgba(200,241,53,0.08);border:1px solid rgba(200,241,53,0.2);padding:4px 10px;border-radius:6px;">04</span>
                <i class="fa-solid fa-code" style="color:rgba(200,241,53,0.5);font-size:14px;"></i>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:22px;letter-spacing:0.5px;">Technologies utilisées</h2>
            </div>
            <ul style="display:flex;flex-direction:column;gap:10px;list-style:none;padding:0;">
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Laravel 12</strong> — Framework PHP (licence MIT)</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">PHP 8.2</strong> — Langage de programmation côté serveur</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">JavaScript (Vanilla)</strong> — Animations et interactions côté client</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">MySQL 8</strong> — Système de gestion de base de données</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Tailwind CSS + Vite</strong> — Interface utilisateur et bundler</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Font Awesome 6</strong> — Icônes (licence free)</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Google Fonts</strong> — Bebas Neue, DM Sans, Space Mono</span></li>
            </ul>
        </div>

        <div style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px 32px;margin-bottom:12px;backdrop-filter:blur(12px);transition:all 0.25s;" onmouseover="this.style.borderColor='rgba(200,241,53,0.2)';this.style.background='rgba(200,241,53,0.02)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.07)';this.style.background='rgba(255,255,255,0.03)'">
            <div style="display:flex;align-items:center;gap:16px;margin-bottom:18px;">
                <span style="font-family:'Space Mono',monospace;font-size:11px;color:#c8f135;background:rgba(200,241,53,0.08);border:1px solid rgba(200,241,53,0.2);padding:4px 10px;border-radius:6px;">05</span>
                <i class="fa-solid fa-shield-halved" style="color:rgba(200,241,53,0.5);font-size:14px;"></i>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:22px;letter-spacing:0.5px;">Données personnelles & RGPD</h2>
            </div>
            <p style="font-size:14px;color:#aaa;line-height:1.8;margin-bottom:12px;">Le traitement des données personnelles des utilisateurs est régi par notre <a href="{{ route('confidentialite') }}" style="color:#c8f135;text-decoration:none;">Politique de confidentialité</a>, conforme au Règlement Général sur la Protection des Données (RGPD — UE 2016/679) et à la loi Informatique et Libertés modifiée.</p>
            <p style="font-size:14px;color:#aaa;line-height:1.8;">Pour toute demande relative à vos données : <span style="color:#c8f135;">privacy@resafit.fr</span></p>
        </div>

        <div style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px 32px;margin-bottom:12px;backdrop-filter:blur(12px);transition:all 0.25s;" onmouseover="this.style.borderColor='rgba(200,241,53,0.2)';this.style.background='rgba(200,241,53,0.02)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.07)';this.style.background='rgba(255,255,255,0.03)'">
            <div style="display:flex;align-items:center;gap:16px;margin-bottom:18px;">
                <span style="font-family:'Space Mono',monospace;font-size:11px;color:#c8f135;background:rgba(200,241,53,0.08);border:1px solid rgba(200,241,53,0.2);padding:4px 10px;border-radius:6px;">06</span>
                <i class="fa-solid fa-landmark" style="color:rgba(200,241,53,0.5);font-size:14px;"></i>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:22px;letter-spacing:0.5px;">Droit applicable et litiges</h2>
            </div>
            <p style="font-size:14px;color:#aaa;line-height:1.8;">Les présentes mentions légales sont soumises au droit français. En cas de litige relatif à l'utilisation du site ou à son contenu, et à défaut de résolution amiable, les tribunaux compétents de <strong style="color:#f0f0f0;">Metz (57)</strong> seront seuls compétents.</p>
        </div>

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
