<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if ($this->session->role != 4){
			redirect('login');
		}
    }

	public function index()
	{
		$own = M_Pengujian::select('id_pengujian')->whereIn('id_barang', M_Barang::select('id_barang')->where('id_petani', $this->session->id))->get();
        $data['data'] = M_Resi::whereIn('id_pengujian', $own)->get();
        $data['sidebar'] = 'petani/sidebar';
        $data['content'] = 'petani/resi';
        $this->load->view('layouts/app', $data);
	}

    public function cetak_resi($id_resi)
    {
        $own = M_Pengujian::select('id_pengujian')->whereIn('id_barang', M_Barang::select('id_barang')->where('id_petani', $this->session->id))->get();
        $data['resi'] = M_Resi::whereIn('id_pengujian', $own)->where('id_resi', $id_resi)->get()->first();
        if (!$data['resi']) {
            redirect(base_url('petani/resi'));
        } else {
            $this->load->view('layouts/resi_cetak', $data);
        }
    }

	public function gadai_resi($id_resi)
	{
		$exist = M_Gadai::where('id_resi', $id_resi)->get()->first();
		if ($exist) {
			$this->session->set_flashdata('class', 'danger');
			$this->session->set_flashdata('message', 'Gadai Resi Sudah Ada!');
            redirect('petani/resi');
        } else {
			$gadai = M_Gadai::create([
				'id_resi' => $id_resi,
				'tgl_pengajuan' =>  date("Y-m-d"),
				'status' => 0,
				'id_pegawai' => NULL,
				'tgl_penerimaan' => NULL
			]);

			if($gadai) {
				$this->session->set_flashdata('class', 'success');
				$this->session->set_flashdata('message', 'Gadai Resi Berhasil Disimpan');
			} else {
				$this->session->set_flashdata('class', 'danger');
				$this->session->set_flashdata('message', 'Gadai Resi Tidak Berhasil Disimpan');
			}
			redirect('petani/resi');
        }
	}

	public function perpanjang_resi($id_resi)
	{
		$exist = M_PerpanjanganResi::where('id_resi', $id_resi)->get()->first();
		if ($exist) {
			$this->session->set_flashdata('class', 'danger');
			$this->session->set_flashdata('message', 'Perpanjang Resi Sudah Ada!');
            redirect('petani/resi');
        } else {
			$perpanjang = M_PerpanjanganResi::create([
				'id_resi' => $id_resi,
				'tgl_pengajuan' =>  date("Y-m-d"),
				'status' => 0,
				'id_pengelola' => NULL,
				'tgl_penerimaan' => NULL
			]);

			if($perpanjang) {
				$this->session->set_flashdata('class', 'success');
				$this->session->set_flashdata('message', 'Perpanjang Resi  Berhasil Disimpan');
			} else {
				$this->session->set_flashdata('class', 'danger');
				$this->session->set_flashdata('message', 'Perpanjang Resi Tidak Berhasil Disimpan');
			}
			redirect('petani/resi');
        }
	}

	public function create()
    {
        //
    }

    public function store()
    {
        //
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
