<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$data['data'] = M_User::all();
        $data['sidebar'] = 'admin/sidebar';
        $data['content'] = 'admin/user';
        $this->load->view('layouts/app', $data);
	}

    public function all()
    {
        $user = M_User::all();
        $i = 1;
        $data = new stdClass();
        foreach ($user as $user) {
            $data->data->no = $i;
            $data->data->role = $user->role;
            $data->data->username = $user->username;
            $data->data->nama = $user->nama;
            $data->data->no_tlp = $user->no_tlp;
            $data->data->no_tlp = $user->no_tlp;
        }
        echo json_encode($data);
        // foreach ($user as $user) {
            
        // }
        // echo '<pre>' . $user . '</pre>';

        // $data['sidebar'] = 'admin/sidebar';
        // $data['content'] = 'admin/user';
        // $this->load->view('layouts/app', $data);
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
            // $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
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
                    // 'jabatan'   => empty($this->input->post('jabatan')) ? NULL : $this->input->post('jabatan'),  
                    'role'      => $this->input->post('role'),  
                    'tmpt_lahir'=> $this->input->post('tmpt_lahir'),  
                    'tgl_lahir' => $this->input->post('tgl_lahir'),  
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
                $user->tgl_lahir    = empty($this->input->post('tgl_lahir')) ? NULL : $this->input->post('tgl_lahir');  
                $user->alamat   = empty($this->input->post('alamat')) ? NULL : $this->input->post('alamat');
                $user->no_tlp   = $this->input->post('no_tlp');

                $user->save();

                // dd($user);

                if($user) {
                    $this->session->set_flashdata('sukses', 'User Berhasil Diperbarui');
                } else {
                    $this->session->set_flashdata('gagal', 'User Tidak Berhasil Diperbarui');
                }
                // $this->load->view('myform');
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


    // UNTUK TESTING ELOQUENT
    public function test_insert()
    {
        $user = M_User::create([
            'username'  => 'demo', 
            'password'  => md5('demo'),  
            'nama'      => 'demo',
            'email'     => 'demo@demo.com',  
            'jabatan'   => NULL,  
            'role'      => 0,  
            'tmpt_lahir'=> 'Jakarta',  
            'tgl_lahir' => '2018-06-06',  
            'alamat'    => 'Pamulang',  
            'no_tlp'    => '08567018044'
        ]);
        dd($user);
    }

    public function test_update($id=6)
    {
        $user = M_User::find($id);
        $user->no_tlp = '08567018044';
        $user->save();
        dd($user);
    }
}