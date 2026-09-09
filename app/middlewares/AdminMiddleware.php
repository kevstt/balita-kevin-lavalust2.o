<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AdminMiddleware
{
    public function handle($next)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (($_SESSION['role'] ?? '') !== 'admin') {
            $_SESSION['product_flash'] = 'Read-only accounts cannot change products.';
            redirect('product');
            exit();
        }

        return $next();
    }
}