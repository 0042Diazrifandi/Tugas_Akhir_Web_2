<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\Config\Services;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $role = session()->get('hak_akses');

        if (in_array($role, $arguments)) {
            return;
        }

        return redirect()->to('/')->with('error', 'Akses ditolak.');
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
