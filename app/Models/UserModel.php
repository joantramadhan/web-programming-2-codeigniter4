<?php 

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table      = 'users'; // Nama tabel di database kamu
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password']; // Kolom yang bisa diakses
}