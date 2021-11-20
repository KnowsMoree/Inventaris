<?php

namespace App\Controllers;

use App\Models\PinjamBarangModel;
use App\Models\UserModel;
use App\Models\BarangModel;

class Pinjam extends BaseController
{

    protected $pinjamBarangModel;
    protected $userModel;
    protected $barangModel;

    public function __construct()
    {
        $this->pinjamBarangModel = new PinjamBarangModel();
        $this->userModel = new UserModel();
        $this->barangModel = new BarangModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Daftar Peminjaman',
            'pinjamBarang' => $this->pinjamBarangModel->getPinjamBarang(),
            'user'  => $this->userModel->getUser(),
            'barang' => $this->barangModel->getBarang()
        ];

        return view('pinjam/index', $data);
    }

    public function detail($id_pinjam)
    {

        $data = [
            'title' => 'Detail pinjam',
            'pinjamBarang' => $this->pinjamBarangModel->getPinjamBarang($id_pinjam)
        ];

        if (empty($data['pinjamBarang'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('ID Barang ' . $id_pinjam . ' tidak ditemukan.');
        }

        return view('pinjam/detail', $data);
    }

    public function delete($id_pinjam)
    {
        $this->pinjamBarangModel->delete($id_pinjam);
        session()->setFlashdata('pesan', 'Data Pinjam berhasil dihapus.');
        return redirect()->to('/pinjam');
    }

    public function create()
    {

        $data = [
            'title'      => 'Form peminjaman',
            'validation' => \Config\Services::validation(),
            'user'       => $this->userModel->getUser(),
            'barang'     => $this->barangModel->getBarang()
        ];

        return view('pinjam/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'peminjam' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} harus diisi.',
                ]
            ],
            'barang_pinjam' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' => 'barang harus diisi'
                ]
            ],
            'jml_pinjam' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} harus diisi.',
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/pinjam/create')->withInput();
        }

        $peminjam   = $this->request->getVar('peminjam');
        $barang     = $this->request->getVar('barang_pinjam');
        $jml        = $this->request->getVar('jml_pinjam');

        $jumlah     = intval($jml);

        $this->pinjamBarangModel->query("CALL create_pinjam_barang('" . $peminjam . "','" . $barang . "','" . $jumlah . "');");

        session()->setFlashdata('pesan', 'Berhasil meminjam barang.');
        return redirect()->to('/pinjam');
    }
}
