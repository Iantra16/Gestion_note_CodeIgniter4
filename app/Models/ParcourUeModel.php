<?php

namespace App\Models;

use CodeIgniter\Model;

class ParcourUeModel extends Model
{
    protected $table = 'parcour_ue';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['parcours_id', 'ue_id', 'semestre_id', 'obli', 'groupe'];

    // Règles de validation
    protected $validationRules = [
        'parcours_id' => 'required|numeric',
        'ue_id'       => 'required|numeric',
        'semestre_id' => 'required|numeric',
        'obli'        => 'permit_empty|in_list[0,1]',
        'groupe'      => 'permit_empty|max_length[50]',
    ];

    // Messages d'erreur en français
    protected $validationMessages = [
        'parcours_id' => [
            'required'    => 'Le parcours est obligatoire.',
            'numeric'     => 'Le parcours doit être un nombre valide.',
        ],
        'ue_id' => [
            'required'    => 'L\'UE est obligatoire.',
            'numeric'     => 'L\'UE doit être un nombre valide.',
        ],
        'semestre_id' => [
            'required'    => 'Le semestre est obligatoire.',
            'numeric'     => 'Le semestre doit être un nombre valide.',
        ],
        'obli' => [
            'in_list'     => 'Le statut doit être 0 ou 1.',
        ],
        'groupe' => [
            'max_length'  => 'Le groupe ne doit pas dépasser 50 caractères.',
        ],
    ];
}
