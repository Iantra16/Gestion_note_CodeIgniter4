<?php

namespace App\Models;

use CodeIgniter\Model;

class SemestreModel extends Model
{
    protected $table = 'semestres';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['nom'];

    // Règles de validation
    protected $validationRules = [
        'nom' => 'required|min_length[2]|max_length[50]',
    ];

    // Messages d'erreur en français
    protected $validationMessages = [
        'nom' => [
            'required'    => 'Le nom du semestre est obligatoire.',
            'min_length'  => 'Le nom doit avoir au minimum 2 caractères.',
            'max_length'  => 'Le nom ne doit pas dépasser 50 caractères.',
        ],
    ];
}
