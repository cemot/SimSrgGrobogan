<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komoditi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $data['data'] = M_Komoditi::all();
        $data['sidebar'] = 'pengelola/sidebar';
        $data['content'] = 'pengelola/komoditi';
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