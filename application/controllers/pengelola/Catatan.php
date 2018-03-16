<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catatan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$data['data'] = M_Catatan::all();
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
        $data['data'] = M_Catatan::find($id);
        // dd($data['data']);
        $data['content'] = 'pengelola/show_pengujian';
        $this->load->view('layout_pengelola/master', $data);
    }

    public function edit($id)
    {
        $data['data'] = M_Catatan::find($id);
        // dd($data['data']);
        $data['content'] = 'pengelola/edit_pengujian';
        $this->load->view('layout_pengelola/master', $data);
    }

    public function update()
    {
        
    }

    public function destroy($id)
    {
        $catatan = M_Catatan::destroy($id);
        if($catatan) {
            $this->session->set_flashdata('sukses', 'Catatan Pengujian Barang Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('gagal', 'Catatan Pengujian Barang Tidak Berhasil Dihapus');
        }
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