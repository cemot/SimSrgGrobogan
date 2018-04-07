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
        $data['gudang'] = M_Gudang::where('id_pengelola', $this->session->id)->get();
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

            // $this->form_validation->set_rules('isi_catatan', 'Catatan Pengujian Barang', 'required');
            // $this->form_validation->set_rules('status', 'Status Catatan Pengujian Barang', 'required|integer');

            if ($this->form_validation->run() == FALSE) {
                dd(validation_errors());
            } else {
                $pengujian = M_Pengujian::create([
                    'id_pengelola' => $this->session->id,
                    'id_barang' => $this->input->post('id_barang'),
                    'id_gudang' => ($this->input->post('hsl_pengujian') == 'Ditolak') ? NULL : $this->input->post('id_gudang'),
                    'tgl_pengujian' => date("Y-m-d"),
                    'hsl_pengujian' => $this->input->post('hsl_pengujian'),
                    'created_by' => $this->session->id,
                ]);

                $catatan = M_Catatan::create([
                    'id_pengujian' => $pengujian->id_pengujian,
                    'isi_catatan' => empty($this->input->post('isi_catatan')) ? NULL : $this->input->post('isi_catatan'),
                    'status' => $this->input->post('status'),
                ]);

                if ($this->input->post('hsl_pengujian') == 'Diterima') {
                    $harga = M_Harga::create([
                        'id_pengujian' => $pengujian->id_pengujian,
                        'satuan_barang' => $this->input->post('satuan_barang'),
                        'harga_barang' => $this->input->post('harga_barang'),
                    ]);

                    $resi = M_Resi::create([
                        'no_resi' => $this->input->post('no_resi'),
                        'id_pengujian' => $pengujian->id_pengujian,
                        'tgl_penerbitan' => date("Y-m-d"),
                        'masa_aktif' => $this->input->post('masa_aktif'),
                        'jatuh_tempo' => strtotime("+".$this->input->post('masa_aktif')." months", strtotime(date("Y-m-d"))),
                    ]);

                }

                if($pengujian && $catatan) {
                    $this->session->set_flashdata('class', 'success');
                    $this->session->set_flashdata('message', 'Pengujian Barang Berhasil Disimpan');
                } else {
                    $this->session->set_flashdata('class', 'danger');
                    $this->session->set_flashdata('message', 'Pengujian Barang Gagal Disimpan');
                }
                redirect('pengelola/pengujian');
            }
        }
    }

    public function show($id)
    {
		$data['pengujian'] = M_Pengujian::where('id_pengujian', $id)->where('id_pengelola', $this->session->id)->first();
        if (!$data['pengujian']) {
            redirect('pengelola/pengujian');
        } else {
            $data['sidebar'] = 'pengelola/sidebar';
            $data['content'] = 'pengelola/pengujian_detail';
            $this->load->view('layouts/app', $data);
        }
    }

    public function edit($id)
    {
        $data['data'] = M_Pengujian::find($id);
        // dd('<pre>'.$data['data']->resi->first()->no_resi.'</pre>');
        $data['gudang'] = M_Gudang::where('id_pengelola', $this->session->id)->get();
        $data['sidebar'] = 'pengelola/sidebar';
        $data['content'] = 'pengelola/pengujian_edit';
        $this->load->view('layouts/app', $data);
    }

    public function update()
    {
        if (!$this->input->post()) {
            redirect('/pengelola/pengujian');
        } else {
            // dd($this->input->post());
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
                $pengujian->id_gudang = ($this->input->post('hsl_pengujian') == 'Ditolak') ? NULL : $this->input->post('id_gudang');
                if ($this->input->post('hsl_pengujian') == 'Diterima') {
                    $pengujian->harga->satuan_barang = $this->input->post('satuan_barang');
                    $pengujian->harga->harga_barang = $this->input->post('harga_barang');
                    // dd($pengujian->resi->first()->id_resi);
                    $resi = M_Resi::find($pengujian->resi->first()->id_resi);
                    // dd($resi);
                    $resi->no_resi = $this->input->post('no_resi');
                    $resi->masa_aktif = $this->input->post('masa_aktif');
                    $resi->jatuh_tempo = strtotime("+".$this->input->post('masa_aktif')." months", strtotime(date("Y-m-d")));
                    $resi->save();
                } else {
                    $harga = M_Harga::destroy($pengujian->harga->id_harga);
                    foreach ($pengujian->resi as $resi) {
                        $resi = M_Resi::destroy($resi->id_resi);
                    }
                }
                $pengujian->catatan->isi_catatan = empty($this->input->post('isi_catatan')) ? NULL : $this->input->post('isi_catatan');
                $pengujian->catatan->status = $this->input->post('status');
                $pengujian->updated_by = $this->session->id;
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
        $pengujian = M_Pengujian::find($id);
        if ($pengujian->pengelola->id != $this->session->id) {
            $this->session->set_flashdata('class', 'danger');
            $this->session->set_flashdata('message', 'Pengujian Tidak Berhasil Dihapus');
        } else {
            $pengujian = $pengujian->delete();
            if($pengujian) {
                $this->session->set_flashdata('class', 'success');
                $this->session->set_flashdata('message', 'Pengujian Berhasil Dihapus');
            } else {
                $this->session->set_flashdata('class', 'danger');
                $this->session->set_flashdata('message', 'Pengujian Tidak Berhasil Dihapus');
            }
        }
        redirect('pengelola/pengujian');
    }
}
