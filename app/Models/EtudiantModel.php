<?php

namespace App\Models;

use CodeIgniter\Model;

class EtudiantModel extends Model
{
    protected $table = 'etudiants';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['nom', 'prenom', 'id_parcours'];

    // Règles de validation
    protected $validationRules = [
        'nom'         => 'required|min_length[2]|max_length[100]',
        'prenom'      => 'permit_empty|max_length[100]',
        'id_parcours' => 'permit_empty|numeric',
    ];

    // Messages d'erreur en français
    protected $validationMessages = [
        'nom' => [
            'required'    => 'Le nom de l\'étudiant est obligatoire.',
            'min_length'  => 'Le nom doit avoir au minimum 2 caractères.',
            'max_length'  => 'Le nom ne doit pas dépasser 100 caractères.',
        ],
        'prenom' => [
            'max_length'  => 'Le prénom ne doit pas dépasser 100 caractères.',
        ],
        'id_parcours' => [
            'numeric'     => 'Le parcours doit être un nombre valide.',
        ],
    ];
}
