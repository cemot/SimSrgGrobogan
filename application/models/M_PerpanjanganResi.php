<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_PerpanjanganResi extends Eloquent
{
    protected $table = 'resi_perpanjangan';
    protected $primaryKey = 'id_perpanjangan';

    public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    protected $fillable = ['id_resi', 'tgl_pengajuan', 'status', 'id_pengelola', 'tgl_penerimaan'];

    public function resi()
    {
        return $this->belongsTo('M_Resi', 'id_resi', 'id_resi');
    }

    public function pengelola()
    {
        return $this->belongsTo('M_User', 'id_pengelola', 'id');
    }
}
