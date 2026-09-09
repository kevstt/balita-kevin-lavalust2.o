<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersModel extends Model {

    protected $table = 'users';

    public function all() {
        return $this->db->table($this->table)
            ->order_by('id', 'ASC')
            ->get_all();
    }
}
