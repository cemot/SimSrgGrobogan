<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		// dd('sampesini');
        $data['data'] = M_Artikel::all();
        // dd($data);
        $data['sidebar'] = 'admin/sidebar';
        $data['content'] = 'admin/artikel';
        $this->load->view('layouts/app', $data); 
	}

	public function create()
    {
        $data['sidebar'] = 'admin/sidebar';
        $data['content'] = 'admin/artikel_create';
        $this->load->view('layouts/app', $data);
    }

    public function store()
    {
        if (!$this->input->post()) {
            redirect('admin/artikel');
        } else {
            // dd($this->input->post());
            $this->form_validation->set_rules('judul', 'Judul Artikel', 'required|min_length[5]');
            $this->form_validation->set_rules('isi', 'Isi Artikel', 'required');

            if ($this->form_validation->run() == FALSE) {
                redirect('admin/artikel/create');
            } else {
                $artikel = M_Artikel::create([
                    'judul' => $this->input->post('judul'),
                    'isi' => empty($this->input->post('isi')) ? NULL : $this->input->post('isi'),
                    // 'tanggal' => 'nurliaha@gmail.com',
                    'id_penulis' => $this->session->id,
                    'status' => $this->input->post('status'),
                ]);
                // dd($artikel);

                if($artikel) {
                    $this->session->set_flashdata('sukses', 'Artikel Berhasil Disimpan');
                } else {
                    $this->session->set_flashdata('gagal', 'Artikel Tidak Berhasil Disimpan');
                }
                redirect('admin/artikel');
            }
        }
    }

    public function show($id)
    {
        $data['artikel'] = M_Artikel::find($id);
        $data['sidebar'] = 'admin/sidebar';
        $data['content'] = 'admin/artikel_show';
        $this->load->view('layouts/app', $data);
    }

    public function edit($id)
    {
        $data['artikel'] = M_Artikel::find($id);
        if(!$data['artikel']) {
            redirect('admin/artikel');
        }
        $data['sidebar'] = 'admin/sidebar';
        $data['content'] = 'admin/artikel_edit';
        $this->load->view('layouts/app', $data);
    }

    public function update()
    {
        if (!$this->input->post()) {
            redirect('admin/artikel');
        } else {
            $this->form_validation->set_rules('judul', 'Judul Artikel', 'required');
            $this->form_validation->set_rules('isi', 'Isi Artikel', 'required');

            if ($this->form_validation->run() == FALSE) {
                redirect('admin/artikel');
            } else {
                // dd('sampe sini');
                $artikel = M_Artikel::find($this->input->post('id_artikel'));
                $artikel->judul = $this->input->post('judul');
                $artikel->isi = empty($this->input->post('isi')) ? NULL : $this->input->post('isi');
                // $artikel->id_penulis = empty($this->input->post('id_penulis')) ? NULL : $this->input->post('id_penulis');
                $artikel->status = $this->input->post('status');
                $artikel->save();

                if($artikel) {
                    $this->session->set_flashdata('sukses', 'Artikel Berhasil Diperbarui');
                } else {
                    $this->session->set_flashdata('gagal', 'Artikel Tidak Berhasil Diperbarui');
                }
                redirect('admin/artikel');
            }
        }
    }

    public function destroy($id)
    {
        $artikel = M_Artikel::destroy($id);
        if($artikel) {
            $this->session->set_flashdata('sukses', 'Artikel Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('gagal', 'Artikel Tidak Berhasil Dihapus');
        }
        redirect('admin/artikel');
    }


    // UNTUK TESTING ELOQUENT
    public function test_insert()
    {
        $artikel = M_Artikel::create([
            'judul' => 'barang naik2!',
            'isi' => 'komoditi pada naik cuyiii',
            'id_penulis' => 1,
            'status' => 1,
        ]);
        dd($artikel);
    }

    public function test_update($id=1)
    {
        $artikel = M_Artikel::find($id);
        $artikel->judul = 'Test Update1';
        $artikel->isi = 'ini boy isinyaa';
        $artikel->id_penulis = 1;
        $artikel->status = 0;
        $artikel->save();
        dd($artikel);
    }
}
