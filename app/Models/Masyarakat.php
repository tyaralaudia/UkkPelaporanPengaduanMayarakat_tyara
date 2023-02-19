<?php

namespace App\Models;

use CodeIgniter\Model;

class Masyarakat extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'masyarakat';
    protected $primaryKey           = 'username';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['username', 'password', 'nama', 'nik', 'telp'];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    public function getMasy()
    {
        return $this->db()->table('masyarakat')->join('pengaduan', 'pengaduan.nik = masyarakat.nik')->get()->getResultArray();
    }

    public function getNama($nama)
    {
        return $this->db()->table('masyarakat')->select('nama')->where('nama', $nama)->get();
    }
}
