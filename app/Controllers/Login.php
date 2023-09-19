<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLogin;

class Login extends BaseController
{
    protected $ModelLogin; // Ubah dari public ke protected

    public function __construct()
    {
        $this->ModelLogin = new ModelLogin();
    }

    public function index()
    {
        $data = [
            'judul' => 'Login',
            'validation' => \Config\Services::validation(),
        ];
        return view('v_login', $data);
    }

    public function CekLogin()
    {
        $rules = [
            'email' => 'required|valid_email', // Tambahkan validasi email
            'password' => 'required',
        ];

        if ($this->validate($rules)) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $CekLogin = $this->ModelLogin->CekUser($email, $password);

            if ($CekLogin) {
                session()->set('nama_user', $CekLogin['nama_user']);
                session()->set('level', $CekLogin['level']);
                return redirect()->to(base_url('admin'));
            } else {
                session()->setFlashdata('gagal', 'Email atau Password Salah !!!');
                return redirect()->to(base_url('Login'));
            }
        } else {
            // Menggunakan method withInput() untuk mengembalikan data input
            return redirect()->to(base_url('Login'))->withInput()->with('errors', service('validation')->getErrors());
        }
    }

    public function LogOut()
    {
        session()->remove('nama_user');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Anda Telah Logout');
        return redirect()->to(base_url('Login'));
    }
}

