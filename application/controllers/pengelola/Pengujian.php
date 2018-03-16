<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengujian extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$data['data'] = M_Pengujian::all();
        dd($data);
        $data['content'] = 'pengelola/pengujian';
        $this->load->view('layout_pengelola/master', $data); 
	}

	public function create()
    {
        $data['content'] = 'pengelola/create_gudang';
        $this->load->view('layout_pengelola/master', $data);
    }

    public function store()
    {
        if (!$this->input->post()) {
            redirect('/pengelola/pengujian');
        } else {
            $user = $this->ion_auth->user()->row();

            $this->form_validation->set_rules('id_barang', 'Barang Pengujian', 'required|integer');
            $this->form_validation->set_rules('hsl_pengujian', 'Hasil Pengujian', 'required');

            $this->form_validation->set_rules('isi_catatan', 'Catatan Pengujian Barang', 'required');
            $this->form_validation->set_rules('status', 'Status Catatan Pengujian Barang', 'required|integer');


            if ($this->form_validation->run() == FALSE) {
                // $this->load->view('myform');
            } else {
                $pengujian = M_Pengujian::create([
                    'id_pengelola' => $user->id,
                    'id_barang' => $this->input->post('id_barang'),
                    'tgl_pengujian' => date("Y-m-d"),
                    'hsl_pengujian' => empty($this->input->post('hsl_pengujian')) ? NULL : $this->input->post('hsl_pengujian'),
                ]);

                $catatan = M_Catatan::create([
                    'id_pengujian' => $id_pengujian->id,
                    'isi_catatan' => empty($this->input->post('isi_catatan')) ? NULL : $this->input->post('isi_catatan'),
                    'status' => $this->input->post('status'),
                ]);
                // dd($pengujian);

                if($pengujian && $catatan) {
                    $this->session->set_flashdata('sukses', 'Pengujian Barang Berhasil Disimpan');
                } else {
                    $this->session->set_flashdata('gagal', 'Pengujian Barang Tidak Berhasil Disimpan');
                }
                // $this->load->view('myform');
            }
        }
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
        $data['data'] = M_Pengujian::find($id);
        // dd($data['data']);
        $data['content'] = 'pengelola/edit_pengujian';
        $this->load->view('layout_pengelola/master', $data);
    }

    public function update()
    {
        if (!$this->input->post()) {
            redirect('/pengelola/pengujian');
        } else {
            // $user = $this->ion_auth->user()->row();

            $this->form_validation->set_rules('id_barang', 'Barang Pengujian', 'required|integer');
            $this->form_validation->set_rules('hsl_pengujian', 'Hasil Pengujian Pengujian', 'required');

            $this->form_validation->set_rules('isi_catatan', 'Catatan Pengujian Barang', 'required');
            $this->form_validation->set_rules('status', 'Status Catatan Pengujian Barang', 'required|integer');

            if ($this->form_validation->run() == FALSE) {
                // $this->load->view('myform');
            } else {
                $pengujian = M_Pengujian::find($this->input->post('id'));
                $pengujian->tgl_pengujian = empty($this->input->post('tgl_pengujian')) ? NULL : $this->input->post('tgl_pengujian');
                $pengujian->hsl_pengujian = empty($this->input->post('hsl_pengujian')) ? NULL : $this->input->post('hsl_pengujian');
                $pengujian->save();

                $catatan = M_Catatan::where('id_pengujian', $pengujian->id)->first();
                $catatan->isi_catatan = empty($this->input->post('isi_catatan')) ? NULL : $this->input->post('isi_catatan');
                $catatan->status = $this->input->post('status');

                // dd($pengujian);
                // dd($catatan);

                if($pengujian && $catatan) {
                    $this->session->set_flashdata('sukses', 'Pengujian Barang Berhasil Diperbarui');
                } else {
                    $this->session->set_flashdata('gagal', 'Pengujian Barang Tidak Berhasil Diperbarui');
                }
                // $this->load->view('myform');
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