<?php

namespace app\models;

use CodeIgniter\Model;

class CapaModel extends Model
{
    // protected $pager = \Config\Services::pager();
    protected $table      = 'capa';
    protected $allowedFields = [
        'temuan',
        'kt',
        'persyaratan',
        'kondisi',
        'gap',
        'rootcause',
        'ca',
        'ca_deadtime',
        'ca_pic',
        'ca_departemen',
        'ca_bukti',
        'ca_status',
        'pa',
        'pa_deadtime',
        'pa_pic',
        'pa_bukti',
        'pa_status',
        'hasil'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    public function getCapa($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }

    public function getCapaByDept($departemen)
    {
        return $this->where('ca_departemen', $departemen);
    }

    public function search($keyword)
    {
        return $this->table('capa')->like('temuan', $keyword);
    }
}
