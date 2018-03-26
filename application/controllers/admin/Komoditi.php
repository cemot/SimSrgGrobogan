<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komoditi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $data['data'] = M_Komoditi::all();
        $data['sidebar'] = 'admin/sidebar';
        $data['content'] = 'admin/komoditi';
        $this->load->view('layouts/app', $data);
	}

	public function create()
    {
        // $teruji = M_Pengujian::get(['id_barang']);
        // dd("<pre> $teruji </pre>");
        // $data['data'] = M_Barang::whereNotIn('id_barang', M_Pengujian::get(['id_barang']))->get();
        // $data['data'] = M_User::where('role', 4)->get();
        // dd("<pre>". $data['data'] ."</pre>");
        $data['sidebar'] = 'admin/sidebar';
        $data['content'] = 'admin/komoditi_create';
        $this->load->view('layouts/app', $data);
    }

    public function store()
    {
        if (!$this->input->post()) {
            redirect('admin/komoditi');
        } else {
            $this->form_validation->set_rules('nama_komoditi', 'Nama Komoditi', 'required');

            if ($this->form_validation->run() == FALSE) {
                dd(validation_errors());
            } else {
                $komoditi = M_Komoditi::create([
                    'nama_komoditi' => $this->input->post('nama_komoditi'),
                    'created_by' => $this->session->id,
                ]);

                if($komoditi) {
                    $this->session->set_flashdata('class', 'success');
                    $this->session->set_flashdata('message', 'Jenis Komoditi Berhasil Disimpan');
                } else {
                    $this->session->set_flashdata('class', 'danger');
                    $this->session->set_flashdata('message', 'Jenis Komoditi Gagal Disimpan');
                }
                redirect('admin/komoditi');
            }
        }
    }

    public function show($id)
    {
        // $data['data'] = M_barang::find($id);
        // dd($data['data']);
        // $data['content'] = 'petani/show_barang';
        // $this->load->view('layout_petani/master', $data);
    }

    public function edit($id)
    {
        $data['komoditi'] = M_Komoditi::find($id);
        $data['sidebar'] = 'admin/sidebar';
        $data['content'] = 'admin/komoditi_edit';
        $this->load->view('layouts/app', $data);
    }

    public function update()
    {
        if (!$this->input->post()) {
            redirect('admin/komoditi');
        } else {
            $this->form_validation->set_rules('nama_komoditi', 'Nama Komoditi', 'required');
            if ($this->form_validation->run() == FALSE) {
                dd(validation_errors());
            } else {
                $komoditi = M_Komoditi::find($this->input->post('id_komoditi'));
                $komoditi->nama_komoditi = $this->input->post('nama_komoditi');
                $komoditi->updated_by = $this->session->id;
                $komoditi->save();

                if($komoditi) {
                    $this->session->set_flashdata('class', 'success');
                    $this->session->set_flashdata('message', 'Jenis Komoditi Berhasil Diperbarui');
                } else {
                    $this->session->set_flashdata('class', 'danger');
                    $this->session->set_flashdata('message', 'Jenis Komoditi Gagal Diperbarui');
                }
                redirect('admin/komoditi');
            }
        }
    }

    public function destroy($id)
    {
        $komoditi = M_Komoditi::find($id);
        if ($komoditi->created_by->id != $this->session->id) {
            $this->session->set_flashdata('class', 'danger');
            $this->session->set_flashdata('message', 'Jenis Komoditi Tidak Berhasil Dihapus');
        } else {
            $komoditi = $komoditi->delete();
            if($komoditi) {
                $this->session->set_flashdata('class', 'success');
                $this->session->set_flashdata('message', 'Jenis Komoditi Berhasil Dihapus');
            } else {
                $this->session->set_flashdata('class', 'danger');
                $this->session->set_flashdata('message', 'Jenis Komoditi Tidak Berhasil Dihapus');
            }
        }
        redirect('admin/komoditi');
    }
}