<?php
namespace App\Models;

use App\DbQueries;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $name;
    public $login;
    public $email;
    public $password;

    protected $table = 'users';
    public $timestamps = false;
//    protected $attributes = [
//        'name' => false,
//        'login' => false,
//        'email' => false,
//        'password' => false
//    ];

}


