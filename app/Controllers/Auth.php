<?php

namespace App\Controllers;

use App\Models\ModelUser;
use CodeIgniter\RESTful\ResourceController;


class Auth extends ResourceController
{

    private $ModelUser, $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->ModelUser = new ModelUser();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        return view('v_login', [
            'title'     => 'Login',
        ]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $validate = $this->validate([
            'username' => 'required',
            'password' => 'required|min_length[3]'
        ]);
        if (!$validate) {
            $this->session->setFlashdata("errors", $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data_user = $this->ModelUser->where('username', $username)->first();

        if (!$data_user) {
            $this->session->setFlashdata('errors', 'User tidak ditemukan!');
            return redirect()->back();
        }

        if ($data_user['password'] != $password) {
            $this->session->setFlashdata('errors', 'Password Salah!');
            return redirect()->back();
        }
        if ($data_user['status_verifikasi'] == 'Sudah Verifikasi') {
            // echo 'berhasil';
            $this->session->set('id_user', $data_user['id_user']);
            $this->session->set('nama', $data_user['nama_user']);
            $this->session->set('email', $data_user['email']);
            $this->session->set('username', $data_user['username']);
            $this->session->set('foto', $data_user['foto']);
            if ($data_user['role'] == 'Admin') {
                session()->set('role', $data_user['role']);
                return redirect()->to(base_url('admin'));
            } else if ($data_user['role'] == 'User') {
                session()->set('role', $data_user['role']);
                return redirect()->to(base_url('landing'));
            }
        } else {
            session()->setFlashdata('errors', 'Anda Belum Verifikasi Email. Silahkan Cek Email Untuk Verifikasi Agar Bisa Login. Jika Tidak Ada Dipesan Utama Email, Maka Cek Juga Dipesan Spam Email!!!');
            return redirect()->to(base_url('Auth/index'));
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->session->destroy();
        $this->session->setFlashdata('pesan', 'Berhasil Logout!');
        return redirect()->to('auth');
    }
}
