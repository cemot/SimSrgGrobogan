<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if ($this->session->role != 0){
			redirect('login');
		}
    }

	public function index()
	{
		$data['data'] = M_User::all();
        $data['sidebar'] = 'admin/sidebar';
        $data['content'] = 'admin/user';
        $this->load->view('layouts/app', $data);
	}

	public function create()
    {
        $data['sidebar'] = 'admin/sidebar';
        $data['content'] = 'admin/user_create';
        $this->load->view('layouts/app', $data);
    }

    public function store()
    {
        if (!$this->input->post()) {
            redirect('admin/user');
        } else {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');
            $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
            $this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
            $this->form_validation->set_rules('role', 'Role User', 'required');
            $this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'required');
            $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('no_tlp', 'No Telepon / No HP', 'required');

            if ($this->form_validation->run() == FALSE) {
                dd(validation_errors());
            } else {
                $user = M_User::create([
                    'username'  => $this->input->post('username'),
                    'password'  => md5($this->input->post('password')),
                    'nama'      => $this->input->post('nama'),
                    'email'     => $this->input->post('email'),
					'no_ktp'    => $this->input->post('no_ktp'),
                    'kecamatan' => $this->input->post('kecamatan'),
                    'role'      => $this->input->post('role'),
                    'tmpt_lahir'=> $this->input->post('tmpt_lahir'),
                    'tgl_lahir' => date("Y-m-d", strtotime($this->input->post('tgl_lahir'))),
                    'alamat'    => $this->input->post('alamat'),
                    'no_tlp'    => $this->input->post('no_tlp')
                ]);
                // dd($user);

                if($artikel) {
                    $this->session->set_flashdata('sukses', 'User Berhasil Disimpan');
                } else {
                    $this->session->set_flashdata('gagal', 'User Tidak Berhasil Disimpan');
                }
                redirect('admin/user');
            }
        }
    }

    public function show($id)
    {
        $data['data'] = M_User::find($id);
        // dd($data['data']);
        $data['content'] = 'admin/show_user';
        $this->load->view('layout_admin/master', $data);
    }

    public function edit($id)
    {
        if ($id == $this->session->id) {
            redirect('admin/profile');
        } else {
            $data['user'] = M_User::find($id);
            if(!$data['user']) {
                redirect('admin/user');
            } else {
                $data['sidebar'] = 'admin/sidebar';
                $data['content'] = 'admin/user_edit';
                $this->load->view('layouts/app', $data);
            }
        }
    }

    public function update()
    {
        if (!$this->input->post()) {
            redirect('admin/profile');
        } else {
            $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
            $this->form_validation->set_rules('no_tlp', 'No Telepon / No HP', 'required');

            if ($this->form_validation->run() == FALSE) {
                dd(validation_errors());
                redirect('admin/user');
            } else {
                $user = M_User::find($this->input->post('id'));
                $user->nama     = $this->input->post('nama');
				$user->email    = $this->input->post('email');
				$user->tmpt_lahir   = empty($this->input->post('tmpt_lahir')) ? NULL : $this->input->post('tmpt_lahir');
                $user->no_ktp   = empty($this->input->post('no_ktp')) ? NULL : $this->input->post('no_ktp');
                $user->tgl_lahir    = date("Y-m-d", strtotime($this->input->post('tgl_lahir')));
				$user->alamat   = empty($this->input->post('alamat')) ? NULL : $this->input->post('alamat');
                $user->kecamatan   = $this->input->post('kecamatan');
                $user->no_tlp   = $this->input->post('no_tlp');
                $user->save();

                if($user) {
                    $this->session->set_flashdata('sukses', 'User Berhasil Diperbarui');
                } else {
                    $this->session->set_flashdata('gagal', 'User Tidak Berhasil Diperbarui');
                }
                redirect('admin/user');
            }
        }
    }

    public function destroy($id)
    {
        $user = M_User::destroy($id);
        if($user) {
            $this->session->set_flashdata('sukses', 'User Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('gagal', 'User Tidak Berhasil Dihapus');
        }
        redirect('admin/user');
    }
}
