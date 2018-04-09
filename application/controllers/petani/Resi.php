<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if (!$this->session->logged_in || !$this->session->role == 4){
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
