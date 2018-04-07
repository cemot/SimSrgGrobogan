<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $data['data_saya'] = M_Gudang::where('id_pengelola', $this->session->id)->get();
		$data['data'] = M_Gudang::where('id_pengelola', '!=', $this->session->id)->get();
        $data['sidebar'] = 'pengelola/sidebar';
        $data['content'] = 'pengelola/gudang';
        $this->load->view('layouts/app', $data);
	}

	public function create()
    {
        $data['sidebar'] = 'pengelola/sidebar';
        $data['content'] = 'pengelola/gudang_create';
        $this->load->view('layouts/app', $data);
    }

    public function store()
    {
        if (!$this->input->post()) {
            redirect('pengelola/gudang');
        } else {
            $this->form_validation->set_rules('nama', 'Nama Gudang', 'required');
            $this->form_validation->set_rules('kapasitas', 'Kapasitas Gudang', 'required|integer');

            if ($this->form_validation->run() == FALSE) {
                redirect('/pengelola/gudang');
            } else {
                $gudang = M_Gudang::create([
                    'nama' => $this->input->post('nama'),
                    'kapasitas' => $this->input->post('kapasitas'),
                    'id_pengelola' => $this->session->id
                ]);

                if($gudang) {
                    $this->session->set_flashdata('class', 'success');
                    $this->session->set_flashdata('message', 'Gudang Berhasil Disimpan');
                } else {
                    $this->session->set_flashdata('class', 'danger');
                    $this->session->set_flashdata('message', 'Gudang Tidak Berhasil Diperbarui');
                }
                redirect('pengelola/gudang');
            }
        }
    }

    public function show($id)
    {
        $data['gudang'] = M_Gudang::where('id_gudang', $id)->where('id_pengelola', $this->session->id)->first();
        if (!$data['gudang']) {
            redirect('pengelola/gudang');
        } else {
            $data['sidebar'] = 'pengelola/sidebar';
            $data['content'] = 'pengelola/gudang_detail';
            $this->load->view('layouts/app', $data);
        }
    }

    public function edit($id)
    {
        $data['gudang'] = M_Gudang::where('id_gudang', $id)->where('id_pengelola', $this->session->id)->first();
        if (!$data['gudang']) {
            redirect('pengelola/gudang');
        } else {
            $data['sidebar'] = 'pengelola/sidebar';
            $data['content'] = 'pengelola/gudang_edit';
            $this->load->view('layouts/app', $data);
        }
    }

    public function update()
    {
        if (!$this->input->post()) {
            redirect('pengelola/gudang');
        } else {
            $this->form_validation->set_rules('nama', 'Nama Gudang', 'required');
            $this->form_validation->set_rules('kapasitas', 'Kapasitas Gudang', 'required|integer');

            if ($this->form_validation->run() == FALSE) {
                // $this->load->view('myform');
            } else {
                $gudang = M_Gudang::find($this->input->post('id_gudang'));
                $gudang->nama = $this->input->post('nama');
                $gudang->kapasitas = $this->input->post('kapasitas');
                $gudang->save();

                if($gudang) {
                    $this->session->set_flashdata('class', 'success');
                    $this->session->set_flashdata('message', 'Gudang Berhasil Diperbarui');
                } else {
                    $this->session->set_flashdata('class', 'danger');
                    $this->session->set_flashdata('message', 'Gudang Tidak Berhasil Diperbarui');
                }
                redirect('pengelola/gudang');
            }
        }
    }

    public function destroy($id)
    {
        $gudang = M_Gudang::find($id);
        if ($gudang->pengelola->id != $this->session->id) {
            $this->session->set_flashdata('class', 'danger');
            $this->session->set_flashdata('message', 'Gudang Tidak Berhasil Dihapus');
        } else {
            $gudang = $gudang->delete();
            if($gudang) {
                $this->session->set_flashdata('class', 'success');
                $this->session->set_flashdata('message', 'Gudang Berhasil Dihapus');
            } else {
                $this->session->set_flashdata('class', 'danger');
                $this->session->set_flashdata('message', 'Gudang Tidak Berhasil Dihapus');
            }
        }
        redirect('pengelola/gudang');
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
