<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_Barang extends Eloquent
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';

    public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    protected $fillable = ['nama_barang', 'berat_barang', 'id_komoditi', 'id_petani', 'id_pengelola',
    'id_gudang', 'bulan_panen', 'tahun_panen', 'kemasan', 'pengangkut',
    'tgl_rencana', 'tgl_pengajuan'];

    public function petani()
    {
        return $this->belongsTo('M_User', 'id_petani', 'id');
    }

    public function pengelola()
    {
        return $this->belongsTo('M_User', 'id_pengelola', 'id');
    }

    public function pengujian()
    {
        return $this->hasOne('M_Pengujian', 'id_barang', 'id_barang');
    }

    public function gudang()
    {
        return $this->hasOne('M_Gudang', 'id_gudang', 'id_gudang');
    }

    public function jenis()
    {
        return $this->hasOne('M_Komoditi', 'id_komoditi', 'id_komoditi');
    }
}
