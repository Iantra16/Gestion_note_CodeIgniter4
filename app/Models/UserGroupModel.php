<?php

namespace App\Models;

use CodeIgniter\Model;

class UserGroupModel extends Model
{
    protected $table = 'user_group';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['user_id', 'group_id'];

    // Règles de validation
    protected $validationRules = [
        'user_id'  => 'required|numeric',
        'group_id' => 'required|numeric',
    ];

    // Messages d'erreur en français
    protected $validationMessages = [
        'user_id' => [
            'required'    => 'L\'utilisateur est obligatoire.',
            'numeric'     => 'L\'utilisateur doit être un nombre valide.',
        ],
        'group_id' => [
            'required'    => 'Le groupe est obligatoire.',
            'numeric'     => 'Le groupe doit être un nombre valide.',
        ],
    ];
}
