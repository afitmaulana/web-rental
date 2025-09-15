<?php
namespace App\Models;

use CodeIgniter\Model;

class PropsModel extends Model
{
    protected $table = 'props';
    protected $primaryKey = 'id';
    // Perbarui allowedFields dan tambahkan useTimestamps
    protected $allowedFields = ['nama', 'deskripsi', 'gambar', 'harga', 'status', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}