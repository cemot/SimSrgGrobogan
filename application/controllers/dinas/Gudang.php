<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if ($this->session->role != 2){
			redirect('login');
		}
    }

	public function index()
	{
		$data['data'] = M_Gudang::all();
        $data['sidebar'] = 'dinas/sidebar';
        $data['content'] = 'dinas/gudang';
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
		$data['gudang'] = M_Gudang::where('id_gudang', $id)->first();
        if (!$data['gudang']) {
            redirect('dinas/gudang');
        } else {
            $data['sidebar'] = 'dinas/sidebar';
            $data['content'] = 'dinas/gudang_detail';
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
