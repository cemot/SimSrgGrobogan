<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_Komoditi extends Eloquent
{
    protected $table = 'komoditi_jenis';
    protected $primaryKey = 'id_komoditi';

    // public $timestamps = true;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    protected $fillable = ['nama_komoditi', 'created_by', 'updated_by'];

    public function buat()
    {
        return $this->belongsTo('M_User', 'created_by', 'id');
    }

    public function ubah()
    {
        return $this->belongsTo('M_User', 'updated_by', 'id');
    }

    public function harga()
    {
        return $this->hasMany('M_Komoditi_Harga', 'id_komoditi', 'id_komoditi');
    }

}