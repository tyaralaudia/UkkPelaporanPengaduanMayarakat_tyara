<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengaduan extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'pengaduan';
    protected $primaryKey           = 'tgl_pengaduan';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['tgl_pengaduan', 'nik', 'isi_laporan', 'status', 'foto'];

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

    public function getPengaduan()
    {
        return $this->db->table('pengaduan')->join('masyarakat', 'masyarakat.nik = pengaduan.nik')
            ->get()->getResultArray();
    }

    public function getPengaduanAnda($nik)
    {
        // return $this->db->table('pengaduan')->where('nik', $nik)->find();
        $data['pgdn'] = $this->db->table('pengaduan')->select('*')->where('nik', $nik)->findAll();
    }

    public function getUrutTanggal()
    {
        return $this->db->table('pengaduan')->orderBy('tgl_pengaduan', 'desc', null);
    }
}
