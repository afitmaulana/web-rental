<?php

namespace App\Models;

use CodeIgniter\Model;

class KostumModel extends Model
{
    protected $table = 'kostum';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'deskripsi', 'ukuran', 'gambar', 'harga', 'status', 'created_at', 'updated_at'];
    protected $useTimestamps = true; // Aktifkan timestamps otomatis
}