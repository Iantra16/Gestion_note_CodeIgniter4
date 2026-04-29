<?php
$pageTitle = $pageTitle ?? 'Détail étudiant';
$pageSubtitle = $pageSubtitle ?? 'Notes et moyennes';
$activeMenu = $activeMenu ?? 'etudiants';

$etudiant = $etudiant ?? [
    'id' => 1,
    'numero' => 'E-2401',
    'nom' => 'Rakoto',
    'prenom' => 'Andry',
    'parcours' => 'Dev',
    'niveau' => 'L2',
];

$resume = $resume ?? [
    's3' => ['moyenne' => 13.45, 'credits' => 30, 'details' => [
        ['ue' => 'Algorithmique', 'note' => 15, 'credits' => 6],
        ['ue' => 'Base de données', 'note' => 13, 'credits' => 6],
        ['ue' => 'Anglais', 'note' => 12, 'credits' => 3],
    ]],
    's4' => ['moyenne' => 14.12, 'credits' => 30, 'details' => [
        ['ue' => 'Développement web', 'note' => 15, 'credits' => 6],
        ['ue' => 'Architecture', 'note' => 14, 'credits' => 6],
        ['ue' => 'Option parcours', 'note' => 16, 'credits' => 3],
    ]],
    'general' => 13.78,
];

$niveau = $etudiant['niveau'] ?? 'L2';
?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="hero-panel">
    <div>
        <div class="hero-kicker">Fiche étudiant</div>
        <h3><?= esc($etudiant['prenom'] . ' ' . $etudiant['nom']) ?></h3>
        <p><?= esc($etudiant['numero']) ?> · Parcours <?= esc($etudiant['parcours']) ?> · Niveau <?= esc($niveau) ?></p>
    </div>
    <div class="hero-actions">
        <span class="pill pill-primary"><?= esc($niveau) ?></span>
        <a href="/etudiants" class="btn btn-secondary btn-sm">Retour à la liste</a>
        <a href="/notes/create" class="btn btn-primary btn-sm">Saisir une note</a>
    </div>
</div>

<div class="summary-grid">
    <div class="summary-card">
        <div class="summary-label">Moyenne S3</div>
        <div class="summary-value"><?= isset($resume['s3']['moyenne']) ? number_format((float) $resume['s3']['moyenne'], 2, ',', ' ') : '—' ?></div>
        <div class="summary-meta"><?= esc((string) ($resume['s3']['credits'] ?? 0)) ?> crédits</div>
    </div>
    <div class="summary-card">
        <div class="summary-label">Moyenne S4</div>
        <div class="summary-value"><?= isset($resume['s4']['moyenne']) ? number_format((float) $resume['s4']['moyenne'], 2, ',', ' ') : '—' ?></div>
        <div class="summary-meta"><?= esc((string) ($resume['s4']['credits'] ?? 0)) ?> crédits</div>
    </div>
    <div class="summary-card summary-card-accent">
        <div class="summary-label">Moyenne générale</div>
        <div class="summary-value"><?= isset($resume['general']) ? number_format((float) $resume['general'], 2, ',', ' ') : '—' ?></div>
        <div class="summary-meta">S3 + S4</div>
    </div>
</div>

<?php if ($niveau === 'S3' || $niveau === 'L2') : ?>
    <div class="semester-card">
        <div class="semester-header">
            <div>
                <div class="semester-title">Semestre 3</div>
                <div class="semester-subtitle">UE obligatoires et notes retenues</div>
            </div>
            <span class="pill">Moyenne <?= isset($resume['s3']['moyenne']) ? number_format((float) $resume['s3']['moyenne'], 2, ',', ' ') : '—' ?></span>
        </div>
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>UE</th>
                        <th>Note retenue</th>
                        <th>Crédits</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (($resume['s3']['details'] ?? []) as $row) : ?>
                        <tr>
                            <td><?= esc($row['ue']) ?></td>
                            <td><span class="badge badge-green note-badge"><?= esc(number_format((float) $row['note'], 2, ',', ' ')) ?> / 20</span></td>
                            <td><?= esc((string) $row['credits']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>

<?php if ($niveau === 'S4' || $niveau === 'L2') : ?>
    <div class="semester-card">
        <div class="semester-header">
            <div>
                <div class="semester-title">Semestre 4</div>
                <div class="semester-subtitle">Parcours <?= esc($etudiant['parcours']) ?></div>
            </div>
            <span class="pill">Moyenne <?= isset($resume['s4']['moyenne']) ? number_format((float) $resume['s4']['moyenne'], 2, ',', ' ') : '—' ?></span>
        </div>
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>UE</th>
                        <th>Note retenue</th>
                        <th>Crédits</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (($resume['s4']['details'] ?? []) as $row) : ?>
                        <tr>
                            <td><?= esc($row['ue']) ?></td>
                            <td><span class="badge badge-blue note-badge"><?= esc(number_format((float) $row['note'], 2, ',', ' ')) ?> / 20</span></td>
                            <td><?= esc((string) $row['credits']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>

<?php if ($niveau === 'L2') : ?>
    <div class="alert alert-info note-summary">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        <span>La moyenne générale est calculée à partir des moyennes S3 et S4.</span>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>
