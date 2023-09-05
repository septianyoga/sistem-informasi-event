<?php

namespace App\Controllers;

use App\Models\ModelUser;

use CodeIgniter\RESTful\ResourceController;

class Registrasi extends ResourceController
{
    private $ModelUser, $session;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        return view('v_registrasi', [
            'title'     => 'Registrasi',
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
        $userValid = [
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|is_unique[user.email]',
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[user.username]',
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
            ],
            'role' => [
                'label' => 'Role',
                'rules' => 'required',
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg]',
            ],
        ];

        if ($this->validate($userValid)) {
            //jika valid
            //mengambil data foto di form
            $foto = $this->request->getFile('foto');
            //mengganti nama 
            $nameFoto = $foto->getRandomName();

            $data = [
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'status_verifikasi' => 'Sudah Verifikasi',
                'role' => $this->request->getPost('role'),
                'password' => $this->request->getPost('password'),
                'foto' => $nameFoto,
            ];
            // memindahkan lokasi foto
            $foto->move('foto', $nameFoto);

            $this->ModelUser->insert($data);
            session()->setFlashdata('pesan', 'Registrasi Berhasil. Silahkan Login!!!');
            return redirect()->to(base_url('auth'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
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
        //
    }
}
