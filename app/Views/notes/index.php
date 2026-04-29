<?php
$pageTitle = $pageTitle ?? 'Liste des notes';
$pageSubtitle = $pageSubtitle ?? 'Modifier ou supprimer une note';
$activeMenu = $activeMenu ?? 'notes';

$notes = $notes ?? [];
?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="table-card">
    <div class="table-headline">
        <div>
            <div class="card-title">Liste des notes</div>
            <div class="inline-help">Actions disponibles : modifier / supprimer</div>
        </div>
        <div>
            <a href="/notes/create" class="btn btn-primary">Nouvelle note</a>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Étudiant</th>
                <th>UE</th>
                <th>Note</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($notes)) : ?>
                <tr><td colspan="6"><em>Aucune note trouvée.</em></td></tr>
            <?php else : ?>
                <?php foreach ($notes as $note) : ?>
                    <tr>
                        <td><?= esc((string) $note['id']) ?></td>
                        <td><?= esc((string) $note['etudiant']) ?></td>
                        <td><?= esc((string) $note['ue']) ?></td>
                        <td><?= esc((string) $note['note']) ?></td>
                        <td><?= esc((string) $note['date']) ?></td>
                        <td>
                            <a href="/notes/edit/<?= esc((string) $note['id']) ?>" class="btn btn-sm btn-outline">Modifier</a>
                            <form action="/notes/delete/<?= esc((string) $note['id']) ?>" method="post" style="display:inline" onsubmit="return confirm('Supprimer cette note ?');">
                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
