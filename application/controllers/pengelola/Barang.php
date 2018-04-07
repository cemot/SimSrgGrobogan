<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$data['data_saya'] = M_Barang::where('id_pengelola', $this->session->id)->get();
        $data['data'] = M_Barang::where('id_pengelola', '!=', $this->session->id)->get();
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
        // dd("<pre>". $data['data'] ."</pre>");
        $data['sidebar'] = 'pengelola/sidebar';
        $data['content'] = 'pengelola/barang_create';
        $this->load->view('layouts/app', $data);
    }

    public function store()
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
                $barang = M_Barang::create([
                    'nama_barang' => $this->input->post('nama_barang'),
                    'berat_barang' => $this->input->post('berat_barang'),
                    'id_komoditi' => $this->input->post('id_komoditi'),
                    'id_petani' => $this->input->post('id_petani'),
                    'id_pengelola' => $this->session->id,
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
}
