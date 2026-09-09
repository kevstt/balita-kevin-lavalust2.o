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
            redirect('product');
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
        $accounts = [
            [
                'username' => getenv('ADMIN_USERNAME') ?: 'admin',
                'password' => getenv('ADMIN_PASSWORD') ?: 'change-me',
                'role' => 'admin',
            ],
            [
                'username' => getenv('USER_USERNAME') ?: 'user',
                'password' => getenv('USER_PASSWORD') ?: 'user123',
                'role' => 'user',
            ],
        ];

        $account = null;
        foreach ($accounts as $candidate) {
            if ($username === $candidate['username'] && hash_equals($candidate['password'], $password)) {
                $account = $candidate;
                break;
            }
        }

        if ($account === null) {
            unset($_SESSION['authenticated'], $_SESSION['username'], $_SESSION['role']);
            $_SESSION['login_error'] = 'The credentials do not match. Please try again.';
            redirect('login');
            return;
        }

        session_regenerate_id(true);
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $account['role'];
        $destination = $_SESSION['auth_redirect'] ?? 'product';
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