<?php

namespace App\Controllers;

use App\Models\ModelEvent;
use App\Models\ModelPendaftaran;
use CodeIgniter\RESTful\ResourceController;

class Daftar extends ResourceController
{
    private $ModelEvent, $ModelPendaftaran;
    public function __construct()
    {
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
        return view('admin/pendaftaran/v_index', [
            'title'         => 'Pendaftaran',
            'event'         => $this->ModelEvent->orderBy('tanggal_event', 'DESC')->paginate(6, 'event'),
            'pagination'    => $this->ModelEvent->pager,

        ]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return view('admin/pendaftaran/v_data_pendaftaran', [
            'title'         => 'Data Pendaftaran',
            'event'         => $this->ModelEvent->find($id),
            'pendaftaran'   => $this->ModelPendaftaran->join('event', 'event.id_event = pendaftaran.id_event', 'left')
                ->where('pendaftaran.id_event', $id)
                ->orderBy('tanggal_daftar', 'DESC')
                ->paginate(6, 'event'),
            'pagination'    => $this->ModelPendaftaran->pager,
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
        //
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
        $event = $this->ModelPendaftaran->find($id);
        $this->ModelPendaftaran->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!!');

        return redirect()->to(base_url('daftar/' . $event['id_event']));
    }
}
