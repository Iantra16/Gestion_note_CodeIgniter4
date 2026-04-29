<?php

namespace App\Controllers;

class NoteController extends BaseController
{
    public function create(): string
    {
        return view('notes/create', [
            'pageTitle' => 'Saisir une note',
            'pageSubtitle' => 'Enregistrer une note',
            'activeMenu' => 'notes',
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
}