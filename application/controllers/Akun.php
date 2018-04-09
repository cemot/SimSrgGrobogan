<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		if (!$this->session->has_userdata('logged_in')) {
            redirect('login');
        }
    }

	public function index()
	{
		$this->dashboard();
	}

	public function dashboard()
    {
		$data['beras'] = M_Komoditi_Harga::where('id_komoditi', 1)->orderBy('tanggal', 'desc')->limit(2)->get()->reverse();
		$data['jagung'] = M_Komoditi_Harga::where('id_komoditi', 2)->orderBy('tanggal', 'desc')->limit(2)->get()->reverse();
		$data['gabah'] = M_Komoditi_Harga::where('id_komoditi', 3)->orderBy('tanggal', 'desc')->limit(2)->get()->reverse();
		// print_r('<pre>'.$data['beras'].'</pre>');
		if ($this->session->role == 0) { // ADMINISTRATOR
            $data['artikel'] = M_Artikel::all()->count();
            $data['pengelola'] = M_User::where('role', 1)->get()->count();
            $data['dinas'] = M_User::where('role', 2)->get()->count();
            $data['petani'] = M_User::where('role', 4)->get()->count();
            $data['sidebar'] = 'admin/sidebar';
            $data['content'] = 'admin/dashboard';
        } elseif ($this->session->role == 1) { //PENGELOLA GUDANG
            $data['gudang'] = M_Gudang::where('id_pengelola', $this->session->id)->get()->count();
            $data['pengujian'] = M_Pengujian::where('id_pengelola', $this->session->id)->get()->count();
            $data['sidebar'] = 'pengelola/sidebar';
            $data['content'] = 'pengelola/dashboard';
        } elseif ($this->session->role == 2) { //PEGAWAI DINAS
            $data['gudang'] = M_Gudang::all()->count();
            $data['resi'] = M_Resi::all()->count();
            $data['sidebar'] = 'dinas/sidebar';
            $data['content'] = 'dinas/dashboard';
        } elseif ($this->session->role == 3) { //BANK
            $data['resi'] = M_Resi::all()->count();
            $data['sidebar'] = 'bank/sidebar';
            $data['content'] = 'bank/dashboard';
        } elseif ($this->session->role == 4) { // PETANI
            $data['barang'] = M_Barang::where('id_petani', $this->session->id)->get()->count();
			$data['pengujian'] = M_Pengujian::whereIn('id_barang', M_Barang::where('id_petani', $this->session->id)->get(['id_barang']))->get()->count();
			$data['lolos'] = M_Pengujian::where('hsl_pengujian', 'Diterima')->whereIn('id_barang', M_Barang::where('id_petani', $this->session->id)->get(['id_barang']))->get()->count();
            $data['sidebar'] = 'petani/sidebar';
            $data['content'] = 'petani/dashboard';
        }
        $this->load->view('layouts/app', $data);
    }

    public function profile()
    {
        if ($this->session->role == 0) {
            $data['sidebar'] = 'admin/sidebar';
        } elseif ($this->session->role == 1) {
            $data['sidebar'] = 'pengelola/sidebar';
        } elseif ($this->session->role == 2) {
            $data['sidebar'] = 'dinas/sidebar';
        } elseif ($this->session->role == 3) {
            $data['sidebar'] = 'bank/sidebar';
        } elseif ($this->session->role == 4) {
            $data['sidebar'] = 'petani/sidebar';
        }
        $data['content'] = 'layouts/profile';
        $data['user'] = M_User::find($this->session->id);
        $this->load->view('layouts/app', $data);
    }

    public function update_profile()
    {
        if (!$this->input->post()) {
            if ($this->session->role == 0) {
                redirect('admin/profile');
            } elseif ($this->session->role == 1) {
                redirect('pengelola/profile');
            } else if ($this->session->role == 2) {
                redirect('dinas/profile');
            } else if ($this->session->role == 3) {
                redirect('bank/profile');
            } else if ($this->session->role == 4) {
                redirect('petani/profile');
            }
        } else {
            // $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
            // $this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'required');
            // $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
            // $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('no_tlp', 'No Telepon / No HP', 'required');

            if ($this->form_validation->run() == FALSE) {
                redirect('admin/profile');
                // dd(validation_errors());
            } else {
                $user = M_User::find($this->session->id);
                $user->nama     = $this->input->post('nama');
                $user->email    = $this->input->post('email');
                $user->tmpt_lahir   = empty($this->input->post('tmpt_lahir')) ? NULL : $this->input->post('tmpt_lahir');
                $user->tgl_lahir    = empty($this->input->post('tgl_lahir')) ? NULL : $this->input->post('tgl_lahir');
                $user->alamat   = empty($this->input->post('alamat')) ? NULL : $this->input->post('alamat');
                $user->no_tlp  = $this->input->post('no_tlp');

                $user->save();

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

                // dd($user);

                if($user) {
                    $this->session->set_flashdata('sukses', 'User Berhasil Diperbarui');
                } else {
                    $this->session->set_flashdata('gagal', 'User Tidak Berhasil Diperbarui');
                }
                // $this->load->view('myform');
                redirect('admin/profile');
            }
        }
    }
}
