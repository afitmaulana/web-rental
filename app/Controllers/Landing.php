<?php
namespace App\Controllers;

use App\Models\KostumModel;
use App\Models\PropsModel;

class Landing extends BaseController
{
    public function index()
    {
        $kostum = new KostumModel();
        $props  = new PropsModel();

        return view('landing/index', [
            'kostum' => $kostum->findAll(),
            'props'  => $props->findAll()
        ]);
    }
}
