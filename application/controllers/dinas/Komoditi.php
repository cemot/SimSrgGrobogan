<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komoditi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if ($this->session->role != 3){
			redirect('login');
		}
    }

	public function index()
	{
        $data['data'] = M_Komoditi::all();
        $data['data_harga'] = M_Komoditi_Harga::all();
        $data['sidebar'] = 'dinas/sidebar';
        $data['content'] = 'dinas/komoditi';
        $this->load->view('layouts/app', $data);
	}

    public function create()
    {
        //
    }

    public function create_harga()
    {
        //
    }

    public function store()
    {
        //
    }

    public function store_harga()
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
