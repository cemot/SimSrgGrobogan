<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_Gudang extends Eloquent
{
    protected $table = 'gudang';
    protected $primaryKey = 'id_gudang';

    public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    protected $fillable = ['nama', 'kapasitas', 'id_pengelola'];

    public function pengelola()
    {
        return $this->belongsTo('M_User', 'id_pengelola', 'id');
    }

    public function pengujian()
    {
        return $this->hasMany('M_Pengujian', 'id_gudang', 'id_gudang');
    }

}
