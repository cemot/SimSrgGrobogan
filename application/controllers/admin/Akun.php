<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['sidebar'] = 'admin/sidebar';
        $data['content'] = 'admin/profile';
        $this->load->view('layouts/app', $data);
    }

    public function dashboard()
    {
        
    }
}