<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_Resi extends Eloquent
{
    protected $table = 'resi';
    protected $primaryKey = 'id_resi';

    // public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    protected $fillable = ['no_resi', 'id_pengujian', 'tgl_penerbitan', 'masa_aktif', 'jatuh_tempo'];
    
    public function pengujian()
    {
        return $this->belongsTo('M_Pengujian', 'id_pengujian', 'id_pengujian');
    }
}