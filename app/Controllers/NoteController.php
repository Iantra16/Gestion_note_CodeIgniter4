<?php

namespace App\Controllers;

class NoteController extends BaseController
{
    public function create(): string
    {
        return view('notes/create', [
            'pageTitle' => 'Saisir une note',
            'pageSubtitle' => 'Enregistrer une note',
            'activeMenu' => 'notes-create',
            'etudiants' => [
                ['id' => 1, 'numero' => 'E-2401', 'nom' => 'Rakoto', 'prenom' => 'Andry'],
                ['id' => 2, 'numero' => 'E-2402', 'nom' => 'Rasoa', 'prenom' => 'Miora'],
                ['id' => 3, 'numero' => 'E-2403', 'nom' => 'Rajaonah', 'prenom' => 'Nantenaina'],
            ],
            'uesByEtudiant' => [
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
            ],
            'selectedEtudiantId' => 1,
        ]);
    }

    public function store()
    {
        return redirect()->to('/notes/create');
    }

    public function index(): string
    {
        $notes = [
            ['id' => 1, 'etudiant' => 'Andry Rakoto', 'ue' => 'Développement web', 'note' => 14.5, 'date' => '2026-04-01'],
            ['id' => 2, 'etudiant' => 'Miora Rasoa', 'ue' => 'Base de données', 'note' => 12, 'date' => '2026-04-05'],
            ['id' => 3, 'etudiant' => 'Nantenaina Rajaonah', 'ue' => 'Projet tuteuré', 'note' => 16.25, 'date' => '2026-04-10'],
        ];

        return view('notes/index', [
            'pageTitle' => 'Liste des notes',
            'pageSubtitle' => 'Modifier ou supprimer une note',
            'activeMenu' => 'notes',
            'notes' => $notes,
        ]);
    }

    public function edit($id): string
    {
        $note = ['id' => (int) $id, 'etudiant_id' => 1, 'ue_id' => 10, 'note' => 14.5, 'date' => '2026-04-01'];

        return view('notes/edit', [
            'pageTitle' => 'Modifier une note',
            'pageSubtitle' => 'Mettre à jour la note',
            'activeMenu' => 'notes',
            'note' => $note,
        ]);
    }

    public function update($id)
    {
        // Ici on ferait la validation et la mise à jour en base.
        return redirect()->to('/notes');
    }

    public function delete($id)
    {
        // Ici on supprimerait la note en base.
        return redirect()->to('/notes');
    }
}