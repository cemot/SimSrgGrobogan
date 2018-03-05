<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class User_model extends Eloquent
{
    protected $table = 'user';
    // protected $primaryKey = '';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    // protected $guarded = ['price'];

    public $timestamps = false;
    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'last_update';

}