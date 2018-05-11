<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if ($this->session->role != 3){
			redirect('login');
		}
    }

	public function index()
	{
        $data['data'] = M_Resi::whereIn('id_pengujian', M_Pengujian::select('id_pengujian')->get())->get();
        $data['sidebar'] = 'bank/sidebar';
        $data['content'] = 'bank/resi';
        $this->load->view('layouts/app', $data);
	}

	public function cetak_resi($id_resi)
    {
        $data['resi'] = M_Resi::where('id_resi', $id_resi)->get()->first();
        if (!$data['resi']) {
            redirect(base_url('bank/resi'));
        } else {
            $this->load->view('layouts/resi_cetak', $data);
        }
    }

	public function tolak_gadai($id_gadai)
	{
		$gadai = M_Gadai::find($id_gadai);
		$gadai->status = 1;
		$gadai->tgl_penerimaan = date("Y-m-d");
		$gadai->id_pegawai = $this->session->id;

		if($gadai->save()) {
			$this->session->set_flashdata('class', 'success');
			$this->session->set_flashdata('message', 'Gadai Resi Berhasil Disimpan');
		} else {
			$this->session->set_flashdata('class', 'danger');
			$this->session->set_flashdata('message', 'Gadai Resi Tidak Berhasil Disimpan');
		}
		redirect('bank/resi');
	}

	public function terima_gadai($id_gadai)
	{
		$gadai = M_Gadai::find($id_gadai);
		$gadai->status = 2;
		$gadai->tgl_penerimaan = date("Y-m-d");
		$gadai->id_pegawai = $this->session->id;

		if($gadai->save()) {
			$this->session->set_flashdata('class', 'success');
			$this->session->set_flashdata('message', 'Gadai Resi Berhasil Disimpan');
		} else {
			$this->session->set_flashdata('class', 'danger');
			$this->session->set_flashdata('message', 'Gadai Resi Tidak Berhasil Disimpan');
		}
		redirect('bank/resi');
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
