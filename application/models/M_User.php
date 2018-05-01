<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class M_User extends Eloquent
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    // public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    protected $fillable = ['username', 'password', 'nama', 'email', 'jabatan', 'role', 'tmpt_lahir', 'tgl_lahir', 'alamat', 'kecamatan', 'no_tlp'];

    public function artikel()
    {
        return $this->hasMany('M_Artikel', 'id_penulis', 'id');
    }

    public function gudang()
    {
        return $this->hasMany('M_Gudang', 'id_pengelola', 'id');
    }

    public function barang()
    {
        return $this->hasMany('M_Barang', 'id_petani', 'id');
    }

    public function pengujian()
    {
        return $this->hasMany('M_Pengujian', 'id_pengelola', 'id');
    }

    public function komoditiCreate()
    {
        return $this->hasMany('M_Komoditi', 'created_by', 'id');
    }

    public function komoditiUpdate()
    {
        return $this->hasMany('M_Komoditi', 'updated_by', 'id');
    }

    public function gadai()
    {
        return $this->hasMany('M_Gadai', 'id_pegawai', 'id');
    }

    public function perpanjangan()
    {
        return $this->hasMany('M_PerpanjanganResi', 'id_pengelola', 'id');
    }

}
