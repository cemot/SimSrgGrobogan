<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if (!$this->session->logged_in || !$this->session->role == 2){
			redirect('login');
		}
    }

	public function index()
	{
        $data['data'] = M_Resi::whereIn('id_pengujian', M_Pengujian::select('id_pengujian')->get())->get();
        $data['sidebar'] = 'dinas/sidebar';
        $data['content'] = 'dinas/resi';
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