<?php

// XII RPL B wahyu hidayat

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{

    protected $barangModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Daftar User',
            'user' => $this->userModel->getUser()
        ];

        return view('user/index', $data);
    }

    public function detail($id_user)
    {

        $data = [
            'title' => 'Detail User',
            'user' => $this->userModel->getUser($id_user)
        ];

        if (empty($data['user'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Barang' . $id_user . ' tidak ditemukan.');
        }

        return view('user/detail', $data);
    }

    public function delete($id_user)
    {
        $user = $this->userModel->find($id_user);

        if ($user['foto'] != 'default.png') {
            unlink('img/' . $user['foto']);
        }

        $this->userModel->delete($id_user);
        session()->setFlashdata('pesan', 'Barang berhasil dihapus.');
        return redirect()->to('/user');
    }

    public function edit($id_user)
    {
        $data = [
            'title' => 'Form Ubah User',
            'validation' => \Config\Services::validation(),
            'user' => $this->userModel->getUser($id_user)
        ];

        return view('user/edit', $data);
    }

    public function update($id_user)
    {
        $oldUser = $this->userModel->getUser($id_user);


        if ($oldUser['username'] == $this->request->getVar('username')) {
            $rules_nama = 'required';
        } else {
            $rules_nama = 'required|is_unique[user.nama]';
        }

        if (!$this->validate([
            'username' => [
                'rules' => $rules_nama,
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'is_unique' => '{field} sudah dibuat.'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi.'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'level user harus ada'
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
            return redirect()->to('/user/edit/' . $this->request->getVar('id_user'))->withInput();
        }

        $fileFoto = $this->request->getFile('foto');

        if ($fileFoto->getError() == 4) {
            $newFoto = $this->request->getVar('fotoLama');
        } else {
            $newFoto = $fileFoto->getRandomName();

            $fileFoto->move('img', $newFoto);

            $user = $this->userModel->find($id_user);

            unlink('img/' . $user['foto']);
        }

        $this->userModel->save([
            'id_user' => $this->request->getVar('id_user'),
            'password' => $this->request->getVar('password'),
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'level' => $this->request->getVar('level'),
            'foto' => $newFoto
        ]);

        session()->setFlashdata('pesan', 'Barang berhasil diubah.');

        return redirect()->to('/user');
    }
}
