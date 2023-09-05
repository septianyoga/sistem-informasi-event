<?php

namespace App\Controllers;

use App\Models\ModelEvent;
use CodeIgniter\RESTful\ResourceController;

class Event extends ResourceController
{
    private $ModelEvent;

    public function __construct()
    {
        $this->ModelEvent = new ModelEvent();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        return view('admin/event/v_index', [
            'title'     => 'Kelola Event',
            'event'     => $this->ModelEvent->orderBy('tanggal_event', 'DESC')->paginate(6, 'event'),
            'pagination' => $this->ModelEvent->pager,
        ]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return view('admin/event/v_detail', [
            'title'     => 'Detail Event',
            'event'     => $this->ModelEvent->first($id),
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
        $eventValid = [
            'nama_event' => [
                'label' => 'Nama event',
                'rules' => 'required',
            ],
            'tanggal_event' => [
                'label' => 'Tanggal Event',
                'rules' => 'required',
            ],
            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules' => 'required',
            ],
            'gambar' => [
                'label' => 'Gambar',
                'rules' => 'uploaded[gambar]|max_size[gambar,1024]|mime_in[gambar,image/png,image/jpg,image/jpeg]',
            ],
        ];

        if ($this->validate($eventValid)) {
            //jika valid
            //mengambil data foto di form
            $gambar = $this->request->getFile('gambar');
            //mengganti nama 
            $nameFoto = $gambar->getRandomName();

            $data = [
                'nama_event'    => $this->request->getPost('nama_event'),
                'tanggal_event' => $this->request->getPost('tanggal_event'),
                'deskripsi'     => $this->request->getPost('deskripsi'),
                'gambar'        => $nameFoto,
            ];
            // memindahkan lokasi foto
            $gambar->move('gambar_event', $nameFoto);

            $this->ModelEvent->insert($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!!');

            return redirect()->to(base_url('event'));
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
        return view('admin/event/v_edit', [
            'title'     => 'Edit Event',
            'event'     => $this->ModelEvent->first($id),
        ]);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $eventvalid = [
            'nama_event' => [
                'label' => 'Nama event',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'tanggal_event' => [
                'label' => 'Tanggal Event',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                ]
            ],
            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'gambar' => [
                'label' => 'Gambar',
                'rules' => 'max_size[gambar,2024]|mime_in[gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => '{field} Maksimal Ukurannya 2 MB',
                    'mime_in' => 'Format {field} Wajib PNG/JPG/JPEG',
                ]
            ],
        ];

        if ($this->validate($eventvalid)) {
            //jika valid
            //mengambil data foto di form
            $gambar = $this->request->getFile('gambar');

            if ($gambar->getError() == 4) {
                $data = [
                    'id_event'      => $id,
                    'nama_event'    => $this->request->getPost('nama_event'),
                    'tanggal_event' => $this->request->getPost('tanggal_event'),
                    'deskripsi'     => $this->request->getPost('deskripsi')
                ];
                $this->ModelEvent->update($id, $data);
            } else {
                //menghapus foto lama
                $event = $this->ModelEvent->first($id);
                if ($event['gambar'] != "") {
                    unlink('gambar_event/' . $event['gambar']);
                }
                //mengganti nama 
                $nameFoto = $gambar->getRandomName();

                $data = [
                    'id_event'      => $id,
                    'nama_event'    => $this->request->getPost('nama_event'),
                    'tanggal_event' => $this->request->getPost('tanggal_event'),
                    'deskripsi'     => $this->request->getPost('deskripsi'),
                    'gambar'        => $nameFoto,
                ];
                // memindahkan lokasi foto
                $gambar->move('gambar_event', $nameFoto);
                $this->ModelEvent->update($data);
            }

            session()->setFlashdata('pesan', 'Data Berhasil Diedit!!!');
            return redirect()->to(base_url('event'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('event/' . $id . '/edit'));
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //menghapus foto lama
        $event = $this->ModelEvent->find($id);
        if ($event['gambar'] != "") {
            unlink('gambar_event/' . $event['gambar']);
        }

        $this->ModelEvent->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!!');

        return redirect()->to(base_url('event'));
    }
}
