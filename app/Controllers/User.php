<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $usermodel, $session;
    public function __construct()
    {
        $this->usermodel = new UserModel();
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        return view('index');
    }

    public function login()
    {
        $userid = $this->request->getPost('userid');
        $password = $this->request->getPost('password');
        $user = $this->usermodel->find($userid);

        if ($user) {
            if ($user['password'] == md5($password)) {
                $this->session->set('userid', $user['userid']);
                $this->session->set('nama', $user['nama']);
                return redirect()->to('/mahasiswa');
            } else {
                $this->session->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong> Password salah.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                return redirect()->to('/');
            }
        } else {
            $this->session->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong> ID Tidak ditemukan.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            return redirect()->to('/');
        }
    }

    public function register()
    {
        $userid = $this->request->getPost('userid');

        if (!$this->usermodel->find($userid)) {

            $this->usermodel->save([
                'userid' => $userid,
                'nama' => $this->request->getPost('nama'),
                'password' => md5($this->request->getPost('password')),
                'role' => $this->request->getPost('role')
            ]);

            $this->session->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Registered!</strong> Akun telah dibuat.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        } else {
            $this->session->setFlashData('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong> ID telah digunakan.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        }

        return redirect()->to('/');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }
}
