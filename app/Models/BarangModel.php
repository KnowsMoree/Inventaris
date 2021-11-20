<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $useTimestamps = true;
    protected $primaryKey = 'id_barang';
    protected $allowedFields = ['id_barang', 'nama_barang', 'spesifikasi', 'kondisi', 'jumlah_barang', 'created_at', 'updated_at'];

    public function getBarang($id_barang = false)
    {

        if (!$id_barang) {

            return $this->findAll();
        }

        return $this->where(['id_barang' => $id_barang])->first();
    }
}
