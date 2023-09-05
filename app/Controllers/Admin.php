<?php

namespace App\Controllers;

use App\Models\ModelUser;
use App\Models\ModelEvent;
use App\Models\ModelPendaftaran;
use CodeIgniter\RESTful\ResourceController;

class Admin extends ResourceController
{
    private $ModelEvent, $ModelPendaftaran, $ModelUser;

    public function __construct()
    {
        $this->ModelEvent = new ModelEvent();
        $this->ModelPendaftaran = new ModelPendaftaran();
        $this->ModelUser = new ModelUser();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        return view('v_admin', [
            'title' => 'Halaman Admin',
            'jumlahEvent'       => $this->ModelEvent->countAllResults(),
            'jumlahPendaftaran' => $this->ModelPendaftaran->countAllResults(),
            'jumlahUser'        => $this->ModelUser->countAllResults(),
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
        //
    }
}
