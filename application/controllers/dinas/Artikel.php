<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if ($this->session->role != 3){
			redirect('login');
		}
    }

	public function index()
	{
        $data['data'] = M_Artikel::all();
        $data['sidebar'] = 'dinas/sidebar';
        $data['content'] = 'dinas/artikel';
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
        $data['artikel'] = M_Artikel::find($id);
        $data['sidebar'] = 'dinas/sidebar';
        $data['content'] = 'dinas/artikel_show';
        $this->load->view('layouts/app', $data);
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
