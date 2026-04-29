<?php

namespace App\Models;

use CodeIgniter\Model;

class NoteModel extends Model
{
    protected $table = 'notes';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_etudiant', 'id_ue', 'note'];

    // Règles de validation
    protected $validationRules = [
        'id_etudiant' => 'required|numeric',
        'id_ue'       => 'required|numeric',
        'note'        => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[20]',
    ];

    // Messages d'erreur en français
    protected $validationMessages = [
        'id_etudiant' => [
            'required'    => 'L\'étudiant est obligatoire.',
            'numeric'     => 'L\'étudiant doit être un nombre valide.',
        ],
        'id_ue' => [
            'required'    => 'L\'UE est obligatoire.',
            'numeric'     => 'L\'UE doit être un nombre valide.',
        ],
        'note' => [
            'required'                => 'La note est obligatoire.',
            'numeric'                 => 'La note doit être un nombre.',
            'greater_than_equal_to'   => 'La note doit être supérieure ou égale à 0.',
            'less_than_equal_to'      => 'La note ne doit pas dépasser 20.',
        ],
    ];
}
