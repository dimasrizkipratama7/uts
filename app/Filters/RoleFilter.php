<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $role = $session->get('role');

        // Jika belum login
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        // Cek apakah role cocok dengan argumen filter
        if ($arguments && !in_array($role, $arguments)) {
            // Redirect ke dashboard sesuai role
            return redirect()->to('/' . $role)->with('error', 'Akses ditolak');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu
    }
}
