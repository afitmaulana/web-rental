<?php
namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController {
    public function login() {
        return view('admin/login');
    }

    public function attemptLogin() {
        $userModel = new UserModel();
        $user = $userModel->where('username', $this->request->getPost('username'))->first();

        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
            session()->set('user_id', $user['id']);
            return redirect()->to('/admin/dashboard');
        }
        return redirect()->back()->with('error', 'Login gagal');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}
