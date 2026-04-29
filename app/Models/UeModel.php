<?php

namespace App\Models;

use CodeIgniter\Model;

class UeModel extends Model
{
    protected $table = 'ue';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['code', 'intitule', 'credit'];

    // Règles de validation
    protected $validationRules = [
        'code'      => 'required|min_length[2]|max_length[20]|is_unique[ue.code]',
        'intitule'  => 'required|min_length[3]|max_length[255]',
        'credit'    => 'required|numeric|greater_than_equal_to[0]',
    ];

    // Messages d'erreur en français
    protected $validationMessages = [
        'code' => [
            'required'    => 'Le code UE est obligatoire.',
            'min_length'  => 'Le code doit avoir au minimum 2 caractères.',
            'max_length'  => 'Le code ne doit pas dépasser 20 caractères.',
            'is_unique'   => 'Ce code UE existe déjà.',
        ],
        'intitule' => [
            'required'    => 'L\'intitulé est obligatoire.',
            'min_length'  => 'L\'intitulé doit avoir au minimum 3 caractères.',
            'max_length'  => 'L\'intitulé ne doit pas dépasser 255 caractères.',
        ],
        'credit' => [
            'required'                => 'Les crédits sont obligatoires.',
            'numeric'                 => 'Les crédits doivent être un nombre.',
            'greater_than_equal_to'   => 'Les crédits doivent être supérieurs ou égals à 0.',
        ],
    ];
}
