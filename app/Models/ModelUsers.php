<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUsers extends Model {
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $allowedFields = ['lab_id', 'period', 'cert', 'alamat', 'sk', 'name', 'npm', 'ttl', 'role', 'praktikum'];

    public function insertData($data)
    {
        return $this->insert($data);
    }
}