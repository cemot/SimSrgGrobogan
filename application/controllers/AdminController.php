<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		// $this->load->view('welcome_message');
	}

	public function dashboard_admin()
    {
        $data['content'] = 'admin/dashboard_admin';
        $this->load->view('layout_admin/master', $data);
    }
}
