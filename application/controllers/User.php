<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {
        $users = User_model::all();
        dd($users);
        foreach ($users as $key => $value) {
            echo "ID : ".$value->id."<br>";
            echo "First Name : ".$value->first_name."<br>";
            echo "Last Name : ".$value->last_name."<br>";
            echo "Email : ".$value->email."<br><br>";
        }
    }

    public function create() {
        // $user = new User_model;
        // $user->first_name = "Fauzan";
        // $user->last_name = "Fakhri";
        // $user->email = "dexterhack@gmail.com";
        // $user->save();
        $user = User_model::create([
            'first_name' => 'Nurliah',
            'last_name' => 'Awaliah',
            'email' => 'nurliaha@gmail.com'
        ]);
        dd($user);
    }

    public function update()
    {
        $user = User_model::find(4);
        $user->first_name = "Fulan";
        $user->last_name = "Juga";
        $user->email = "sadsds@m.n";
        $user->save();
    }
}