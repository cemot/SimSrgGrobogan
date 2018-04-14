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
		$data['data'] = M_Artikel::where('status', 1)->get()->reverse();
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
}
