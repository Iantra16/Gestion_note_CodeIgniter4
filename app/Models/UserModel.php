<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['nom', 'prenom', 'pwd'];

    // Événements : hasher le password avant insertion/mise à jour
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    // Règles de validation
    protected $validationRules = [
        'nom'   => 'required|min_length[3]|max_length[255]',
        'prenom' => 'permit_empty|max_length[255]',
        'pwd'   => 'required|min_length[6]|max_length[255]',
    ];

    // Messages d'erreur en français
    protected $validationMessages = [
        'nom' => [
            'required'    => 'Le nom est obligatoire.',
            'min_length'  => 'Le nom doit avoir au minimum 3 caractères.',
            'max_length'  => 'Le nom ne doit pas dépasser 255 caractères.',
        ],
        'prenom' => [
            'max_length'  => 'Le prénom ne doit pas dépasser 255 caractères.',
        ],
        'pwd' => [
            'required'    => 'Le mot de passe est obligatoire.',
            'min_length'  => 'Le mot de passe doit avoir au minimum 6 caractères.',
            'max_length'  => 'Le mot de passe ne doit pas dépasser 255 caractères.',
        ],
    ];

    /**
     * Hash le mot de passe avant insertion/mise à jour.
     */
    protected function hashPassword(array $data)
    {
        if (isset($data['data']['pwd'])) {
            $data['data']['pwd'] = password_hash($data['data']['pwd'], PASSWORD_BCRYPT);
        }
        return $data;
    }
}
