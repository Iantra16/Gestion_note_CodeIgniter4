<?php

namespace App\Models;

use CodeIgniter\Model;

class UeModel extends Model
{
    protected $table = 'ues';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['code', 'libelle', 'credits', 'id_semestre', 'id_parcours'];

    // Règles de validation
    protected $validationRules = [
        'code'        => 'required|min_length[2]|max_length[20]|is_unique[ues.code]',
        'libelle'     => 'required|min_length[3]|max_length[255]',
        'credits'     => 'permit_empty|numeric|greater_than_equal_to[0]',
        'id_semestre' => 'permit_empty|numeric',
        'id_parcours' => 'permit_empty|numeric',
    ];

    // Messages d'erreur en français
    protected $validationMessages = [
        'code' => [
            'required'    => 'Le code UE est obligatoire.',
            'min_length'  => 'Le code doit avoir au minimum 2 caractères.',
            'max_length'  => 'Le code ne doit pas dépasser 20 caractères.',
            'is_unique'   => 'Ce code UE existe déjà.',
        ],
        'libelle' => [
            'required'    => 'Le libellé est obligatoire.',
            'min_length'  => 'Le libellé doit avoir au minimum 3 caractères.',
            'max_length'  => 'Le libellé ne doit pas dépasser 255 caractères.',
        ],
        'credits' => [
            'numeric'                => 'Les crédits doivent être un nombre.',
            'greater_than_equal_to'  => 'Les crédits doivent être supérieurs ou égals à 0.',
        ],
        'id_semestre' => [
            'numeric'     => 'Le semestre doit être un nombre valide.',
        ],
        'id_parcours' => [
            'numeric'     => 'Le parcours doit être un nombre valide.',
        ],
    ];
}
