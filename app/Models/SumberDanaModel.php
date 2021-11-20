<?php

namespace App\Models;

use CodeIgniter\Model;

class SumberDanaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sumber_dana';
    protected $primaryKey       = 'id_sumber';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_sumber', 'keterangan'];

    public function getSumberDana($id_lokasi = false)
    {

        if (!$id_lokasi) {

            return $this->findAll();
        }

        return $this->where(['id_lokasi' => $id_lokasi])->first();
    }
}
