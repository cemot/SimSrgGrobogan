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

	public function terima_perpanjangan($id_perpanjangan)
    {
		$perpanjangan = M_PerpanjanganResi::find($id_perpanjangan);
		if ($perpanjangan->status != 0) {
            redirect('/pengelola/resi');
        } else {
			// dd($perpanjangan);
			$resi = M_Resi::find($perpanjangan->id_resi);
			// $data['data'] = M_Resi::find($perpanjangan->id_resi);
			$data['data'] = $resi->pengujian;
			$data['gudang'] = M_Gudang::where('id_pengelola', $this->session->id)->get();
	        $data['id_perpanjangan'] = $id_perpanjangan;
	        $data['sidebar'] = 'pengelola/sidebar';
			$data['content'] = 'pengelola/resi_perpanjang';
			// $data['content'] = 'pengelola/resi_perpanjang_old';
	        $this->load->view('layouts/app', $data);
		}
    }

	public function store_perpanjangan()
    {
        if (!$this->input->post()) {
            redirect('/pengelola/resi');
        } else {
			$resi = M_Resi::find($this->input->post('id_resi'));

			$resi_baru = M_Resi::create([
				'no_resi' => $this->input->post('no_resi'),
				'id_pengujian' => $resi->id_pengujian,
				'biaya_penyimpanan' => $resi->biaya_penyimpanan,
				'kelas_barang' => $resi->kelas_barang,
				'tgl_penerbitan' => date("Y-m-d"),
				'masa_aktif' => $this->input->post('masa_aktif'),
				'jatuh_tempo' =>  date("Y-m-d", strtotime("+". $this->input->post('masa_aktif') ." months", strtotime(date("Y-m-d")))),
				'no_polis' => $resi->no_polis,
				'polis_asuransi' => $resi->polis_asuransi,
				'polis_start' => $resi->polis_start,
				'polis_end' => $resi->polis_end,
			]);

			$perpanjangan = M_PerpanjanganResi::find($this->input->post('id_perpanjangan'));
			$perpanjangan->status = 2;
			$perpanjangan->tgl_penerimaan = date("Y-m-d");
			$perpanjangan->id_pengelola = $this->session->id;

			if($resi_baru && $perpanjangan->save()) {
				$this->session->set_flashdata('class', 'success');
				$this->session->set_flashdata('message', 'Perpanjangan Resi Berhasil Disimpan');
			} else {
				$this->session->set_flashdata('class', 'danger');
				$this->session->set_flashdata('message', 'Perpanjangan Resi Gagal Disimpan');
			}
			redirect('pengelola/resi');
        }
    }

    public function cetak_resi($id_resi)
    {
        // dd('sampe sini');
        $own = M_Pengujian::select('id_pengujian')->where('id_pengelola', $this->session->id)->get();
        // dd('<pre>'.$own.'</pre>');
        $data['resi'] = M_Resi::whereIn('id_pengujian', $own)->where('id_resi', $id_resi)->get()->first();
        if (!$data['resi']) {
            redirect(base_url('pengelola/resi'));
        } else {
            $this->load->view('layouts/resi_cetak', $data);
        }
        // $this->pdf->setPaper('A4', 'potrait');
        // $this->pdf->filename = "laporan-resi.pdf";
        // $this->pdf->load_view('pengelola/resi_cetak');
    }

	public function tolak_perpanjangan($id_perpanjangan)
	{
		$perpanjangan = M_PerpanjanganResi::find($id_perpanjangan);
		$perpanjangan->status = 1;
		$perpanjangan->tgl_penerimaan = date("Y-m-d");
		$perpanjangan->id_pengelola = $this->session->id;

		if($perpanjangan->save()) {
			$this->session->set_flashdata('class', 'success');
			$this->session->set_flashdata('message', 'Perpanjangan Berhasil Disimpan');
		} else {
			$this->session->set_flashdata('class', 'danger');
			$this->session->set_flashdata('message', 'Perpanjangan Tidak Berhasil Disimpan');
		}
		redirect('pengelola/resi');
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
