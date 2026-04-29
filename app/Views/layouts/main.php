<?php
$pageTitle = $pageTitle ?? 'Gestion des notes';
$pageSubtitle = $pageSubtitle ?? 'Suivi des étudiants et des résultats';
$activeMenu = $activeMenu ?? 'etudiants';
$authUser = $authUser ?? [
    'initials' => 'AD',
    'name' => 'Admin Sys',
    'role' => 'Super administrateur',
];
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

<div class="app">
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="logo-icon">
                <svg viewBox="0 0 24 24" width="18" height="18"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
            </div>
            <div>
                <div class="brand-name">Gestion Note</div>
                <div class="brand-sub">CodeIgniter 4</div>
            </div>
        </div>

        <div class="sidebar-section">Navigation</div>

        <a href="/etudiants" class="nav-item <?= $activeMenu === 'etudiants' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M4 4.5A2.5 2.5 0 0 1 6.5 7H20"/><path d="M20 4v16"/><path d="M6 7v10"/></svg>
            Étudiants
        </a>
        <a href="/notes" class="nav-item <?= $activeMenu === 'notes' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24"><path d="M3 7h18M3 12h18M3 17h18"/></svg>
            Liste des notes
        </a>
        <a href="/notes/create" class="nav-item <?= $activeMenu === 'notes-create' ? 'active' : '' ?>">
            <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            Saisir une note
        </a>
        <a href="/logout" class="nav-item">
            <svg viewBox="0 0 24 24"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
            Déconnexion
        </a>

        <div class="sidebar-section">Aide</div>
        <a href="#" class="nav-item">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M9.1 9a3 3 0 0 1 5.8 1c0 2-3 2-3 4"/><circle cx="12" cy="17" r="1"/></svg>
            Documentation
        </a>

        <div class="sidebar-bottom">
            <a href="/logout" class="user-row">
                <div class="avatar"><?= esc($authUser['initials']) ?></div>
                <div class="user-info">
                    <div class="name"><?= esc($authUser['name']) ?></div>
                    <div class="role"><?= esc($authUser['role']) ?></div>
                </div>
            </a>
        </div>
    </aside>

    <div class="main">
        <div class="topbar">
            <div class="topbar-title"><?= esc($pageTitle) ?></div>
            <div class="topbar-search">
                <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="text" placeholder="Rechercher..." />
            </div>
            <div class="topbar-actions">
                <button class="icon-btn" type="button">
                    <svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                    <span class="notif-dot"></span>
                </button>
                <button class="icon-btn" type="button">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M20 21a8 8 0 1 0-16 0"/></svg>
                </button>
            </div>
        </div>

        <main class="content">
            <div class="page-header">
                <div>
                    <h2><?= esc($pageTitle) ?></h2>
                    <div class="breadcrumb">Accueil / <span><?= esc($pageSubtitle) ?></span></div>
                </div>
            </div>

            <?= $this->renderSection('content') ?>
        </main>
    </div>
</div>

</body>
</html>
