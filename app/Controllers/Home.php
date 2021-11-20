<?php

namespace App\Controllers;

use App\Models\PinjamBarangModel;
use App\Models\UserModel;

class Home extends BaseController
{

    protected $PinjamBarangModel;

    public function __construct()
    {
        $this->pinjamBarangModel = new PinjamBarangModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Dashboard',
            'pinjamBarang' => $this->pinjamBarangModel->getPinjamBarang(),
            'user' => $this->userModel->getUser()
        ];

        return view('dashboard', $data);
    }
}
