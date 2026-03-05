<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mot de passe oublié</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body{
            background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .card-custom{
            width:100%;
            max-width:420px;
            border-radius:20px;
            box-shadow:0 20px 40px rgba(0,0,0,0.3);
            border:none;
        }
        .form-control{
            border-radius:10px;
            padding:12px 15px;
        }
        .btn-custom{
            border-radius:10px;
            padding:10px;
            font-weight:600;
        }
    </style>
</head>
<body>

<div class="card card-custom p-4">

    <div class="text-center mb-4">
        <i class="fa-solid fa-lock fa-2x text-primary mb-3"></i>
        <h4 class="fw-bold">Mot de passe oublié</h4>
        <p class="text-muted small">
            Entrez votre email pour recevoir un lien de réinitialisation.
        </p>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">
                <i class="fa-solid fa-envelope me-2"></i>Email
            </label>
            <input
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="exemple@email.com"
                value="{{ old('email') }}"
                required
            >
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-custom">
                <i class="fa-solid fa-paper-plane me-2"></i>
                Envoyer le lien
            </button>
        </div>

        <div class="text-center mt-3">
            <a href="{{ route('login') }}" class="text-decoration-none small">
                <i class="fa-solid fa-arrow-left me-1"></i>
                Retour à la connexion
            </a>
        </div>

    </form>

</div>

</body>
</html>
