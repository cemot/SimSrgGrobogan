<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Capsule\Manager as DB;

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

    public function getDataRekapKecamatan()
    {
        $data = M_Pengujian::select('kecamatan', DB::raw('count(*) as jumlah'))->join('barang', 'pengujian.id_barang', 'barang.id_barang')->join('users', 'id', 'id_petani')->where('hsl_pengujian', 'Diterima')->groupBy('kecamatan')->get();
        // dd('<pre>'.$data.'</pre>');
        $json = array(
			'labels' => $data->pluck('kecamatan'),
			'series' => $data->pluck('jumlah'),
        );
        echo json_encode($json);
    }

    public function getDataRekapPengujian()
    {
        $data = M_Pengujian::select('hsl_pengujian', DB::raw('count(*) as jumlah'))->groupBy('hsl_pengujian')->get();
        // dd('<pre>'.$data.'</pre>');
        $json = array(
			'labels' => $data->pluck('hsl_pengujian'),
			'series' => $data->pluck('jumlah'),
        );
        echo json_encode($json);
    }

	public function getAlamatGudang()
    {
		$id = $this->input->get('id', TRUE);
		$gudang = M_Gudang::find($id);
        // $json = array(
		// 	'labels' => $data->pluck('hsl_pengujian'),
		// 	'series' => $data->pluck('jumlah'),
        // );
        echo json_encode($gudang->alamat);
    }

	public function cek()
	{
		$sisa = DB::table('gudang')
				->leftjoin('pengujian', 'gudang.id_gudang', '=', 'pengujian.id_gudang')
				->leftjoin('barang', 'barang.id_barang', '=', 'pengujian.id_barang')
                ->select(DB::raw('gudang.id_gudang, sum(barang.berat_barang) as isi, gudang.kapasitas - sum(barang.berat_barang) as sisa'))
                ->where('pengujian.hsl_pengujian', '=', 'Diterima')
                ->groupBy('gudang.id_gudang')
                ->get();
		echo json_encode($sisa);
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

	public function cetak_resi()
	{
		$this->load->view('pengelola/resi_cetak');
		// $this->pdf->setPaper('A4', 'potrait');
 	    // $this->pdf->filename = "laporan-resi.pdf";
 	    // $this->pdf->load_view('pengelola/resi_cetak');
	}

	public function cetak_permohonan($id)
	{
		$data['barang'] = M_Barang::find($id);
		$this->load->view('layouts/simpan_barang');
		// $this->pdf->setPaper('A4', 'potrait');
 	    // $this->pdf->filename = "laporan-resi.pdf";
 	    // $this->pdf->load_view('pengelola/resi_cetak');
	}
}
