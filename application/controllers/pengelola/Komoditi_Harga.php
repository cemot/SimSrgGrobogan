<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komoditi_Harga extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $data['data'] = M_Komoditi::all();
        $data['sidebar'] = 'pengelola/sidebar';
        $data['content'] = 'pengelola/komoditi';
        $this->load->view('layouts/app', $data);
	}

	public function create()
    {
        $data['data'] = M_Komoditi::all();
        $data['sidebar'] = 'pengelola/sidebar';
        $data['content'] = 'pengelola/komoditi_harga_create';
        $this->load->view('layouts/app', $data);
    }

    public function store()
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
                $komoditi_harga = M_Komoditi_Harga::create([
                    'id_komoditi' => $this->input->post('id_komoditi'),
                    'tanggal' => $this->input->post('tanggal'),
                    'harga' => $this->input->post('harga'),
                    'keterangan' => $this->input->post('keterangan'),
                    'created_by' => $this->session->id
                ]);

                if($komoditi_harga) {
                    $this->session->set_flashdata('class', 'success');
                    $this->session->set_flashdata('message', 'Harga Komoditi Berhasil Disimpan');
                } else {
                    $this->session->set_flashdata('class', 'danger');
                    $this->session->set_flashdata('message', 'Harga Komoditi Berhasil Diperbarui');
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