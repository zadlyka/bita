<?php

namespace App\Models;

use CodeIgniter\Model;

class AjuanModel extends Model
{
    // ...
    protected $table = 'ajuan';
    protected $primaryKey = 'ajuanid';
    protected $useAutoIncrement = false;
    protected $useTimestamps = true;

    protected $allowedFields = ['ajuanid', 'userid', 'keterangan', 'nama_dosen', 'nip_dosen', 'nama_mhs', 'nim_mhs', 'jurusan', 'tanggal_bim', 'jam_bim', 'pilihan_tgl_mulai', 'pilihan_tgl_akhir', 'status'];
}
