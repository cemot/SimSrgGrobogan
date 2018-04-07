<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxAPI extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function getDataBeras()
    {
        $data = M_Komoditi_Harga::where('id_komoditi', 1)->get();
        $json = array(
            // 'series' => array(
			// 	'meta' => $data->pluck('tanggal'),
			// 	'value' => $data->pluck('harga')
			// ),
			'labels' => $data->pluck('tanggal'),
			'series' => $data->pluck('harga'),
        );
        echo json_encode($json);
    }

	public function getDataJagung()
    {
        $data = M_Komoditi_Harga::where('id_komoditi', 2)->get();
        $json = array(
            // 'series' => array(
			// 	'meta' => $data->pluck('tanggal'),
			// 	'value' => $data->pluck('harga')
			// ),
			'labels' => $data->pluck('tanggal'),
			'series' => $data->pluck('harga'),
        );
        echo json_encode($json);
    }

	public function getDataGabah()
    {
        $data = M_Komoditi_Harga::where('id_komoditi', 3)->get();
        $json = array(
            // 'series' => array(
			// 	'meta' => $data->pluck('tanggal'),
			// 	'value' => $data->pluck('harga')
			// ),
			'labels' => $data->pluck('tanggal'),
			'series' => $data->pluck('harga'),
        );
        echo json_encode($json);
    }
}
