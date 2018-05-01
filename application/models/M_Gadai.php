<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_Gadai extends Eloquent
{
    protected $table = 'resi_gadai';
    protected $primaryKey = 'id_gadai';

    public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    protected $fillable = ['id_resi', 'tgl_pengajuan', 'status', 'id_pegawai', 'tgl_penerimaan'];

    public function resi()
    {
        return $this->belongsTo('M_Resi', 'id_resi', 'id_resi');
    }

    public function bank()
    {
        return $this->belongsTo('M_User', 'id_pegawai', 'id');
    }

}
