<?php

namespace App\Models;

use CodeIgniter\Model;

class Tanggapan extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tanggapan';
    protected $primaryKey           = 'tgl_tanggapan';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['id_pengaduan', 'id_tanggapan', 'tgl_tanggapan', 'tanggapan', 'id_petugas'];

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

    public function getTanggapan()
    {
        return $this->db()->table('tanggapan')->join('pengaduan', 'pengaduan.id_pengaduan = tanggapan.id_pengaduan')->join('masyarakat', 'masyarakat.nik = pengaduan.nik')->join('petugas', 'petugas.id_petugas = tanggapan.id_petugas')->get()->getResultArray();
    }

    public function getTanggapanAnda()
    {
    }
}
