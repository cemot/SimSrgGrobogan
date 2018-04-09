<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catatan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if (!$this->session->logged_in || !$this->session->role == 1){
			redirect('login');
		}
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
}
