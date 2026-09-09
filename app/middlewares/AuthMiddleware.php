<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthMiddleware
{
    public function handle($next)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $role = $_SESSION['role'] ?? '';
        if (empty($_SESSION['authenticated']) || !in_array($role, ['admin', 'user'], true)) {
            unset($_SESSION['authenticated'], $_SESSION['username'], $_SESSION['role']);
            $_SESSION['auth_redirect'] = $_SERVER['REQUEST_URI'] ?? '/product';
            redirect('login');
            exit();
        }

        return $next();
    }
}