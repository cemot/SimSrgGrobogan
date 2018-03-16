<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_Catatan extends Eloquent
{
    protected $table = 'catatan';
    protected $primaryKey = 'id_catatan';

    // public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    protected $fillable = ['id_pengujian', 'isi_catatan', 'status'];

    public function pengujian()
    {
        return $this->belongsTo('M_Pengujian', 'id_pengujian', 'id');
    }

}