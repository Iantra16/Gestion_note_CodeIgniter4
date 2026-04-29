<?php

namespace App\Models;

use CodeIgniter\Model;

class EtudiantModel extends Model
{
    protected $table = 'etudiant';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['num_etu', 'nom', 'prenom'];

    // Règles de validation
    protected $validationRules = [
        'num_etu' => 'required|min_length[3]|max_length[20]|is_unique[etudiant.num_etu]',
        'nom'     => 'required|min_length[2]|max_length[255]',
        'prenom'  => 'required|min_length[2]|max_length[255]',
    ];

    // Messages d'erreur en français
    protected $validationMessages = [
        'num_etu' => [
            'required'    => 'Le numéro étudiant est obligatoire.',
            'min_length'  => 'Le numéro doit avoir au minimum 3 caractères.',
            'max_length'  => 'Le numéro ne doit pas dépasser 20 caractères.',
            'is_unique'   => 'Ce numéro étudiant existe déjà.',
        ],
        'nom' => [
            'required'    => 'Le nom de l\'étudiant est obligatoire.',
            'min_length'  => 'Le nom doit avoir au minimum 2 caractères.',
            'max_length'  => 'Le nom ne doit pas dépasser 255 caractères.',
        ],
        'prenom' => [
            'required'    => 'Le prénom est obligatoire.',
            'min_length'  => 'Le prénom doit avoir au minimum 2 caractères.',
            'max_length'  => 'Le prénom ne doit pas dépasser 255 caractères.',
        ],
    ];
}
