<?php

namespace App\Models;

use CodeIgniter\Model;

class LokasiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'lokasi';
    protected $primaryKey       = 'id_lokasi';
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_lokasi', 'penanggung_jawab', 'keterangan'];

    public function getLokasi($id_lokasi = false)
    {

        if (!$id_lokasi) {

            return $this->findAll();
        }

        return $this->where(['id_lokasi' => $id_lokasi])->first();
    }
}
