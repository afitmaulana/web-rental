<?php
namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Dummy data dulu (belum database)
        $data['costumes'] = [
            ['name' => 'Kimono Jepang', 'description' => 'Kostum tradisional Jepang', 'price' => 150000, 'image' => 'kimono.jpg'],
            ['name' => 'Baju Ksatria', 'description' => 'Kostum armor fantasy', 'price' => 200000, 'image' => 'knight.jpg'],
            ['name' => 'Putri Duyung', 'description' => 'Kostum cosplay mermaid', 'price' => 180000, 'image' => 'mermaid.jpg'],
        ];

        return view('landing_page', $data);
    }
}
