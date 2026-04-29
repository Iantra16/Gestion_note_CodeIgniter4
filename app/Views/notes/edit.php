<?php
$pageTitle = $pageTitle ?? 'Modifier une note';
$pageSubtitle = $pageSubtitle ?? 'Mettre à jour la note';
$activeMenu = $activeMenu ?? 'notes';

$note = $note ?? ['id' => 0, 'etudiant_id' => '', 'ue_id' => '', 'note' => '', 'date' => date('Y-m-d')];
?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="form-card section-gap">
    <div class="form-section-title">Modifier la note #<?= esc((string) $note['id']) ?></div>
    <form action="/notes/update/<?= esc((string) $note['id']) ?>" method="post" class="note-form">
        <div class="form-grid">
            <div>
                <label class="field-label" for="note">Note <span class="required">*</span></label>
                <div class="input-group">
                    <input id="note" name="note" type="number" min="0" max="20" step="0.25" value="<?= esc((string) $note['note']) ?>" />
                    <span class="addon addon-right">/20</span>
                </div>
            </div>

            <div>
                <label class="field-label" for="date_saisie">Date</label>
                <input id="date_saisie" name="date" type="date" value="<?= esc($note['date']) ?>" />
            </div>
        </div>

        <div class="note-form-actions">
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="/notes" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
