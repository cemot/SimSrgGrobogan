<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$own = M_Pengujian::select('id_pengujian')->where('id_pengelola', $this->session->id)->get();
        // dd('<pre>'.$own.'</pre>');
        $data['data'] = M_Resi::whereIn('id_pengujian', $own)->get();
        // dd($data['data']);
        $data['sidebar'] = 'pengelola/sidebar';
        $data['content'] = 'pengelola/resi';
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
