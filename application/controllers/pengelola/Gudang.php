<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Capsule\Manager as DB;

class Gudang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if ($this->session->role != 1){
			redirect('login');
		}
    }

	public function index()
	{
		$data['data_saya'] = M_Gudang::where('id_pengelola', $this->session->id)->get();
		$data['data'] = M_Gudang::where('id_pengelola', '!=', $this->session->id)->get();
        $data['sidebar'] = 'pengelola/sidebar';
        $data['content'] = 'pengelola/gudang';
        $this->load->view('layouts/app', $data);
	}

	public function create()
    {
        $data['sidebar'] = 'pengelola/sidebar';
        $data['content'] = 'pengelola/gudang_create';
        $this->load->view('layouts/app', $data);
    }

    public function store()
    {
        if (!$this->input->post()) {
            redirect('pengelola/gudang');
        } else {
            $this->form_validation->set_rules('nama', 'Nama Gudang', 'required');
            $this->form_validation->set_rules('kapasitas', 'Kapasitas Gudang', 'required|integer');

            if ($this->form_validation->run() == FALSE) {
                redirect('/pengelola/gudang');
            } else {
                $gudang = M_Gudang::create([
                    'nama' => $this->input->post('nama'),
                    'kapasitas' => $this->input->post('kapasitas'),
                    'alamat' => empty($this->input->post('alamat')) ? NULL : $this->input->post('alamat'),
                    'id_pengelola' => $this->session->id
                ]);

                if($gudang) {
                    $this->session->set_flashdata('class', 'success');
                    $this->session->set_flashdata('message', 'Gudang Berhasil Disimpan');
                } else {
                    $this->session->set_flashdata('class', 'danger');
                    $this->session->set_flashdata('message', 'Gudang Tidak Berhasil Diperbarui');
                }
                redirect('pengelola/gudang');
            }
        }
    }

    public function show($id)
    {
        $data['gudang'] = M_Gudang::where('id_gudang', $id)->where('id_pengelola', $this->session->id)->first();
        if (!$data['gudang']) {
            redirect('pengelola/gudang');
        } else {
			$data['isi_sisa'] = DB::table('gudang')
								->join('pengujian', 'gudang.id_gudang', '=', 'pengujian.id_gudang')
								->join('barang', 'barang.id_barang', '=', 'pengujian.id_barang')
					            ->select(DB::raw('gudang.id_gudang, sum(barang.berat_barang) as isi, gudang.kapasitas - sum(barang.berat_barang) as sisa'))
					            ->where('pengujian.hsl_pengujian', '=', 'Diterima')
								->where('gudang.id_gudang', $id)
					            ->groupBy('gudang.id_gudang')
					            ->first();
            $data['sidebar'] = 'pengelola/sidebar';
            $data['content'] = 'pengelola/gudang_detail';
            $this->load->view('layouts/app', $data);
        }
    }

    public function edit($id)
    {
        $data['gudang'] = M_Gudang::where('id_gudang', $id)->where('id_pengelola', $this->session->id)->first();
        if (!$data['gudang']) {
            redirect('pengelola/gudang');
        } else {
            $data['sidebar'] = 'pengelola/sidebar';
            $data['content'] = 'pengelola/gudang_edit';
            $this->load->view('layouts/app', $data);
        }
    }

    public function update()
    {
        if (!$this->input->post()) {
            redirect('pengelola/gudang');
        } else {
            $this->form_validation->set_rules('nama', 'Nama Gudang', 'required');
            $this->form_validation->set_rules('kapasitas', 'Kapasitas Gudang', 'required|integer');

            if ($this->form_validation->run() == FALSE) {
                // $this->load->view('myform');
            } else {
                $gudang = M_Gudang::find($this->input->post('id_gudang'));
                $gudang->nama = $this->input->post('nama');
                $gudang->kapasitas = $this->input->post('kapasitas');
                $gudang->alamat = empty($this->input->post('alamat')) ? NULL : $this->input->post('alamat');
                $gudang->save();

                if($gudang) {
                    $this->session->set_flashdata('class', 'success');
                    $this->session->set_flashdata('message', 'Gudang Berhasil Diperbarui');
                } else {
                    $this->session->set_flashdata('class', 'danger');
                    $this->session->set_flashdata('message', 'Gudang Tidak Berhasil Diperbarui');
                }
                redirect('pengelola/gudang');
            }
        }
    }

    public function destroy($id)
    {
        $gudang = M_Gudang::find($id);
        if ($gudang->pengelola->id != $this->session->id) {
            $this->session->set_flashdata('class', 'danger');
            $this->session->set_flashdata('message', 'Gudang Tidak Berhasil Dihapus');
        } else {
            $gudang = $gudang->delete();
            if($gudang) {
                $this->session->set_flashdata('class', 'success');
                $this->session->set_flashdata('message', 'Gudang Berhasil Dihapus');
            } else {
                $this->session->set_flashdata('class', 'danger');
                $this->session->set_flashdata('message', 'Gudang Tidak Berhasil Dihapus');
            }
        }
        redirect('pengelola/gudang');
    }
}
