<?php

namespace App\Controllers;

use App\Models\UserModel;

class Register extends BaseController
{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Registrasi',
            'validation' => \Config\Services::validation()
        ];
        return view('register/index', $data);
    }

    public function save()
    {
        helper(['form']);

        if (!$this->validate([
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                    'is_unique' => '{field} sudah digunakan sebelumnya'
                ]
            ],
            'nama' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'password_conf' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password sebelumnya',
                ]
            ],
            'foto' => [
                'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'file yang anda upload bukan bentuk gambar',
                    'mime_in' => 'file yang anda upload bukan bentuk gambar'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $fileFoto = $this->request->getFile('foto');

        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.png';
        } else {
            $namaFoto = $fileFoto->getRandomName();

            $fileFoto->move('img', $namaFoto);
        }

        $newIdUser = $this->userModel->getNewId();

        foreach ($newIdUser as $newId)

            $this->userModel->insert([
                'id_user'  => $newId,
                'nama'     => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'level'    => $this->request->getVar('level'),
                'foto'     => $namaFoto
            ]);

        session()->setFlashdata('regis', 'selamat akun anda telah dibuat, silahkan login');

        return redirect()->to('/login');
    }
}
