<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function index(): string
    {
        return view('auth/login', [
            'pageTitle' => 'Connexion',
            'username' => 'admin',
            'password' => 'admin123',
        ]);
    }

    public function login()
    {
        return redirect()->to('/etudiants');
    }

    public function logout()
    {
        return redirect()->to('/login');
    }
}