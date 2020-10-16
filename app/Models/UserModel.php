<?php

namespace app\models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // protected $pager = \Config\Services::pager();
    protected $table      = 'user';
    protected $allowedFields = [
        'id',
        'password',
        'nama',
        'departemen'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    public function getUser($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }

    public function cariUser($keyword)
    {
        return $this->table('user')->like('id', $keyword)->orlike('nama', $keyword)->orlike('departemen', $keyword);
    }
}
