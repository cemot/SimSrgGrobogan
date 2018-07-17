<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Capsule\Manager as DB;

class Gudang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if ($this->session->role != 2){
			redirect('login');
		}
    }

	public function index()
	{
		$data['data'] = M_Gudang::all();
        $data['sidebar'] = 'dinas/sidebar';
        $data['content'] = 'dinas/gudang';
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
		$data['gudang'] = M_Gudang::where('id_gudang', $id)->first();
        if (!$data['gudang']) {
            redirect('dinas/gudang');
        } else {
			$data['isi_sisa'] = DB::table('gudang')
								->join('pengujian', 'gudang.id_gudang', '=', 'pengujian.id_gudang')
								->join('barang', 'barang.id_barang', '=', 'pengujian.id_barang')
					            ->select(DB::raw('gudang.id_gudang, sum(barang.berat_barang) as isi, gudang.kapasitas - sum(barang.berat_barang) as sisa'))
					            ->where('pengujian.hsl_pengujian', '=', 'Diterima')
								->where('gudang.id_gudang', $id)
					            ->groupBy('gudang.id_gudang')
					            ->first();
            $data['sidebar'] = 'dinas/sidebar';
            $data['content'] = 'dinas/gudang_detail';
            $this->load->view('layouts/app', $data);
        }
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

	public function cetak_gudang($id)
    {
		$data['gudang'] = M_Gudang::where('id_gudang', $id)->first();
        if (!$data['gudang']) {
            redirect('dinas/gudang');
        } else {
			$data['isi_sisa'] = DB::table('gudang')
								->join('pengujian', 'gudang.id_gudang', '=', 'pengujian.id_gudang')
								->join('barang', 'barang.id_barang', '=', 'pengujian.id_barang')
					            ->select(DB::raw('gudang.id_gudang, sum(barang.berat_barang) as isi, gudang.kapasitas - sum(barang.berat_barang) as sisa'))
					            ->where('pengujian.hsl_pengujian', '=', 'Diterima')
								->where('gudang.id_gudang', $id)
					            ->groupBy('gudang.id_gudang')
					            ->first();
            $this->load->view('layouts/gudang_cetak', $data);
        }
    }
}
