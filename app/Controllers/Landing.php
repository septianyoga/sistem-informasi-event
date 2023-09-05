<?php

namespace App\Controllers;

use App\Models\ModelEvent;
use App\Models\ModelPendaftaran;
use CodeIgniter\RESTful\ResourceController;

class Landing extends ResourceController
{
    private $ModelEvent, $ModelPendaftaran;
    public function __construct()
    {
        helper('form');
        $this->ModelEvent = new ModelEvent();
        $this->ModelPendaftaran = new ModelPendaftaran();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $key = $this->request->getVar('keyword');
        if ($key) {
            $event = $this->ModelEvent->search($key);
        } else {
            $event = $this->ModelEvent;
        }
        return view('landing/v_index', [
            'title'             => 'E-Event',
            'event'             => $event->orderBy('tanggal_event', 'DESC')->paginate(4, 'event'),
            'pagination'        => $this->ModelEvent->pager,
            'keyword'           => $key

        ]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return view('landing/v_detailEvent', [
            'title'         => 'Detail Event',
            'event'         => $this->ModelEvent->find($id),
            'isi_landing'   => 'landing/v_detailEvent'
        ]);
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
        $pendaftaranValid = [
            'email' => [
                'label' => 'Email',
                'rules' => 'is_unique[pendaftaran.email]',
                'errors' => [
                    'is_unique' => '{field} sudah ada. Silahkan input yang lain!!!.'
                ]
            ],
        ];

        if ($this->validate($pendaftaranValid)) {
            $data = [
                'id_event'          => $this->request->getPost('id_event'),
                'nama_lengkap'      => $this->request->getPost('nama_lengkap'),
                'jenis_kelamin'     => $this->request->getPost('jenis_kelamin'),
                'alamat'            => $this->request->getPost('alamat'),
                'email'             => $this->request->getPost('email'),
                'wa'                => $this->request->getPost('wa'),
                'tanggal_daftar'    => date('Y-m-d'),
            ];

            $this->ModelPendaftaran->insert($data);
            $dataTerakhir = $this->ModelPendaftaran->dataTerakhir();
            session()->setFlashdata('pesan', 'Anda berhasil melakukan pendaftaran!!!');

            return redirect()->to(base_url('landing/hasilPendaftaran/' . $dataTerakhir['id_pendaftaran']));
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
        return view('landing/v_formPendaftaranEvent', [
            'title'         => 'Pendaftaran Event',
            'event'         => $this->ModelEvent->find($id),
        ]);
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

    public function hasil($id)
    {
        return view('landing/v_hasilPendaftaranEvent', [
            'title'         => 'Hasil Pendaftaran Event',
            'pendaftaran'   => $this->ModelPendaftaran
                ->join('event', 'event.id_event = pendaftaran.id_event', 'left')
                ->find($id),
        ]);
    }
}
