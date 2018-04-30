<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if (!$this->session->logged_in || !$this->session->role == 1){
			redirect('login');
		}
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

    public function cetak_resi($no_resi)
    {
        // dd('sampe sini');
        $own = M_Pengujian::select('id_pengujian')->where('id_pengelola', $this->session->id)->get();
        // dd('<pre>'.$own.'</pre>');
        $data['resi'] = M_Resi::whereIn('id_pengujian', $own)->where('no_resi', $no_resi)->get()->first();
        if (!$data['resi']) {
            redirect(base_url('pengelola/resi'));
        } else {
            $this->load->view('layouts/resi_cetak', $data);
        }
        // $this->pdf->setPaper('A4', 'potrait');
        // $this->pdf->filename = "laporan-resi.pdf";
        // $this->pdf->load_view('pengelola/resi_cetak');
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
