<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class M_Artikel extends Eloquent
{
    protected $table = 'artikel';
    protected $primaryKey = 'id_artikel';

    // public $timestamps = false;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = ['judul', 'isi', 'tanggal', 'penulis', 'status'];

}