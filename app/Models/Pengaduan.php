<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengaduan extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'pengaduan';
    protected $primaryKey           = 'id_pengaduan';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['nik', 'isi_laporan', 'status', 'foto'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'tgl_pengaduan';
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
        return $this
            ->join('masyarakat', 'masyarakat.nik = pengaduan.nik')
            ->where('pengaduan.nik', session()->get('nik'))
            ->orderBy('id_pengaduan', 'desc')
            ->get()->getResultArray();
    }

    public function getPengaduanAnda($nik)
    {
        // return $this->where('nik', $nik)->find();
        $data['pgdn'] = $this->where('nik', $nik)->findAll();
    }

    public function getUrutTanggal()
    {
        return $this->db->table('pengaduan')->orderBy('tgl_pengaduan', 'desc', null);
    }

    public function jmlPengaduan()
    {
        return $this->countAll();
    }

    public function jmlPengaduanBelumDiproses()
    {
        return $this
            ->where('status', '0')
            ->countAllResults();
    }

    public function jmlPengaduanDiproses()
    {
        return $this
            ->where('status', 'proses')
            ->countAllResults();
    }

    public function jmlPengaduanSelesai()
    {
        return $this
            ->where('status', 'selesai')
            ->countAllResults();
    }
}
