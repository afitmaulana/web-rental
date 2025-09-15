<?php

namespace App\Controllers;

use App\Models\KostumModel;
use App\Models\PropsModel;

class Admin extends BaseController
{
    // ... (method index() tidak berubah)
    public function index()
    {
        $kostumModel = new KostumModel();
        $propsModel = new PropsModel();
        
        $data = [
            'total_kostum' => $kostumModel->countAllResults(),
            'total_props' => $propsModel->countAllResults(),
            'total_transaksi' => 0,
            'total_member' => 0
        ];

        return view('admin/dashboard', $data);
    }
    
    // --- FUNGSI CRUD KOSTUM ---
    public function kostum()
    {
        $kostumModel = new KostumModel();
        $data['kostums'] = $kostumModel->findAll();
        return view('admin/kostum', $data);
    }

    public function kostum_store()
    {
        $kostumModel = new KostumModel();
        $rules = [
            'nama'  => 'required|min_length[3]|max_length[255]',
            'harga' => 'required|numeric',
            'gambar'=> 'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $img = $this->request->getFile('gambar');
        $newName = $img->getRandomName();
        $img->move(ROOTPATH . 'public/uploads', $newName);

        $kostumModel->save([
            'nama'      => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'ukuran'    => $this->request->getPost('ukuran'),
            'harga'     => $this->request->getPost('harga'),
            'status'    => 'tersedia',
            'gambar'    => $newName,
        ]);

        return redirect()->to('/admin/kostum')->with('success', 'Kostum berhasil ditambahkan!');
    }

    public function kostum_edit($id)
    {
        $kostumModel = new KostumModel();
        $data['kostum'] = $kostumModel->find($id);
        return view('admin/kostum_edit', $data);
    }

    public function kostum_update($id)
    {
        $kostumModel = new KostumModel();
        $dataLama = $kostumModel->find($id);

        $rules = [
            'nama'  => 'required|min_length[3]|max_length[255]',
            'harga' => 'required|numeric',
            'gambar'=> 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $img = $this->request->getFile('gambar');
        if ($img->isValid() && !$img->hasMoved()) {
            // Hapus gambar lama
            if (file_exists(ROOTPATH . 'public/uploads/' . $dataLama['gambar'])) {
                unlink(ROOTPATH . 'public/uploads/' . $dataLama['gambar']);
            }
            // Upload gambar baru
            $newName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads', $newName);
        } else {
            $newName = $dataLama['gambar'];
        }

        $kostumModel->update($id, [
            'nama'      => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'ukuran'    => $this->request->getPost('ukuran'),
            'harga'     => $this->request->getPost('harga'),
            'status'    => $this->request->getPost('status'),
            'gambar'    => $newName,
        ]);

        return redirect()->to('/admin/kostum')->with('success', 'Data kostum berhasil diperbarui!');
    }

    public function kostum_delete($id)
    {
        $kostumModel = new KostumModel();
        $data = $kostumModel->find($id);

        // Hapus file gambar
        if ($data && file_exists(ROOTPATH . 'public/uploads/' . $data['gambar'])) {
            unlink(ROOTPATH . 'public/uploads/' . $data['gambar']);
        }
        
        $kostumModel->delete($id);
        return redirect()->to('/admin/kostum')->with('success', 'Kostum berhasil dihapus!');
    }

    // --- FUNGSI CRUD PROPS ---
    public function props()
    {
        $propsModel = new PropsModel();
        $data['props_list'] = $propsModel->findAll();
        return view('admin/props', $data);
    }

    public function props_store()
    {
        $propsModel = new PropsModel();
        $rules = [
            'nama'  => 'required|min_length[3]|max_length[255]',
            'harga' => 'required|numeric',
            'gambar'=> 'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $img = $this->request->getFile('gambar');
        $newName = $img->getRandomName();
        $img->move(ROOTPATH . 'public/uploads', $newName);

        $propsModel->save([
            'nama'      => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga'     => $this->request->getPost('harga'),
            'status'    => 'tersedia',
            'gambar'    => $newName,
        ]);

        return redirect()->to('/admin/props')->with('success', 'Props berhasil ditambahkan!');
    }

    public function props_edit($id)
    {
        $propsModel = new PropsModel();
        $data['prop'] = $propsModel->find($id);
        return view('admin/props_edit', $data);
    }

    public function props_update($id)
    {
        $propsModel = new PropsModel();
        $dataLama = $propsModel->find($id);

        $rules = [
            'nama'  => 'required|min_length[3]|max_length[255]',
            'harga' => 'required|numeric',
            'gambar'=> 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $img = $this->request->getFile('gambar');
        if ($img->isValid() && !$img->hasMoved()) {
            if (file_exists(ROOTPATH . 'public/uploads/' . $dataLama['gambar'])) {
                unlink(ROOTPATH . 'public/uploads/' . $dataLama['gambar']);
            }
            $newName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads', $newName);
        } else {
            $newName = $dataLama['gambar'];
        }

        $propsModel->update($id, [
            'nama'      => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga'     => $this->request->getPost('harga'),
            'status'    => $this->request->getPost('status'),
            'gambar'    => $newName,
        ]);

        return redirect()->to('/admin/props')->with('success', 'Data props berhasil diperbarui!');
    }
    
    public function props_delete($id)
    {
        $propsModel = new PropsModel();
        $data = $propsModel->find($id);

        if ($data && file_exists(ROOTPATH . 'public/uploads/' . $data['gambar'])) {
            unlink(ROOTPATH . 'public/uploads/' . $data['gambar']);
        }
        
        $propsModel->delete($id);
        return redirect()->to('/admin/props')->with('success', 'Props berhasil dihapus!');
    }

    public function pembayaran()
    {
        return view('admin/pembayaran');
    }
}