<?php

namespace App\Models;

use CodeIgniter\Model;

class SemestreModel extends Model
{
    protected $table = 'semestre';
    protected $primaryKey = 'idSemestre';
    protected $useTimestamps = true;
    protected $allowedFields = ['numero', 'libelle'];

    // Règles de validation
    protected $validationRules = [
        'numero'  => 'required|numeric',
        'libelle' => 'required|min_length[2]|max_length[50]',
    ];

    // Messages d'erreur en français
    protected $validationMessages = [
        'numero' => [
            'required'    => 'Le numéro du semestre est obligatoire.',
            'numeric'     => 'Le numéro doit être un nombre.',
        ],
        'libelle' => [
            'required'    => 'Le libellé du semestre est obligatoire.',
            'min_length'  => 'Le libellé doit avoir au minimum 2 caractères.',
            'max_length'  => 'Le libellé ne doit pas dépasser 50 caractères.',
        ],
    ];
}
