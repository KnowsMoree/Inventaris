<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('login/index', $data);
    }

    public function auth()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $dataUser = $this->userModel->where([
            'username' => $username
        ])->first();

        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                session()->set([
                    'username'  => $dataUser['username'],
                    'nama'      => $dataUser['nama'],
                    'foto'      => $dataUser['foto'],
                    'logged_in' => TRUE
                ]);
                session()->setFlashdata('logged', 'Selamat anda berhasil masuk');
                return redirect()->to(base_url('home'));
            } else {
                session()->setFlashdata('error', 'username/password salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'username/password anda salah');
            return redirect()->back();
        }
    }


    function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
