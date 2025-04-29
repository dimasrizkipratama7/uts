<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login'); // Tampilkan form login
    }

    public function loginProcess()
    {
        $session = session();
        $request = service('request');

        // Data user hardcode
        $users = [
            'admin' => [
                'password' => password_hash('123admin', PASSWORD_DEFAULT),
                'role' => 'admin',
                'name' => 'Admin User'
            ],
            'user' => [
                'password' => password_hash('123user', PASSWORD_DEFAULT),
                'role' => 'user',
                'name' => 'Regular User'
            ]
        ];


        $username = $request->getPost('username');
        $password = $request->getPost('password');

        if (isset($users[$username]) && password_verify($password, $users[$username]['password'])) {
            $session->set([
                'username' => $username,
                'name' => $users[$username]['name'],
                'role' => $users[$username]['role'],
                'isLoggedIn' => true
            ]);
            return redirect()->to('/' . $users[$username]['role']);
        }


        return redirect()->to('/')->with('error', 'Username atau password salah.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
