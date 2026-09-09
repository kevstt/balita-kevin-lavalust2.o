<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->call->database();
        $this->ensure_users_table();
    }

    private function ensure_users_table() {
        $this->db->raw("CREATE TABLE IF NOT EXISTS users (
            id INT NOT NULL AUTO_INCREMENT,
            firstname VARCHAR(100) NULL,
            lastname VARCHAR(100) NULL,
            email VARCHAR(255) NOT NULL,
            username VARCHAR(100) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            UNIQUE KEY email_unique (email),
            UNIQUE KEY username_unique (username)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        $existing = $this->db->table('users')->count();

        if ((int) $existing === 0) {
            $seed = [
                ['firstname' => 'Juan', 'lastname' => 'Dela Cruz', 'email' => 'juan@example.com', 'username' => 'juan01'],
                ['firstname' => 'Maria', 'lastname' => 'Santos', 'email' => 'maria@example.com', 'username' => 'maria02'],
                ['firstname' => 'Pedro', 'lastname' => 'Reyes', 'email' => 'pedro@example.com', 'username' => 'pedro03'],
            ];

            foreach ($seed as $user) {
                $this->db->table('users')->insert($user);
            }
        }
    }

    public function index() {
        $this->UsersModel = $this->call->model('UsersModel');
        $data['users'] = $this->UsersModel->all();
        $this->call->view('user_list', $data);
    }
}