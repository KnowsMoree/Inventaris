<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamBarangModel extends Model
{
    protected $table = 'pinjam_barang';
    protected $useTimestamps = true;
    protected $primaryKey = 'id_pinjam';
    protected $allowedFields = ['peminjam', 'tgl_pinjam', 'barang_pinjam', 'tgl_kembali', 'kondisi', 'jml_pinjam'];

    public function getPinjamBarang($id_pinjam = false)
    {

        if (!$id_pinjam) {
            return $this->findAll();
        }

        return $this->where(['id_pinjam' => $id_pinjam])->first();
    }

    public function minjam($peminjam, $barang_pinjam, $jml_pinjam)
    {

        $data = array('id_peminjam' => $peminjam, 'id_barang' => $barang_pinjam, 'jml_barang' => $jml_pinjam);

        $query = $this->db->query("CALL create_pinjam_barang(?, ?, ?)");
        $data = $query->getRow();
        return $data;
    }
}
