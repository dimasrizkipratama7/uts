<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $session = session();
        if ($session->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak');
        }

        return view('dashboard/admin', [
            'username' => $session->get('username'),
            'roleMessage' => 'Ini adalah halaman khusus admin.'
        ]);
    }

    public function userDashboard()
    {
        $session = session();
        if ($session->get('role') !== 'user') {
            return redirect()->to('/')->with('error', 'Akses ditolak');
        }

        return view('dashboard/user', [
            'username' => $session->get('username'),
            'roleMessage' => 'Ini adalah halaman khusus user.'
        ]);
    }
}
