<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxAPI extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function getDataJagung()
    {
        $series = M_Komoditi_Harga::where('id_komoditi', 2)->get();
        // echo $series->pluck('harga');
        // echo $series->pluck('tanggal');
        $data = array(
            'harga' => $series->pluck('harga'), 
            'tanggal' => $series->pluck('tanggal'), 
        );
        echo json_encode($data);
    }
}
