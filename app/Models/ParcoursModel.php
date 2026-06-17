<?php

namespace App\Models;

use CodeIgniter\Model;

class ParcoursModel extends Model
{
    protected $table = 'parcours';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['nom'];

    // Règles de validation
    protected $validationRules = [
        'nom' => 'required|min_length[3]|max_length[100]',
    ];

    // Messages d'erreur en français
    protected $validationMessages = [
        'nom' => [
            'required'    => 'Le nom du parcours est obligatoire.',
            'min_length'  => 'Le nom doit avoir au minimum 3 caractères.',
            'max_length'  => 'Le nom ne doit pas dépasser 100 caractères.',
        ],
    ];
}
