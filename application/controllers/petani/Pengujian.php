<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengujian extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $user = $this->ion_auth->user()->row();
		
        $data['data'] = M_Pengujian::where('id_petani', $user->id);
        dd($data);
        $data['content'] = 'pengelola/pengujian';
        $this->load->view('layout_pengelola/master', $data); 
	}

	public function create()
    {
        
    }

    public function store()
    {
        
    }

    public function show($id)
    {
        $data['data'] = M_Pengujian::find($id);
        // dd($data['data']);
        $data['content'] = 'pengelola/show_pengujian';
        $this->load->view('layout_pengelola/master', $data);
    }

    public function edit($id)
    {
        
    }

    public function update()
    {
        
    }

    public function destroy($id)
    {

    }


    // UNTUK TESTING ELOQUENT
    public function test_insert()
    {
        $pengujian = M_Pengujian::create([
            'id_barang' => 3,
            'id_pengelola' => 1,
            'tgl_pengujian' => date("Y-m-d"),
            'hsl_pengujian' => 'Mantap broooo airnya'
        ]);
        dd($pengujian);
    }

    public function test_update($id=1)
    {
        $pengujian = M_Pengujian::find($id);
        $pengujian->id_barang = 3;
        $pengujian->id_pengelola = 1;
        $pengujian->tgl_pengujian = date("Y-m-d");
        $pengujian->hsl_pengujian = 'Mantab Bro Edit';
        $pengujian->save();
        dd($pengujian);
    }
}