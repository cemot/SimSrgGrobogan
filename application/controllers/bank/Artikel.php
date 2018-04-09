<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if (!$this->session->logged_in || !$this->session->role == 3){
			redirect('login');
		}
    }

	public function index()
	{
        $data['data'] = M_Artikel::all();
        $data['sidebar'] = 'bank/sidebar';
        $data['content'] = 'bank/artikel';
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
        $data['sidebar'] = 'bank/sidebar';
        $data['content'] = 'bank/artikel_show';
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
