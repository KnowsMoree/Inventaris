<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $primaryKey = "id_user";
    protected $returnType = "array";
    protected $useTimestamps = false;
    protected $allowedFields = ['id_user', 'username', 'password', 'nama', 'foto', 'level'];

    public function getUser($id_user = false)
    {
        if ($id_user == false) {
            return $this->db->table('listuser')
                ->get()->getResultArray();
        }

        return $this->where(['id_user' => $id_user])->first();
    }

    public function getNewId()
    {
        $query = $this->db->query("SELECT newiduser()");
        $row = $query->getRow();
        return $row;
    }
}
