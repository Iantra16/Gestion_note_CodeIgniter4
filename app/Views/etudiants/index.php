<?php
$pageTitle = $pageTitle ?? 'Étudiants';
$pageSubtitle = $pageSubtitle ?? 'Liste des étudiants';
$activeMenu = $activeMenu ?? 'etudiants';

$etudiants = $etudiants ?? [
    ['id' => 1, 'numero' => 'E-2401', 'nom' => 'Rakoto', 'prenom' => 'Andry', 'parcours' => 'Dev', 'niveau' => 'S4'],
    ['id' => 2, 'numero' => 'E-2402', 'nom' => 'Rasoa', 'prenom' => 'Miora', 'parcours' => 'Web', 'niveau' => 'S4'],
    ['id' => 3, 'numero' => 'E-2403', 'nom' => 'Rajaonah', 'prenom' => 'Nantenaina', 'parcours' => 'BDDres', 'niveau' => 'S4'],
    ['id' => 4, 'numero' => 'E-2308', 'nom' => 'Andrianarisoa', 'prenom' => 'Lova', 'parcours' => 'Général', 'niveau' => 'S3'],
];
?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="toolbar">
    <div class="toolbar-left">
        <div class="search-box">
            <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" placeholder="Rechercher un étudiant..." />
        </div>
        <select class="filter-select">
            <option>Tous les niveaux</option>
            <option>S3</option>
            <option>S4</option>
            <option>L2</option>
        </select>
        <select class="filter-select">
            <option>Tous les parcours</option>
            <option>Dev</option>
            <option>Web</option>
            <option>BDDres</option>
        </select>
    </div>
    <a href="/notes/create" class="btn btn-primary btn-sm">
        <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Saisir une note
    </a>
</div>

<div class="kpi-grid">
    <div class="kpi-card">
        <div class="kpi-header">
            <div class="kpi-label">Étudiants</div>
            <div class="kpi-icon bg-blue">
                <svg viewBox="0 0 24 24"><path d="M20 21a8 8 0 0 0-16 0"/><circle cx="12" cy="8" r="4"/></svg>
            </div>
        </div>
        <div class="kpi-value"><?= count($etudiants) ?></div>
        <div class="kpi-delta up">Données de démonstration</div>
    </div>

    <div class="kpi-card">
        <div class="kpi-header">
            <div class="kpi-label">S4</div>
            <div class="kpi-icon bg-green">
                <svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M4 4.5A2.5 2.5 0 0 1 6.5 7H20"/></svg>
            </div>
        </div>
        <div class="kpi-value"><?= count(array_filter($etudiants, static fn ($etudiant) => ($etudiant['niveau'] ?? '') === 'S4')) ?></div>
        <div class="kpi-delta up">Parcours en spécialisation</div>
    </div>

    <div class="kpi-card">
        <div class="kpi-header">
            <div class="kpi-label">S3</div>
            <div class="kpi-icon bg-amber">
                <svg viewBox="0 0 24 24"><path d="M20 7H4"/><path d="M20 12H4"/><path d="M20 17H4"/></svg>
            </div>
        </div>
        <div class="kpi-value"><?= count(array_filter($etudiants, static fn ($etudiant) => ($etudiant['niveau'] ?? '') === 'S3')) ?></div>
        <div class="kpi-delta up">Tronc commun</div>
    </div>

    <div class="kpi-card">
        <div class="kpi-header">
            <div class="kpi-label">L2</div>
            <div class="kpi-icon bg-red">
                <svg viewBox="0 0 24 24"><path d="M12 2v20"/><path d="M2 12h20"/></svg>
            </div>
        </div>
        <div class="kpi-value">1</div>
        <div class="kpi-delta down">Scénario de moyenne globale</div>
    </div>
</div>

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>Numéro</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Parcours</th>
                <th>Niveau</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etudiants as $etudiant) : ?>
                <tr>
                    <td><?= esc($etudiant['numero']) ?></td>
                    <td><?= esc($etudiant['nom']) ?></td>
                    <td><?= esc($etudiant['prenom']) ?></td>
                    <td><span class="badge badge-blue"><?= esc($etudiant['parcours']) ?></span></td>
                    <td><span class="badge badge-green"><?= esc($etudiant['niveau']) ?></span></td>
                    <td>
                        <a class="btn btn-ghost btn-sm" href="/etudiants/<?= esc((string) $etudiant['id']) ?>">Voir le détail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
