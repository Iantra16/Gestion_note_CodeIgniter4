<?php
$pageTitle = $pageTitle ?? 'Connexion';
$errorMessage = session()->getFlashdata('error');
$nom = old('nom') ?? '';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= esc($pageTitle) ?></title>
    <link rel="stylesheet" href="/css/theme.css" />
</head>
<body>

<div class="login-page">
    <div class="login-card">
        <div class="login-logo">
            <div class="logo-icon">
                <svg viewBox="0 0 24 24" width="22" height="22"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
            </div>
            <div>
                <h1>Gestion Note</h1>
                <span>CodeIgniter 4</span>
            </div>
        </div>

        <h2>Connexion</h2>
        <p class="subtitle">Accédez au tableau de bord des étudiants et des notes.</p>

        <?php if (! empty($errorMessage)) : ?>
            <div class="alert alert-danger">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                <span><?= esc((string) $errorMessage) ?></span>
            </div>
        <?php endif; ?>

        <form action="/login" method="post" class="login-form">
            <div class="field-group">
                <label for="nom">Nom</label>
                <div class="input-wrap">
                    <div class="icon">
                        <svg viewBox="0 0 24 24"><path d="M20 21a8 8 0 0 0-16 0"/><circle cx="12" cy="8" r="4"/></svg>
                    </div>
                    <input id="nom" name="nom" type="text" value="<?= esc($nom) ?>" placeholder="Entrez votre nom" />
                </div>
            </div>

            <div class="field-group">
                <label for="pwd">Mot de passe</label>
                <div class="input-wrap">
                    <div class="icon">
                        <svg viewBox="0 0 24 24"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </div>
                    <input id="pwd" name="pwd" type="password" placeholder="Entrez votre mot de passe" />
                </div>
            </div>

            <div class="remember-row">
                <label>
                    <input type="checkbox" checked />
                    Se souvenir de moi
                </label>
                <a href="#">Mot de passe oublié ?</a>
            </div>

            <button type="submit" class="btn btn-primary btn-full">
                <svg viewBox="0 0 24 24"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                Se connecter
            </button>
        </form>

        <div class="login-footer">Utilisateur de test : admin / admin123</div>
    </div>
</div>

</body>
</html>
