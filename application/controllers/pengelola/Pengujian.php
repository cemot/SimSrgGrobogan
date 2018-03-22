<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengujian extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $data['data_saya'] = M_Pengujian::where('id_pengelola', $this->session->id)->get();
        $data['data'] = M_Pengujian::where('id_pengelola', '!=', $this->session->id)->get();
        $data['sidebar'] = 'pengelola/sidebar';
        $data['content'] = 'pengelola/pengujian';
        $this->load->view('layouts/app', $data);
	}

	public function create()
    {
        $data['data'] = M_Barang::where('id_pengelola', $this->session->id)
                        ->whereNotIn('id_barang', M_Pengujian::get(['id_barang']))->get();
        $data['sidebar'] = 'pengelola/sidebar';
        $data['content'] = 'pengelola/pengujian_create';
        $this->load->view('layouts/app', $data);
    }

    public function store()
    {
        if (!$this->input->post()) {
            redirect('/pengelola/pengujian');
        } else {
            $this->form_validation->set_rules('id_barang', 'Barang Pengujian', 'required|integer');
            $this->form_validation->set_rules('hsl_pengujian', 'Hasil Pengujian', 'required');

            $this->form_validation->set_rules('satuan_barang', 'Satuan Barang', 'required');
            $this->form_validation->set_rules('harga_barang', 'Harga Barang', 'required');

            $this->form_validation->set_rules('isi_catatan', 'Catatan Pengujian Barang', 'required');
            $this->form_validation->set_rules('status', 'Status Catatan Pengujian Barang', 'required|integer');

            if ($this->form_validation->run() == FALSE) {
                dd(validation_errors());
            } else {
                $pengujian = M_Pengujian::create([
                    'id_pengelola' => $this->session->id,
                    'id_barang' => $this->input->post('id_barang'),
                    'tgl_pengujian' => date("Y-m-d"),
                    'hsl_pengujian' => $this->input->post('hsl_pengujian'),
                ]);

                $catatan = M_Catatan::create([
                    'id_pengujian' => $pengujian->id_pengujian,
                    'isi_catatan' => empty($this->input->post('isi_catatan')) ? NULL : $this->input->post('isi_catatan'),
                    'status' => $this->input->post('status'),
                ]);

                $harga = M_Harga::create([
                    'id_pengujian' => $pengujian->id_pengujian,
                    'satuan_barang' => $this->input->post('satuan_barang'),
                    'harga_barang' => $this->input->post('harga_barang'),
                ]);

                if($pengujian && $catatan && $harga) {
                    $this->session->set_flashdata('class', 'success');
                    $this->session->set_flashdata('message', 'Pengujian Barang Berhasil Disimpan');
                } else {
                    $this->session->set_flashdata('class', 'danger');
                    $this->session->set_flashdata('message', 'Pengujian Barang Berhasil Disimpan');
                }
                redirect('pengelola/pengujian');
            }
        }
    }

    public function show($id)
    {
        $data['data'] = M_Pengujian::find($id);
        $data['sidebar'] = 'pengelola/sidebar';
        $data['content'] = 'pengelola/pengujian_show';
        $this->load->view('layouts/app', $data);
    }

    public function edit($id)
    {
        $data['data'] = M_Pengujian::find($id);
        // dd($data['data']);
        $data['sidebar'] = 'pengelola/sidebar';
        $data['content'] = 'pengelola/pengujian_edit';
        $this->load->view('layouts/app', $data);
    }

    public function update()
    {
        if (!$this->input->post()) {
            redirect('/pengelola/pengujian');
        } else {
            $this->form_validation->set_rules('hsl_pengujian', 'Hasil Pengujian', 'required');

            $this->form_validation->set_rules('satuan_barang', 'Satuan Barang', 'required');
            $this->form_validation->set_rules('harga_barang', 'Harga Barang', 'required');

            $this->form_validation->set_rules('isi_catatan', 'Catatan Pengujian Barang', 'required');
            $this->form_validation->set_rules('status', 'Status Catatan Pengujian Barang', 'required|integer');

            if ($this->form_validation->run() == FALSE) {
                dd(validation_errors());
            } else {
                $pengujian = M_Pengujian::find($this->input->post('id_pengujian'));
                $pengujian->hsl_pengujian = $this->input->post('hsl_pengujian');
                $pengujian->harga->satuan_barang = $this->input->post('satuan_barang');
                $pengujian->harga->harga_barang = $this->input->post('harga_barang');
                $pengujian->catatan->isi_catatan = $this->input->post('isi_catatan');
                $pengujian->catatan->status = $this->input->post('status');
                $pengujian->save();

                if($pengujian) {
                    $this->session->set_flashdata('class', 'success');
                    $this->session->set_flashdata('message', 'Pengujian Barang Berhasil Diperbarui');
                } else {
                    $this->session->set_flashdata('class', 'danger');
                    $this->session->set_flashdata('message', 'Pengujian Barang Gagal Diperbarui');
                }
                redirect('pengelola/pengujian');
            }
        }
    }

    public function destroy($id)
    {
        $pengujian = M_Pengujian::destroy($id);
        if($pengujian) {
            $this->session->set_flashdata('sukses', 'Pengujian Barang Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('gagal', 'Pengujian Barang Tidak Berhasil Dihapus');
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