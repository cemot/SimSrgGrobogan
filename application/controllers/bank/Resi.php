<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if (!$this->session->logged_in || !$this->session->role == 3){
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
