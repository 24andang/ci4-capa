<?php

namespace app\models;

use CodeIgniter\Model;

class DepartemenModel extends Model
{
    // protected $pager = \Config\Services::pager();
    protected $table      = 'departemen';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    public function getDept($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }
}
