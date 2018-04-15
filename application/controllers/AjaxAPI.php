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

	public function waktu()
	{
		dd(date("Y-m-d", strtotime("+". 18 ." months", strtotime(date("Y-m-d")))));
	}

	public function deleteFile()
	{
		unlink('./assets/img/uploads/'.'halo123.jpg');
	}

	public function cetak()
	{
		$data = array(
		   "data" => array(
			   "nama" => "Fakhri Fauzan",
			   "url" => "http://fazan.my.id"
		   )
   		);
	   $this->pdf->setPaper('A4', 'potrait');
	   $this->pdf->filename = "laporan-petanikode.pdf";
	   $this->pdf->load_view('print', $data);
	}
}
