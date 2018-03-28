<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komoditi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $data['data'] = M_Komoditi::all();
        $data['data_harga'] = M_Komoditi_Harga::all();
        $data['sidebar'] = 'pengelola/sidebar';
        $data['content'] = 'pengelola/komoditi';
        $this->load->view('layouts/app', $data);
	}

    public function create()
    {
        // 
    }

    public function create_harga()
    {
        $data['data'] = M_Komoditi::all();
        $data['sidebar'] = 'pengelola/sidebar';
        $data['content'] = 'pengelola/komoditi_harga_create';
        $this->load->view('layouts/app', $data); 
    }

    public function store()
    {
        // 
    }

    public function store_harga()
    {
        if (!$this->input->post()) {
            redirect('pengelola/komoditi');
        } else {
            $this->form_validation->set_rules('id_komoditi', 'Jenis Komoditi Barang', 'required');
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
            $this->form_validation->set_rules('harga', 'Harga', 'required');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

            if ($this->form_validation->run() == FALSE) {
                redirect('pengelola/komoditi');
            } else {
                $cek = M_Komoditi_Harga::where('id_komoditi', $this->input->post('id_komoditi'))
                                        ->where('tanggal', date("Y-m-d",strtotime($this->input->post('tanggal'))))->first();
                if (!$cek) {
                    $komoditi_harga = M_Komoditi_Harga::create([
                        'id_komoditi' => $this->input->post('id_komoditi'),
                        'tanggal' => date("Y-m-d",strtotime($this->input->post('tanggal'))),
                        'harga' => $this->input->post('harga'),
                        'keterangan' => $this->input->post('keterangan'),
                        'created_by' => $this->session->id,
                        'updated_by' => $this->session->id,
                    ]);
                    if($komoditi_harga) {
                        $this->session->set_flashdata('class', 'success');
                        $this->session->set_flashdata('message', 'Harga Komoditi Berhasil Disimpan');
                    } else {
                        $this->session->set_flashdata('class', 'danger');
                        $this->session->set_flashdata('message', 'Harga Komoditi Gagal Disimpan');
                    }
                } else {
                    $this->session->set_flashdata('class', 'danger');
                    $this->session->set_flashdata('message', 'Harga Komoditi Gagal Disimpan');
                }
                redirect('pengelola/komoditi');
            }
        }
    }

    public function show($id)
    {
        // 
    }

    public function edit($id)
    {
        // 
    }

    public function update()
    {
        // 
    }

    public function destroy($id)
    {
        // 
    }
}