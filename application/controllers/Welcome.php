<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
	 	parent::__construct();

	}

	public function index()
	{
		$data['beras'] = M_Komoditi_Harga::where('id_komoditi', 1)->orderBy('tanggal', 'desc')->limit(2)->get()->reverse();
		$data['jagung'] = M_Komoditi_Harga::where('id_komoditi', 2)->orderBy('tanggal', 'desc')->limit(2)->get()->reverse();
		$data['gabah'] = M_Komoditi_Harga::where('id_komoditi', 3)->orderBy('tanggal', 'desc')->limit(2)->get()->reverse();

		//PAGINATION
		$limit_per_page = 3;
        $start_index = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $total_records = M_Artikel::where('status', 1)->get()->count();
		$config['base_url'] = base_url().'page';
        $config['total_rows'] = $total_records;
        $config['per_page'] = $limit_per_page;
        $config['uri_segment'] = 2;

		$config['first_link']       = 'Pertama';
        $config['last_link']        = 'Terakhir';
        $config['next_link']        = 'Selanjutnya';
        $config['prev_link']        = 'Sebelumnya';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);

		// get current page records
        // $params["results"] = $this->Users->get_current_page_records($limit_per_page, $start_index);
		$data['data'] = M_Artikel::where('status', 1)->latest()->offset($start_index)->take($limit_per_page)->get();
		// dd($data['data']);

		// build paging links
        $data['links'] = $this->pagination->create_links();

		$this->load->view('landing/index', $data);
	}

	public function show($id)
    {
		$data['beras'] = M_Komoditi_Harga::where('id_komoditi', 1)->orderBy('tanggal', 'desc')->limit(2)->get()->reverse();
		$data['jagung'] = M_Komoditi_Harga::where('id_komoditi', 2)->orderBy('tanggal', 'desc')->limit(2)->get()->reverse();
		$data['gabah'] = M_Komoditi_Harga::where('id_komoditi', 3)->orderBy('tanggal', 'desc')->limit(2)->get()->reverse();
		$data['artikel'] = M_Artikel::where('id_artikel', $id)->where('status', 1)->first();
		if (!$data['artikel']) {
			redirect(base_url());
		}
        $this->load->view('landing/view', $data);
    }

	public function daftar(){
		$data['beras'] = M_Komoditi_Harga::where('id_komoditi', 1)->orderBy('tanggal', 'desc')->limit(2)->get()->reverse();
		$data['jagung'] = M_Komoditi_Harga::where('id_komoditi', 2)->orderBy('tanggal', 'desc')->limit(2)->get()->reverse();
		$data['gabah'] = M_Komoditi_Harga::where('id_komoditi', 3)->orderBy('tanggal', 'desc')->limit(2)->get()->reverse();
		$this->load->view('landing/daftar', $data);
	}

	public function register()
    {
        if (!$this->input->post()) {
            redirect(base_url());
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
				$data['beras'] = M_Komoditi_Harga::where('id_komoditi', 1)->orderBy('tanggal', 'desc')->limit(2)->get()->reverse();
				$data['jagung'] = M_Komoditi_Harga::where('id_komoditi', 2)->orderBy('tanggal', 'desc')->limit(2)->get()->reverse();
				$data['gabah'] = M_Komoditi_Harga::where('id_komoditi', 3)->orderBy('tanggal', 'desc')->limit(2)->get()->reverse();
                $this->load->view('landing/daftar', $data);
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

				if($user) {
                    $this->session->set_flashdata('class', 'success');
                    $this->session->set_flashdata('message', 'User Berhasil Disimpan');
                } else {
                    $this->session->set_flashdata('class', 'danger');
                    $this->session->set_flashdata('message', 'User Tidak Berhasil Disimpan');
                }
                redirect(base_url());
            }
        }
    }
}
