<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AjuanModel;

class Dosen extends BaseController
{
    protected $ajuanmodel, $usermodel, $session, $uri; 
    public function __construct()
    {
        $this->ajuanmodel = new AjuanModel();
        $this->usermodel = new UserModel();
        $this->session = \Config\Services::session();
        //$this->uri = current_url(true);
        //$this->uri = \Config\Services::request();
    }
    
    public function index()
    {
        //index code
        if (!$this->session->get('userid')) {
            $this->session->setFlashdata('alert', 
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong>Silahkan login terlebih dahulu.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            return redirect('/');
        }

        $data = [
            'userid' => $this->session->get("userid"),
            'nama' => $this->session->get("nama"),
            'pengajuan' => $this->ajuanmodel->where('status', 'Proses')
                ->where('nip_dosen', $this->session->get("userid"))->findAll(),
            'ditolak' => $this->ajuanmodel->where('status', 'Ditolak')
                ->where('nip_dosen', $this->session->get("userid"))->findAll()
        ];

        return view('content/dosen/index', $data);
    }

    public function pengajuan()
    {
        //$this->uri = \Config\Services::request();
        if (!$this->session->get("userid")) {
            $this->session->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong> Silahkan login terlebih dahulu.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            return redirect('/');
        }

        $data = [
            'ajuan' => $this->ajuanmodel->where('nip_dosen', $this->session->get("userid"))->findAll(),
            'userid' => $this->session->get("userid"),
            'nama' => $this->session->get("nama")
        ];

        return view('content/dosen/pengajuan', $data);
    }
    
    public function show($id = null)
    {
        //show code
    }
    
    public function new()
    {
        //new code
    }
    
    public function create()
    {
        //create code
    }
    
    public function edit($id = null)
    {
        //\edit code
    }
    
    public function update($id = null)
    {
        //\update code
        $id = $this->ajuanmodel->find($this->request->getPost('id_ajuan'));
        $data = [
            'tanggal_bim' => date($this->request->getPost('tgl_bim')),
            'jam_bim' => date($this->request->getPost('jam_bim')),
            'status' => 'Disetujui'
        ];
        $this->ajuanmodel->update($id, $data
            
        );
        $this->session->setFlashData('alert', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Submited!</strong> Ajuan telah disetujui.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );

        return redirect()->to('/Dosen/pengajuan/');
    }

    public function cancel($id = null)
    {
        //\update code
        $id = $this->ajuanmodel->find($this->request->getPost('id_ajuan'));
        $data = [
            'keterangan' => $this->request->getPost('keterangan'),
            'status' => 'Ditolak',
        ];
        $this->ajuanmodel->update($id, $data
            
        );
        $this->session->setFlashData('alert', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Submited!</strong> Ajuan telah ditolak.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );

        return redirect()->to('/Dosen/pengajuan/');
    }
    
    public function delete($id = null)
    {
        $this->session->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Deleted!</strong> Ajuan telah dihapus.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');

        $this->ajuanmodel->delete($id);
        return redirect()->to('/Dosen/pengajuan/');
    }
}