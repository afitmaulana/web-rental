<?php
namespace App\Models;

use CodeIgniter\Model;

class PropsModel extends Model
{
    protected $table = 'props';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'deskripsi', 'gambar', 'harga', 'status'];
}
