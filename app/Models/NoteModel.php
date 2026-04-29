<?php

namespace App\Models;

use CodeIgniter\Model;

class NoteModel extends Model
{
    protected $table = 'note';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['etu_id', 'ue_id', 'valeur'];

    // Règles de validation
    protected $validationRules = [
        'etu_id' => 'required|numeric',
        'ue_id'  => 'required|numeric',
        'valeur' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[20]',
    ];

    // Messages d'erreur en français
    protected $validationMessages = [
        'etu_id' => [
            'required'    => 'L\'étudiant est obligatoire.',
            'numeric'     => 'L\'étudiant doit être un nombre valide.',
        ],
        'ue_id' => [
            'required'    => 'L\'UE est obligatoire.',
            'numeric'     => 'L\'UE doit être un nombre valide.',
        ],
        'valeur' => [
            'required'                => 'La note est obligatoire.',
            'numeric'                 => 'La note doit être un nombre.',
            'greater_than_equal_to'   => 'La note doit être supérieure ou égale à 0.',
            'less_than_equal_to'      => 'La note ne doit pas dépasser 20.',
        ],
    ];
}
