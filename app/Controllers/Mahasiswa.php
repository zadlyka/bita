<?php

namespace App\Controllers;

use App\Models\AjuanModel;
use App\Models\UserModel;
use Dompdf\Dompdf;


class Mahasiswa extends BaseController
{
    protected $ajuanmodel, $usermodel, $session;
    public function __construct()
    {
        helper('text');
        $this->ajuanmodel = new AjuanModel();
        $this->usermodel = new UserModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        if (!$this->session->get("userid")) {
            $this->session->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong> Silahkan login terlebih dahulu.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            return redirect('/');
        }

        $data = [
            'userid' => $this->session->get("userid"),
            'nama' => $this->session->get("nama"),
            'disetujui' => $this->ajuanmodel->where('status', 'Disetujui')
                ->where('userid', $this->session->get("userid"))->findAll(),
            'ditolak' => $this->ajuanmodel->where('status', 'Ditolak')
                ->where('userid', $this->session->get("userid"))->findAll()
        ];

        return view('content/mahasiswa/index', $data);
    }

    public function pengajuan()
    {
        if (!$this->session->get("userid")) {
            $this->session->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong> Silahkan login terlebih dahulu.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            return redirect('/');
        }

        $data = [
            'ajuan' => $this->ajuanmodel->where('userid', $this->session->get("userid"))->findAll(),
            'userid' => $this->session->get("userid"),
            'nama' => $this->session->get("nama")
        ];

        return view('content/mahasiswa/pengajuan', $data);
    }



    public function insert()
    {
        $dosen = $this->usermodel->find($this->request->getPost('nip'));

        do {
            $ajuanid = random_string('numeric', 10);
        } while ($this->ajuanmodel->find($ajuanid));

        if ($dosen['role'] == 'Dosen') {
            $this->ajuanmodel->save(
                [
                    'ajuanid' => $ajuanid,
                    'userid' => $this->request->getPost('userid'),
                    'nip_dosen' => $this->request->getPost('nip'),
                    'nama_dosen' => $dosen['nama'],
                    'nama_mhs' => $this->request->getPost('nama_mhs'),
                    'nim_mhs' => $this->request->getPost('userid'),
                    'jurusan' => $this->request->getPost('jurusan'),
                    'keterangan' => $this->request->getPost('keterangan'),
                    'pilihan_tgl_mulai' => date($this->request->getPost('tgl_mulai')),
                    'pilihan_tgl_akhir' => date($this->request->getPost('tgl_akhir')),
                    'status' => 'Proses'
                ]
            );

            $this->session->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Submited!</strong> Ajuan telah disubmit.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        } else {
            $this->session->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong> NIP Tidak ditemukan.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        }

        return redirect()->to('/Mahasiswa/pengajuan/');
    }

    public function delete($id)
    {
        $this->session->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Deleted!</strong> Ajuan telah dihapus.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');

        $this->ajuanmodel->delete($id);
        return redirect()->to('/Mahasiswa/pengajuan/');
    }

    public function print($id)
    {
        $ajuan = $this->ajuanmodel->find($id);
        $data = [
            'ajuan' => $ajuan
        ];

        $filename = $ajuan['ajuanid'] . '-BiTA';
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        // load HTML content
        $dompdf->loadHtml(view('layout/print', $data));
        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
        // render html as PDF
        $dompdf->render();
        // output the generated pdf
        $dompdf->stream($filename);

        return redirect()->to('/mahasiswa/pengajuan/');
    }
}
