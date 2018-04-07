<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_Pengujian extends Eloquent
{
    protected $table = 'pengujian';
    protected $primaryKey = 'id_pengujian';

    // public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    protected $fillable = ['id_pengelola', 'id_barang', 'id_gudang', 'tgl_pengujian', 'hsl_pengujian', 'created_by', 'updated_by'];

    public function barang()
    {
        return $this->belongsTo('M_Barang', 'id_barang', 'id_barang');
    }

    public function pengelola()
    {
        return $this->belongsTo('M_User', 'id_pengelola', 'id');
    }

    public function gudang()
    {
        return $this->belongsTo('M_Gudang', 'id_gudang', 'id_gudang');
    }

    public function catatan()
    {
        return $this->hasOne('M_Catatan', 'id_pengujian', 'id_pengujian');
    }

    public function harga()
    {
        return $this->hasOne('M_Harga', 'id_pengujian', 'id_pengujian');
    }

    public function resi()
    {
        return $this->hasMany('M_Resi', 'id_pengujian', 'id_pengujian');
    }

}
