<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_Pengujian extends Eloquent
{
    protected $table = 'pengujian';
    protected $primaryKey = 'id_pengujian';

    public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    protected $fillable = ['id_pengelola', 'id_barang', 'tgl_pengujian', 'hsl_pengujian'];

}