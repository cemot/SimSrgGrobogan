<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        if (!$this->session->has_userdata('logged_in')) {
            $this->load->view('auth/login'); 
        } else {
            if ($this->session->userdata('role') == 0) {
                redirect('admin/dashboard');
            } elseif ($this->session->userdata('role') == 1) {
                redirect('pengelola/dashboard');
            } elseif ($this->session->userdata('role') == 2) {
                redirect('dinas/dashboard');
            } else {
                redirect('petani/dashboard');
            }
        }        
	}

    public function login()
    {
        // $username = 'fakhrifauzan';
        // $password = 'password';

        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $user = M_User::where('username', $username)->where('password', $password)->first();
        // dd($user);

        if (!$user) {
            $this->session->set_flashdata('class', 'danger');
            $this->session->set_flashdata('message', 'Username / Password salah!');
            redirect(base_url());
        } else {
            $session_data = array(
                'id'        => $user->id,
                'nama'      => $user->nama,
                'email'     => $user->email,
                'jabatan'   => $user->jabatan,
                'role'      => $user->role,
                'tmpt_lahir'=> $user->tmpt_lahir,
                'tgl_lahir' => $user->tgl_lahir,
                'alamat'    => $user->alamat,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);

            if ($this->session->userdata('role') == 0) {
                redirect('admin/dashboard');
            } elseif ($this->session->userdata('role') == 1) {
                redirect('pengelola/dashboard');
            } elseif ($this->session->userdata('role') == 2) {
                redirect('dinas/dashboard');
            } else {
                redirect('petani/dashboard');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());       
    }

    public function cek_id()
    {
        echo $this->session->id;
    }
}