<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {

    public function get_all_users() {
        return $this->db->table('users')->get_all();
    }
}
