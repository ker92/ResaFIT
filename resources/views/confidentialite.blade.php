@extends('layouts.app')

@section('content')

    <div style="position:fixed; inset:0; z-index:0; background-image:url('/images/dashboard-user.jpg'); background-size:cover; background-position:center;"></div>
    <div style="position:fixed; inset:0; z-index:0; background:linear-gradient(135deg, rgba(8,8,8,0.92) 0%, rgba(8,8,8,0.75) 100%);"></div>

    <div style="position:relative; z-index:1; max-width:800px; margin:0 auto; padding:60px 48px; font-family:'DM Sans',sans-serif; color:#f0f0f0;">

        <a href="{{ route('home') }}" style="display:inline-flex; align-items:center; gap:8px; color:#888; font-size:13px; text-decoration:none; margin-bottom:40px; transition:color 0.2s;"
           onmouseover="this.style.color='#c8f135'" onmouseout="this.style.color='#888'">
            <i class="fa-solid fa-arrow-left"></i> Retour à l'accueil
        </a>

        <p style="font-family:'Space Mono',monospace; font-size:10px; color:#c8f135; letter-spacing:4px; text-transform:uppercase; margin-bottom:12px;">
            <i class="fa-solid fa-shield-halved" style="margin-right:6px"></i>RGPD & Confidentialité
        </p>
        <h1 style="font-family:'Bebas Neue',sans-serif; font-size:clamp(48px,6vw,80px); line-height:0.95; letter-spacing:-2px; margin-bottom:12px;">
            Politique de <span style="color:#c8f135;">confidentialité</span>
        </h1>
        <p style="font-size:13px; color:#888; margin-bottom:56px; font-family:'Space Mono',monospace;">
            Dernière mise à jour : {{ date('d/m/Y') }} — Version 1.0
        </p>

        {{-- 01 --}}
        <div style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px 32px;margin-bottom:12px;backdrop-filter:blur(12px);transition:all 0.25s;" onmouseover="this.style.borderColor='rgba(200,241,53,0.2)';this.style.background='rgba(200,241,53,0.02)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.07)';this.style.background='rgba(255,255,255,0.03)'">
            <div style="display:flex;align-items:center;gap:16px;margin-bottom:18px;">
                <span style="font-family:'Space Mono',monospace;font-size:11px;color:#c8f135;background:rgba(200,241,53,0.08);border:1px solid rgba(200,241,53,0.2);padding:4px 10px;border-radius:6px;">01</span>
                <i class="fa-solid fa-building" style="color:rgba(200,241,53,0.5);font-size:14px;"></i>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:22px;letter-spacing:0.5px;">Responsable du traitement</h2>
            </div>
            <p style="font-size:14px;color:#aaa;line-height:1.8;margin-bottom:12px;">Conformément au Règlement Général sur la Protection des Données (RGPD — Règlement UE 2016/679), le responsable du traitement est :</p>
            <div style="background:rgba(200,241,53,0.04);border:1px solid rgba(200,241,53,0.15);border-radius:12px;padding:20px 24px;font-size:14px;color:#aaa;line-height:2.2;">
                <strong style="color:#f0f0f0;">Keran Nguema Theydert</strong><br>
                Porteur du projet ResaFit<br>
                57000 Metz, France<br>
                Email : <span style="color:#c8f135;">privacy@resafit.fr</span><br>
                Site : <span style="color:#c8f135;">https://resafit.fr</span>
            </div>
        </div>

        <div style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px 32px;margin-bottom:12px;backdrop-filter:blur(12px);transition:all 0.25s;" onmouseover="this.style.borderColor='rgba(200,241,53,0.2)';this.style.background='rgba(200,241,53,0.02)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.07)';this.style.background='rgba(255,255,255,0.03)'">
            <div style="display:flex;align-items:center;gap:16px;margin-bottom:18px;">
                <span style="font-family:'Space Mono',monospace;font-size:11px;color:#c8f135;background:rgba(200,241,53,0.08);border:1px solid rgba(200,241,53,0.2);padding:4px 10px;border-radius:6px;">02</span>
                <i class="fa-solid fa-database" style="color:rgba(200,241,53,0.5);font-size:14px;"></i>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:22px;letter-spacing:0.5px;">Données collectées</h2>
            </div>
            <p style="font-size:14px;color:#aaa;margin-bottom:14px;">Les données personnelles suivantes sont collectées et traitées :</p>
            <ul style="display:flex;flex-direction:column;gap:10px;list-style:none;padding:0;">
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Données d'identification :</strong> nom, prénom, adresse email</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Données d'authentification :</strong> mot de passe hashé (bcrypt, non lisible)</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Données de réservation :</strong> type de cours, date, heure, lieu, statut</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Logs d'accès QR :</strong> token anonymisé, horodatage, identifiant salle</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Cookie de session :</strong> cookie technique Laravel (non traceur)</span></li>
            </ul>
        </div>

        <div style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px 32px;margin-bottom:12px;backdrop-filter:blur(12px);transition:all 0.25s;" onmouseover="this.style.borderColor='rgba(200,241,53,0.2)';this.style.background='rgba(200,241,53,0.02)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.07)';this.style.background='rgba(255,255,255,0.03)'">
            <div style="display:flex;align-items:center;gap:16px;margin-bottom:18px;">
                <span style="font-family:'Space Mono',monospace;font-size:11px;color:#c8f135;background:rgba(200,241,53,0.08);border:1px solid rgba(200,241,53,0.2);padding:4px 10px;border-radius:6px;">03</span>
                <i class="fa-solid fa-bullseye" style="color:rgba(200,241,53,0.5);font-size:14px;"></i>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:22px;letter-spacing:0.5px;">Finalités et base légale</h2>
            </div>
            <p style="font-size:14px;color:#aaa;margin-bottom:14px;">Chaque traitement repose sur une base légale au sens de l'article 6 du RGPD :</p>
            <div style="display:flex;flex-direction:column;gap:10px;">
                <div style="background:rgba(255,255,255,0.03);border-radius:10px;padding:14px 18px;">
                    <p style="font-size:12px;color:#c8f135;font-family:'Space Mono',monospace;margin-bottom:6px;">Exécution du contrat — art. 6.1.b</p>
                    <p style="font-size:13px;color:#aaa;">Gestion du compte, réservations, envoi d'emails de confirmation, génération des QR codes.</p>
                </div>
                <div style="background:rgba(255,255,255,0.03);border-radius:10px;padding:14px 18px;">
                    <p style="font-size:12px;color:#c8f135;font-family:'Space Mono',monospace;margin-bottom:6px;">Intérêt légitime — art. 6.1.f</p>
                    <p style="font-size:13px;color:#aaa;">Journalisation des accès QR pour assurer la sécurité physique des salles et prévenir les abus.</p>
                </div>
                <div style="background:rgba(255,255,255,0.03);border-radius:10px;padding:14px 18px;">
                    <p style="font-size:12px;color:#c8f135;font-family:'Space Mono',monospace;margin-bottom:6px;">Obligation légale — art. 6.1.c</p>
                    <p style="font-size:13px;color:#aaa;">Conservation des données de transaction 3 ans (Code de commerce français).</p>
                </div>
            </div>
        </div>

        <div style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px 32px;margin-bottom:12px;backdrop-filter:blur(12px);transition:all 0.25s;" onmouseover="this.style.borderColor='rgba(200,241,53,0.2)';this.style.background='rgba(200,241,53,0.02)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.07)';this.style.background='rgba(255,255,255,0.03)'">
            <div style="display:flex;align-items:center;gap:16px;margin-bottom:18px;">
                <span style="font-family:'Space Mono',monospace;font-size:11px;color:#c8f135;background:rgba(200,241,53,0.08);border:1px solid rgba(200,241,53,0.2);padding:4px 10px;border-radius:6px;">04</span>
                <i class="fa-solid fa-clock" style="color:rgba(200,241,53,0.5);font-size:14px;"></i>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:22px;letter-spacing:0.5px;">Durée de conservation</h2>
            </div>
            <ul style="display:flex;flex-direction:column;gap:10px;list-style:none;padding:0;">
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Compte utilisateur :</strong> durée d'activité + 12 mois après suppression</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Données de réservation :</strong> 3 ans à compter de la date de réservation</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Logs d'accès QR :</strong> 12 mois glissants, puis suppression</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Tokens QR :</strong> 5 minutes (expiration automatique)</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Sessions Laravel :</strong> durée de la session navigateur</span></li>
            </ul>
        </div>

        <div style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px 32px;margin-bottom:12px;backdrop-filter:blur(12px);transition:all 0.25s;" onmouseover="this.style.borderColor='rgba(200,241,53,0.2)';this.style.background='rgba(200,241,53,0.02)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.07)';this.style.background='rgba(255,255,255,0.03)'">
            <div style="display:flex;align-items:center;gap:16px;margin-bottom:18px;">
                <span style="font-family:'Space Mono',monospace;font-size:11px;color:#c8f135;background:rgba(200,241,53,0.08);border:1px solid rgba(200,241,53,0.2);padding:4px 10px;border-radius:6px;">05</span>
                <i class="fa-solid fa-share-nodes" style="color:rgba(200,241,53,0.5);font-size:14px;"></i>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:22px;letter-spacing:0.5px;">Destinataires des données</h2>
            </div>
            <p style="font-size:14px;color:#aaa;line-height:1.8;margin-bottom:14px;">Vos données ne sont ni vendues, ni louées, ni cédées à des tiers à des fins commerciales. Elles peuvent être transmises à :</p>
            <ul style="display:flex;flex-direction:column;gap:10px;list-style:none;padding:0;">
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Infomaniak Network SA</strong> (Genève, Suisse) — hébergeur, soumis aux clauses contractuelles types UE</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Salles partenaires</strong> — uniquement le token QR anonymisé, sans données nominatives</span></li>
            </ul>
        </div>

        <div style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px 32px;margin-bottom:12px;backdrop-filter:blur(12px);transition:all 0.25s;" onmouseover="this.style.borderColor='rgba(200,241,53,0.2)';this.style.background='rgba(200,241,53,0.02)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.07)';this.style.background='rgba(255,255,255,0.03)'">
            <div style="display:flex;align-items:center;gap:16px;margin-bottom:18px;">
                <span style="font-family:'Space Mono',monospace;font-size:11px;color:#c8f135;background:rgba(200,241,53,0.08);border:1px solid rgba(200,241,53,0.2);padding:4px 10px;border-radius:6px;">06</span>
                <i class="fa-solid fa-cookie-bite" style="color:rgba(200,241,53,0.5);font-size:14px;"></i>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:22px;letter-spacing:0.5px;">Cookies et traceurs</h2>
            </div>
            <p style="font-size:14px;color:#aaa;line-height:1.8;margin-bottom:14px;">ResaFit n'utilise aucun cookie publicitaire ni traceur tiers. Un seul cookie est déposé :</p>
            <div style="background:rgba(200,241,53,0.04);border:1px solid rgba(200,241,53,0.15);border-radius:12px;padding:16px 20px;margin-bottom:12px;">
                <p style="font-size:12px;color:#c8f135;font-family:'Space Mono',monospace;margin-bottom:6px;">resafit_session</p>
                <p style="font-size:13px;color:#aaa;line-height:1.7;">Cookie de session technique Laravel. Maintient votre connexion entre les pages. Supprimé à la fermeture du navigateur. Ne contient aucune donnée personnelle identifiable.</p>
            </div>
            <p style="font-size:12px;color:#666;">Ce cookie étant strictement nécessaire au fonctionnement du service, il ne requiert pas de consentement préalable (directive ePrivacy 2002/58/CE).</p>
        </div>

        <div style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px 32px;margin-bottom:12px;backdrop-filter:blur(12px);transition:all 0.25s;" onmouseover="this.style.borderColor='rgba(200,241,53,0.2)';this.style.background='rgba(200,241,53,0.02)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.07)';this.style.background='rgba(255,255,255,0.03)'">
            <div style="display:flex;align-items:center;gap:16px;margin-bottom:18px;">
                <span style="font-family:'Space Mono',monospace;font-size:11px;color:#c8f135;background:rgba(200,241,53,0.08);border:1px solid rgba(200,241,53,0.2);padding:4px 10px;border-radius:6px;">07</span>
                <i class="fa-solid fa-lock" style="color:rgba(200,241,53,0.5);font-size:14px;"></i>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:22px;letter-spacing:0.5px;">Sécurité des données</h2>
            </div>
            <ul style="display:flex;flex-direction:column;gap:10px;list-style:none;padding:0;">
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Chiffrement bcrypt :</strong> mots de passe hachés avec coût 12, irréversibles</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Tokens QR sécurisés :</strong> SHA-256 sur chaîne aléatoire, durée 5 min, usage unique</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">HTTPS/TLS :</strong> toutes les communications sont chiffrées (certificat SSL Infomaniak)</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Politique de mot de passe :</strong> 12 caractères min, majuscule + chiffre + symbole obligatoires</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Contrôle d'accès :</strong> séparation stricte admin / utilisateur via middleware Laravel</span></li>
            </ul>
        </div>

        <div style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px 32px;margin-bottom:12px;backdrop-filter:blur(12px);transition:all 0.25s;" onmouseover="this.style.borderColor='rgba(200,241,53,0.2)';this.style.background='rgba(200,241,53,0.02)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.07)';this.style.background='rgba(255,255,255,0.03)'">
            <div style="display:flex;align-items:center;gap:16px;margin-bottom:18px;">
                <span style="font-family:'Space Mono',monospace;font-size:11px;color:#c8f135;background:rgba(200,241,53,0.08);border:1px solid rgba(200,241,53,0.2);padding:4px 10px;border-radius:6px;">08</span>
                <i class="fa-solid fa-scale-balanced" style="color:rgba(200,241,53,0.5);font-size:14px;"></i>
                <h2 style="font-family:'Bebas Neue',sans-serif;font-size:22px;letter-spacing:0.5px;">Vos droits</h2>
            </div>
            <p style="font-size:14px;color:#aaa;line-height:1.8;margin-bottom:14px;">Conformément aux articles 15 à 22 du RGPD, vous disposez des droits suivants :</p>
            <ul style="display:flex;flex-direction:column;gap:10px;list-style:none;padding:0;margin-bottom:20px;">
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Droit d'accès (art. 15) :</strong> obtenir une copie de vos données traitées</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Droit de rectification (art. 16) :</strong> corriger des données inexactes</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Droit à l'effacement (art. 17) :</strong> demander la suppression de vos données</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Droit à la portabilité (art. 20) :</strong> recevoir vos données dans un format structuré</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Droit d'opposition (art. 21) :</strong> vous opposer aux traitements fondés sur l'intérêt légitime</span></li>
                <li style="display:flex;gap:12px;font-size:14px;color:#aaa;"><i class="fa-solid fa-circle" style="font-size:5px;color:#c8f135;margin-top:8px;flex-shrink:0"></i><span><strong style="color:#f0f0f0;">Droit à la limitation (art. 18) :</strong> demander la suspension temporaire d'un traitement</span></li>
            </ul>
            <div style="background:rgba(200,241,53,0.04);border:1px solid rgba(200,241,53,0.15);border-radius:12px;padding:16px 20px;margin-bottom:12px;">
                <p style="font-size:13px;color:#aaa;line-height:1.7;">Pour exercer vos droits, écrivez à <span style="color:#c8f135;">privacy@resafit.fr</span> en précisant votre demande. Réponse garantie sous <strong style="color:#f0f0f0;">1 mois</strong> (art. 12 RGPD).</p>
            </div>
            <p style="font-size:12px;color:#666;">En cas de désaccord, vous pouvez introduire une réclamation auprès de la <strong style="color:#888;">CNIL</strong> — 3 Place de Fontenoy, 75007 Paris — <a href="https://www.cnil.fr" target="_blank" style="color:#c8f135;text-decoration:none;">www.cnil.fr</a></p>
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
