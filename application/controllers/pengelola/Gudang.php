<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$data['data'] = M_Gudang::all();
        dd($data);
        $data['content'] = 'pengelola/gudang';
        $this->load->view('layout_pengelola/master', $data); 
	}

	public function create()
    {
        $data['content'] = 'pengelola/create_gudang';
        $this->load->view('layout_pengelola/master', $data);
    }

    public function store()
    {
        if (!$this->input->post()) {
            redirect('/pengelola/gudang');
        } else {
            $user = $this->ion_auth->user()->row();

            $this->form_validation->set_rules('nama', 'Nama Gudang', 'required');
            $this->form_validation->set_rules('kapasitas', 'Kapasitas Gudang', 'required|integer');

            if ($this->form_validation->run() == FALSE) {
                // $this->load->view('myform');
            } else {
                $gudang = M_Gudang::create([
                    'nama' => $this->input->post('nama'),
                    'kapasitas' => empty($this->input->post('kapasitas')) ? NULL : $this->input->post('kapasitas'),
                    'id_pengelola' => $user->id
                ]);
                // dd($gudang);

                if($gudang) {
                    $this->session->set_flashdata('sukses', 'Gudang Berhasil Disimpan');
                } else {
                    $this->session->set_flashdata('gagal', 'Gudang Tidak Berhasil Disimpan');
                }
                // $this->load->view('myform');
            }
        }
    }

    public function show($id)
    {
        $data['data'] = M_Gudang::find($id);
        // dd($data['data']);
        $data['content'] = 'pengelola/show_gudang';
        $this->load->view('layout_pengelola/master', $data);
    }

    public function edit($id)
    {
        $data['data'] = M_Gudang::find($id);
        // dd($data['data']);
        $data['content'] = 'pengelola/edit_gudang';
        $this->load->view('layout_pengelola/master', $data);
    }

    public function update()
    {
        if (!$this->input->post()) {
            redirect('/pengelola/gudang');
        } else {
            // $user = $this->ion_auth->user()->row();

            $this->form_validation->set_rules('nama', 'Nama Gudang', 'required');
            $this->form_validation->set_rules('kapasitas', 'Kapasitas Gudang', 'required|integer');

            if ($this->form_validation->run() == FALSE) {
                // $this->load->view('myform');
            } else {
                $gudang = M_Gudang::find($this->input->post('id'));
                $gudang->nama = $this->input->post('nama');
                $gudang->kapasitas = empty($this->input->post('kapasitas')) ? NULL : $this->input->post('kapasitas');
                $gudang->id_pengelola = empty($this->input->post('pengelola')) ? NULL : $this->input->post('pengelola');
                $gudang->save();

                dd($gudang);

                if($gudang) {
                    $this->session->set_flashdata('sukses', 'Gudang Berhasil Diperbarui');
                } else {
                    $this->session->set_flashdata('gagal', 'Gudang Tidak Berhasil Diperbarui');
                }
                // $this->load->view('myform');
            }
        }
    }

    public function destroy($id)
    {
        $gudang = M_Gudang::destroy($id);
        if($gudang) {
            $this->session->set_flashdata('sukses', 'Gudang Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('gagal', 'Gudang Tidak Berhasil Dihapus');
        }
    }


    // UNTUK TESTING ELOQUENT
    public function test_insert()
    {
        $gudang = M_Gudang::create([
            'nama' => 'Gudang A Sindang Sari',
            'kapasitas' => 160,
            'id_pengelola' => 1
        ]);
        dd($gudang);
    }

    public function test_update($id=1)
    {
        $gudang = M_Gudang::find($id);
        $gudang->nama = 'Update Gudang test';
        $gudang->kapasitas = 156;
        $gudang->id_pengelola = 1;
        $gudang->save();
        dd($gudang);
    }
}
