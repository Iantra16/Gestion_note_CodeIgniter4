<?php
$pageTitle = $pageTitle ?? 'Saisir une note';
$pageSubtitle = $pageSubtitle ?? 'Enregistrer une note';
$activeMenu = $activeMenu ?? 'notes';

$etudiants = $etudiants ?? [
    ['id' => 1, 'numero' => 'E-2401', 'nom' => 'Rakoto', 'prenom' => 'Andry'],
    ['id' => 2, 'numero' => 'E-2402', 'nom' => 'Rasoa', 'prenom' => 'Miora'],
    ['id' => 3, 'numero' => 'E-2403', 'nom' => 'Rajaonah', 'prenom' => 'Nantenaina'],
];

$uesByEtudiant = $uesByEtudiant ?? [
    1 => [
        ['id' => 10, 'libelle' => 'Développement web', 'code' => 'UE-WEB-1'],
        ['id' => 11, 'libelle' => 'Base de données', 'code' => 'UE-BDD-1'],
    ],
    2 => [
        ['id' => 20, 'libelle' => 'Architecture logicielle', 'code' => 'UE-ARC-1'],
        ['id' => 21, 'libelle' => 'Framework backend', 'code' => 'UE-BACK-1'],
    ],
    3 => [
        ['id' => 30, 'libelle' => 'Projet tuteuré', 'code' => 'UE-PROJ-1'],
        ['id' => 31, 'libelle' => 'Anglais', 'code' => 'UE-ANG-1'],
    ],
];

$selectedEtudiantId = $selectedEtudiantId ?? ($etudiants[0]['id'] ?? null);
$availableUes = $uesByEtudiant[$selectedEtudiantId] ?? [];
?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="alert alert-info">
    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
    <span>Le formulaire est prêt pour la saisie successive. Le filtrage des UE pourra ensuite être branché sur le contrôleur ou un endpoint AJAX.</span>
</div>

<div class="form-card section-gap">
    <div class="form-section-title">Saisie d'une note</div>
    <form action="/notes/store" method="post" class="note-form">
        <div class="form-grid">
            <div>
                <label class="field-label" for="etudiant_id">Étudiant <span class="required">*</span></label>
                <select id="etudiant_id" name="etudiant_id">
                    <option value="">— Sélectionner —</option>
                    <?php foreach ($etudiants as $etudiant) : ?>
                        <option value="<?= esc((string) $etudiant['id']) ?>" <?= (string) $selectedEtudiantId === (string) $etudiant['id'] ? 'selected' : '' ?>>
                            <?= esc($etudiant['numero'] . ' - ' . $etudiant['prenom'] . ' ' . $etudiant['nom']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="field-hint">La liste des UE dépend de l'étudiant choisi.</div>
            </div>

            <div>
                <label class="field-label" for="ue_id">UE <span class="required">*</span></label>
                <select id="ue_id" name="ue_id">
                    <option value="">— Sélectionner —</option>
                    <?php foreach ($availableUes as $ue) : ?>
                        <option value="<?= esc((string) $ue['id']) ?>">
                            <?= esc($ue['code'] . ' - ' . $ue['libelle']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="field-hint">Exemple de filtrage déjà préparé dans la vue.</div>
            </div>

            <div>
                <label class="field-label" for="note">Note <span class="required">*</span></label>
                <div class="input-group">
                    <input id="note" name="note" type="number" min="0" max="20" step="0.25" placeholder="0 à 20" />
                    <span class="addon addon-right">/20</span>
                </div>
            </div>

            <div>
                <label class="field-label" for="date_saisie">Date de saisie</label>
                <input id="date_saisie" type="date" value="<?= date('Y-m-d') ?>" />
            </div>
        </div>

        <div class="note-form-actions">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="/etudiants" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>

<div class="table-card">
    <div class="table-headline">
        <div>
            <div class="card-title">Étudiants disponibles</div>
            <div class="inline-help">Sélection rapide pour la prochaine saisie.</div>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>Numéro</th>
                <th>Nom complet</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etudiants as $etudiant) : ?>
                <tr>
                    <td><?= esc($etudiant['numero']) ?></td>
                    <td><?= esc($etudiant['prenom'] . ' ' . $etudiant['nom']) ?></td>
                    <td><span class="badge badge-gray">Prêt à saisir</span></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
