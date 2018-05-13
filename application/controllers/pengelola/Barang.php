<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if ($this->session->role != 1){
			redirect('login');
		}
    }

	public function index()
	{
		$data['data_saya'] = M_Barang::where('id_pengelola', $this->session->id)->get();
        $data['data'] = M_Barang::where('id_pengelola', '!=', $this->session->id)->orWhere('id_pengelola', NULL)->get();
        $data['sidebar'] = 'pengelola/sidebar';
        $data['content'] = 'pengelola/barang';
        $this->load->view('layouts/app', $data);
	}

	public function create()
    {
        // $teruji = M_Pengujian::get(['id_barang']);
        // dd("<pre> $teruji </pre>");
        // $data['data'] = M_Barang::whereNotIn('id_barang', M_Pengujian::get(['id_barang']))->get();
        $data['data'] = M_User::where('role', 4)->get();
		$data['komoditi'] = M_Komoditi::all();
        $data['gudang'] = M_Gudang::where('id_pengelola', $this->session->id)->get();
        // dd("<pre>". $data['data'] ."</pre>");
        $data['sidebar'] = 'pengelola/sidebar';
        $data['content'] = 'pengelola/barang_create';
        $this->load->view('layouts/app', $data);
    }

    public function store()
    {
        if (!$this->input->post()) {
            redirect('/pengelola/barang');
        } else {
            $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
            $this->form_validation->set_rules('berat_barang', 'Berat Barang', 'required|integer');
            $this->form_validation->set_rules('id_komoditi', 'Jenis Komoditi Barang', 'required');
            $this->form_validation->set_rules('id_petani', 'Pemilik Barang (Petani)', 'required');

            if ($this->form_validation->run() == FALSE) {
                dd(validation_errors());
            } else {
                $barang = M_Barang::create([
                    'nama_barang' => $this->input->post('nama_barang'),
                    'berat_barang' => $this->input->post('berat_barang'),
                    'id_komoditi' => $this->input->post('id_komoditi'),
                    'id_petani' => $this->input->post('id_petani'),
                    'id_pengelola' => $this->session->id,
					'id_gudang' => $this->input->post('id_gudang'),
					'bulan_panen' => $this->input->post('bulan_panen'),
					'tahun_panen' => $this->input->post('tahun_panen'),
					'kemasan' => $this->input->post('kemasan'),
					'pengangkut' => $this->input->post('pengangkut'),
					'tgl_rencana' => date("Y-m-d", strtotime($this->input->post('tgl_rencana'))),
                    'tgl_pengajuan' => date("Y-m-d"),
                ]);

                if($barang) {
                    $this->session->set_flashdata('class', 'success');
                    $this->session->set_flashdata('message', 'Barang Berhasil Disimpan');
                } else {
                    $this->session->set_flashdata('class', 'danger');
                    $this->session->set_flashdata('message', 'Barang Gagal Disimpan');
                }
                redirect('pengelola/pengajuan');
            }
        }
    }

    public function show($id)
    {
        $data['data'] = M_barang::find($id);
        // dd($data['data']);
        $data['content'] = 'petani/show_barang';
        $this->load->view('layout_petani/master', $data);
    }

    public function edit($id)
    {
        $data['barang'] = M_Barang::find($id);
        $data['komoditi'] = M_Komoditi::all();
        $data['petani'] = M_User::where('role', 4)->get();
		$data['gudang'] = M_Gudang::where('id_pengelola', $this->session->id)->get();
        // dd($data['petani']);
        $data['sidebar'] = 'pengelola/sidebar';
        $data['content'] = 'pengelola/barang_edit';
        $this->load->view('layouts/app', $data);
    }

    public function update()
    {
        if (!$this->input->post()) {
            redirect('/petani/barang');
        } else {
            $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
            $this->form_validation->set_rules('berat_barang', 'Berat Barang', 'required|integer');
            $this->form_validation->set_rules('id_komoditi', 'Jenis Komoditi Barang', 'required');
            $this->form_validation->set_rules('id_petani', 'Pemilik Barang (Petani)', 'required');

            if ($this->form_validation->run() == FALSE) {
                dd(validation_errors());
            } else {
                $barang = M_Barang::find($this->input->post('id_barang'));
                $barang->nama_barang = $this->input->post('nama_barang');
                $barang->berat_barang = $this->input->post('berat_barang');
                $barang->id_komoditi = $this->input->post('id_komoditi');
                $barang->id_petani = $this->input->post('id_petani');
				$barang->id_pengelola = $this->session->id;
				$barang->id_gudang = $this->input->post('id_gudang');
				$barang->bulan_panen = $this->input->post('bulan_panen');
				$barang->tahun_panen = $this->input->post('tahun_panen');
				$barang->kemasan = $this->input->post('kemasan');
				$barang->pengangkut = $this->input->post('pengangkut');
				$barang->tgl_rencana = date("Y-m-d", strtotime($this->input->post('tgl_rencana')));
                $barang->save();

                if($barang) {
                    $this->session->set_flashdata('class', 'success');
                    $this->session->set_flashdata('message', 'Barang Berhasil Diperbarui');
                } else {
                    $this->session->set_flashdata('class', 'danger');
                    $this->session->set_flashdata('message', 'Barang Gagal Diperbarui');
                }
                redirect('pengelola/pengajuan');
            }
        }
    }

    public function destroy($id)
    {
        $barang = M_Barang::find($id);
        if ($barang->pengelola->id != $this->session->id) {
            $this->session->set_flashdata('class', 'danger');
            $this->session->set_flashdata('message', 'Barang Tidak Berhasil Dihapus');
        } else {
            $barang = $barang->delete();
            if($barang) {
                $this->session->set_flashdata('class', 'success');
                $this->session->set_flashdata('message', 'Barang Berhasil Dihapus');
            } else {
                $this->session->set_flashdata('class', 'danger');
                $this->session->set_flashdata('message', 'Barang Tidak Berhasil Dihapus');
            }
        }
        redirect('pengelola/pengajuan');
    }

	public function cetak_pengajuan($id)
    {
        $data['barang'] = M_Barang::where('id_barang', $id)->first();
        if (!$data['barang']) {
            redirect(base_url('pengelola/pengajuan'));
        } else {
            $this->load->view('layouts/simpan_barang', $data);
        }
    }
}
