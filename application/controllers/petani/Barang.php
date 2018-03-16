<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$data['data'] = M_barang::all();
        dd($data);
        $data['content'] = 'petani/barang';
        $this->load->view('layout_petani/master', $data); 
	}

	public function create()
    {
        $data['content'] = 'petani/create_barang';
        $this->load->view('layout_petani/master', $data);
    }

    public function store()
    {
        if (!$this->input->post()) {
            redirect('/petani/barang');
        } else {
            $user = $this->ion_auth->user()->row();

            $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
            $this->form_validation->set_rules('berat_barang', 'Berat Barang', 'required|integer');

            if ($this->form_validation->run() == FALSE) {
                // $this->load->view('myform');
            } else {
                $barang = M_barang::create([
                    'nama_barang' => $this->input->post('nama_barang'),
                    'berat_barang' => empty($this->input->post('berat_barang')) ? NULL : $this->input->post('berat_barang'),
                    'id_petani' => $user->id,
                    'tgl_pengajuan' => date("Y-m-d"),
                ]);
                // dd($barang);

                if($artikel) {
                    $this->session->set_flashdata('sukses', 'Barang Berhasil Disimpan');
                } else {
                    $this->session->set_flashdata('gagal', 'Barang Tidak Berhasil Disimpan');
                }
                // $this->load->view('myform');
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
        $data['data'] = M_barang::find($id);
        // dd($data['data']);
        $data['content'] = 'petani/edit_barang';
        $this->load->view('layout_petani/master', $data);
    }

    public function update()
    {
        if (!$this->input->post()) {
            redirect('/petani/barang');
        } else {
            // $user = $this->ion_auth->user()->row();

            $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
            $this->form_validation->set_rules('berat_barang', 'Berat Barang', 'required|integer');

            if ($this->form_validation->run() == FALSE) {
                // $this->load->view('myform');
            } else {
                $barang = M_barang::find($this->input->post('id'));
                $barang->nama_barang = $this->input->post('nama_barang');
                $barang->berat_barang = empty($this->input->post('berat_barang')) ? NULL : $this->input->post('berat_barang');
                $barang->save();

                dd($barang);

                if($barang) {
                    $this->session->set_flashdata('sukses', 'Barang Berhasil Diperbarui');
                } else {
                    $this->session->set_flashdata('gagal', 'Barang Tidak Berhasil Diperbarui');
                }
                // $this->load->view('myform');
            }
        }
    }

    public function destroy($id)
    {
        $barang = M_barang::destroy($id);
        if($barang) {
            $this->session->set_flashdata('sukses', 'Barang Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('gagal', 'Barang Tidak Berhasil Dihapus');
        }
    }


    // UNTUK TESTING ELOQUENT
    public function test_insert()
    {
        $barang = M_barang::create([
            'nama_barang' => 'Padi Karawitan 2',
            'berat_barang' => 4,
            'id_petani' => 1,
            'tgl_pengajuan' => date("Y-m-d"),
        ]);
        dd($barang);
    }

    public function test_update($id=1)
    {
        $barang = M_barang::find($id);
        $barang->nama_barang = 'Update Barang test';
        $barang->berat_barang = 3;
        $barang->id_petani = 1;
        $barang->tgl_pengajuan = date("Y-m-d");
        $barang->save();
        dd($barang);
    }
}
