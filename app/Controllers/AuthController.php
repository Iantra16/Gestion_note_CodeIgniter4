<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        parent::__construct();
        $this->userModel = model(UserModel::class);
    }

    public function index()
    {
        // Si déjà connecté, rediriger vers le dashboard
        if (session('user_id')) {
            return redirect()->to('/etudiants');
        }

        return view('auth/login', [
            'pageTitle' => 'Connexion',
        ]);
    }

    public function login()
    {
        // Récupérer les données POST
        $nom = $this->request->getPost('nom');
        $pwd = $this->request->getPost('pwd');

        if (!$nom || !$pwd) {
            return redirect()->back()->with('error', 'Veuillez entrer un nom et un mot de passe.');
        }

        // Chercher l'utilisateur par nom
        $user = $this->userModel->where('nom', $nom)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Identifiants invalides.');
        }

        // Vérifier le mot de passe
        if (!password_verify($pwd, $user['pwd'])) {
            return redirect()->back()->with('error', 'Identifiants invalides.');
        }

        // Créer la session
        session()->set([
            'user_id'   => $user['id'],
            'user_nom'  => $user['nom'],
            'user_prenom' => $user['prenom'],
            'logged_in' => true,
        ]);

        return redirect()->to('/etudiants');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
