<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if (!$this->session->logged_in || !$this->session->role == 0){
			redirect('login');
		}
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
				if (empty($_FILES['gambar']) || !isset($_FILES['gambar'])) {
					$config['upload_path']		= './assets/img/uploads/';
	                $config['allowed_types']	= 'gif|jpg|png';
					$config['max_size']			= 1024;
					$config['file_name']		= str_replace(" ", "_", $this->input->post('judul'));
	                $config['overwrite']		= TRUE;

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('gambar')) {
	                    $error = array('error' => $this->upload->display_errors());
	                    dd($error);
	                } else {
	                    $data = array('upload_data' => $this->upload->data());
	                    // $this->load->view('upload_success', $data);
	                }
				}

                $artikel = M_Artikel::create([
                    'judul' => $this->input->post('judul'),
                    'isi' => empty($this->input->post('isi')) ? NULL : $this->input->post('isi'),
					'gambar' => str_replace(" ", "_", $this->input->post('judul')).$this->upload->data('file_ext'),
                    'tanggal' => date("Y-m-d"),
                    'id_penulis' => $this->session->id,
                    'status' => $this->input->post('status'),
                ]);

                if($artikel && $data) {
					$this->session->set_flashdata('class', 'success');
                    $this->session->set_flashdata('message', 'Artikel Berhasil Disimpan');
                } else {
					M_Artikel::destroy($artikel->id);
					$this->session->set_flashdata('class', 'danger');
                    $this->session->set_flashdata('message', 'Artikel Tidak Berhasil Disimpan');
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
				$artikel = M_Artikel::find($this->input->post('id_artikel'));
				if (empty($_FILES['gambar']) || !isset($_FILES['gambar'])) {
					$config['upload_path']		= './assets/img/uploads/';
	                $config['allowed_types']	= 'gif|jpg|png';
					$config['max_size']			= 1024;
					$config['file_name']		= str_replace(" ", "_", $this->input->post('judul'));
	                $config['overwrite']		= TRUE;

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('gambar')) {
	                    $error = array('error' => $this->upload->display_errors());
	                    dd($error);
	                } else {
	                    $data = array('upload_data' => $this->upload->data());
						$artikel->gambar = str_replace(" ", "_", $this->input->post('judul')).$this->upload->data('file_ext');
	                }
				}
                $artikel->judul = $this->input->post('judul');
                $artikel->isi = empty($this->input->post('isi')) ? NULL : $this->input->post('isi');
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
		$art = M_Artikel::find($id);
		if ($art->gambar != 'image_placeholder.jpg') {
			unlink('./assets/img/uploads/'.$art->gambar);
		}
        $artikel = M_Artikel::destroy($id);
        if($artikel) {
            $this->session->set_flashdata('sukses', 'Artikel Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('gagal', 'Artikel Tidak Berhasil Dihapus');
        }
        redirect('admin/artikel');
    }
}
