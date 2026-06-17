<?php

namespace App\Controllers;

class EtudiantController extends BaseController
{
    public function index(): string
    {
        return view('etudiants/index', [
            'pageTitle' => 'Étudiants',
            'pageSubtitle' => 'Liste des étudiants',
            'activeMenu' => 'etudiants',
            'etudiants' => [
                ['id' => 1, 'numero' => 'E-2401', 'nom' => 'Rakoto', 'prenom' => 'Andry', 'parcours' => 'Dev', 'niveau' => 'S4'],
                ['id' => 2, 'numero' => 'E-2402', 'nom' => 'Rasoa', 'prenom' => 'Miora', 'parcours' => 'Web', 'niveau' => 'S4'],
                ['id' => 3, 'numero' => 'E-2403', 'nom' => 'Rajaonah', 'prenom' => 'Nantenaina', 'parcours' => 'BDDres', 'niveau' => 'S4'],
                ['id' => 4, 'numero' => 'E-2308', 'nom' => 'Andrianarisoa', 'prenom' => 'Lova', 'parcours' => 'Général', 'niveau' => 'S3'],
            ],
        ]);
    }

    public function show(int $id): string
    {
        return view('etudiants/show', [
            'pageTitle' => 'Détail étudiant',
            'pageSubtitle' => 'Notes et moyennes',
            'activeMenu' => 'etudiants',
            'etudiant' => [
                'id' => $id,
                'numero' => 'E-2401',
                'nom' => 'Rakoto',
                'prenom' => 'Andry',
                'parcours' => 'Dev',
                'niveau' => 'L2',
            ],
            'resume' => [
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
            ],
        ]);
    }
}