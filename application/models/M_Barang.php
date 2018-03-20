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

    protected $fillable = ['nama_barang', 'berat_barang', 'id_petani', 'tgl_pengajuan'];

    public function petani()
    {
        return $this->belongsTo('M_User', 'id_petani', 'id');
    }

    public function pengujian()
    {
        return $this->hasOne('M_Pengujian', 'id_barang', 'id_barang');
    }

}