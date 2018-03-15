<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$data['data'] = M_Artikel::all();
        dd($data);
        $data['content'] = 'admin/artikel';
        $this->load->view('layout_admin/master', $data); 
	}

	public function create()
    {
        $data['content'] = 'admin/create_artikel';
        $this->load->view('layout_admin/master', $data);
    }

    public function store()
    {
        if (!$this->input->post()) {
            redirect('/admin/artikel');
        } else {
            $user = $this->ion_auth->user()->row();

            $this->form_validation->set_rules('judul', 'Judul Artikel', 'required');
            $this->form_validation->set_rules('isi', 'Isi Artikel', 'required');

            if ($this->form_validation->run() == FALSE) {
                // $this->load->view('myform');
            } else {
                $artikel = M_Artikel::create([
                    'judul' => $this->input->post('judul'),
                    'isi' => empty($this->input->post('isi')) ? NULL : $this->input->post('isi'),
                    // 'tanggal' => 'nurliaha@gmail.com',
                    'penulis' => $user->id,
                    'status' => empty($this->input->post('status')) ? NULL : $this->input->post('status'),
                ]);
                // dd($artikel);

                if($artikel) {
                    $this->session->set_flashdata('sukses', 'Artikel Berasil Disimpan');
                } else {
                    $this->session->set_flashdata('gagal', 'Artikel Tidak Berhasil Disimpan');
                }
                // $this->load->view('myform');
            }
        }
    }

    public function show($id)
    {
        $data['data'] = M_Artikel::find($id);
        // dd($data['data']);
        $data['content'] = 'admin/show_artikel';
        $this->load->view('layout_admin/master', $data);
    }

    public function edit($id)
    {
        $data['data'] = M_Artikel::find($id);
        // dd($data['data']);
        $data['content'] = 'admin/edit_artikel';
        $this->load->view('layout_admin/master', $data);
    }

    public function update()
    {
        if (!$this->input->post()) {
            redirect('/admin/artikel');
        } else {
            // $user = $this->ion_auth->user()->row();

            $this->form_validation->set_rules('judul', 'Judul Artikel', 'required');
            $this->form_validation->set_rules('isi', 'Isi Artikel', 'required');

            if ($this->form_validation->run() == FALSE) {
                // $this->load->view('myform');
            } else {
                $artikel = M_Artikel::find($this->input->post('id'));
                $artikel->judul = $this->input->post('judul');
                $artikel->isi = empty($this->input->post('isi')) ? NULL : $this->input->post('isi');
                $artikel->penulis = empty($this->input->post('penulis')) ? NULL : $this->input->post('penulis');
                $artikel->status = empty($this->input->post('status')) ? NULL : $this->input->post('status');
                $artikel->save();

                dd($artikel);

                if($artikel) {
                    $this->session->set_flashdata('sukses', 'Artikel Berasil Diperbarui');
                } else {
                    $this->session->set_flashdata('gagal', 'Artikel Tidak Berhasil Diperbarui');
                }
                // $this->load->view('myform');
            }
        }
    }

    public function destroy($id)
    {
        $artikel = M_Artikel::destroy($id);
        if($artikel) {
            $this->session->set_flashdata('sukses', 'Artikel Berasil Dihapus');
        } else {
            $this->session->set_flashdata('gagal', 'Artikel Tidak Berhasil Dihapus');
        }
    }


    // UNTUK TESTING ELOQUENT
    public function test_insert()
    {
        $artikel = M_Artikel::create([
            'judul' => 'barang naik2!',
            'isi' => 'komoditi pada naik cuyiii',
            'penulis' => 1,
            'status' => 1,
        ]);
        dd($artikel);
    }

    public function test_update($id=1)
    {
        $artikel = M_Artikel::find($id);
        $artikel->judul = 'Test Update1';
        $artikel->isi = 'ini boy isinyaa';
        $artikel->penulis = 1;
        $artikel->status = 0;
        $artikel->save();
        dd($artikel);
    }
}
