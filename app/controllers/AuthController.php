<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function login()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!empty($_SESSION['authenticated'])) {
            redirect('products');
        }

        $this->call->view('auth/login', [
            'error' => $_SESSION['login_error'] ?? null,
        ]);
        unset($_SESSION['login_error']);
    }

    public function authenticate()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $username = trim((string) ($this->io->post('username') ?? ''));
        $password = (string) ($this->io->post('password') ?? '');
        $expectedUsername = getenv('ADMIN_USERNAME') ?: 'admin';
        $expectedPassword = getenv('ADMIN_PASSWORD') ?: 'change-me';

        if ($username !== $expectedUsername || !hash_equals($expectedPassword, $password)) {
            $_SESSION['login_error'] = 'The credentials do not match. Please try again.';
            redirect('login');
        }

        session_regenerate_id(true);
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;
        $destination = $_SESSION['auth_redirect'] ?? 'products';
        unset($_SESSION['auth_redirect']);
        redirect($destination);
    }

    public function logout()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $_SESSION = [];
        session_destroy();
        redirect('login');
    }
}