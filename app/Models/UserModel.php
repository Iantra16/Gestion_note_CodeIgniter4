<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'password'];

    // Règles de validation
    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
        'password' => 'required|min_length[6]|max_length[255]',
    ];

    // Messages d'erreur en français
    protected $validationMessages = [
        'username' => [
            'required'    => 'Le nom d\'utilisateur est obligatoire.',
            'min_length'  => 'Le nom d\'utilisateur doit avoir au minimum 3 caractères.',
            'max_length'  => 'Le nom d\'utilisateur ne doit pas dépasser 50 caractères.',
            'is_unique'   => 'Ce nom d\'utilisateur existe déjà.',
        ],
        'password' => [
            'required'    => 'Le mot de passe est obligatoire.',
            'min_length'  => 'Le mot de passe doit avoir au minimum 6 caractères.',
            'max_length'  => 'Le mot de passe ne doit pas dépasser 255 caractères.',
        ],
    ];
}
