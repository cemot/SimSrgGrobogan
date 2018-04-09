<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengujian extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if (!$this->session->logged_in || !$this->session->role == 4){
			redirect('login');
		}
    }

	public function index()
	{
        $data['data'] = M_Pengujian::whereIn('id_barang', M_Barang::where('id_petani', $this->session->id)->get(['id_barang']))->get();
		$data['sidebar'] = 'petani/sidebar';
        $data['content'] = 'petani/pengujian';
        $this->load->view('layouts/app', $data);
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
		$data['pengujian'] = M_Pengujian::where('id_pengujian', $id)->whereIn('id_barang', M_Barang::where('id_petani', $this->session->id)->get(['id_barang']))->first();
        if (!$data['pengujian']) {
            redirect('petani/pengujian');
        } else {
            $data['sidebar'] = 'petani/sidebar';
            $data['content'] = 'petani/pengujian_detail';
            $this->load->view('layouts/app', $data);
        }
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
