<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_Harga extends Eloquent
{
    protected $table = 'harga';
    protected $primaryKey = 'id_harga';

    public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    protected $fillable = ['id_pengujian', 'satuan_barang', 'harga_barang'];

    public function pengujian()
    {
        return $this->belongsTo('M_Pengujian', 'id_pengujian', 'id');
    }

}