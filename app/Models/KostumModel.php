<?php
namespace App\Models;

use CodeIgniter\Model;

class KostumModel extends Model
{
    protected $table = 'kostum';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'deskripsi', 'gambar', 'harga', 'status'];
}
