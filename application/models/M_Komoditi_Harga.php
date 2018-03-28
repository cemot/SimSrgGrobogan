<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_Komoditi_Harga extends Eloquent
{
    protected $table = 'komoditi_harga';
    protected $primaryKey = 'id_komoditi_harga';

    public $timestamps = true;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    protected $fillable = ['id_komoditi', 'harga', 'tanggal', 'keterangan', 'created_by', 'updated_by'];

    public function komoditi()
    {
        return $this->belongsTo('M_Komoditi', 'id_komoditi', 'id_komoditi');
    }
}