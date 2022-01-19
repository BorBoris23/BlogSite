<?php
namespace App\Pages\Admin;

use App\Models\Role;
use App\Models\User;

class AdminModel
{
    public $users;
    public $roles;

    public function __construct()
    {
        $this->users = User::all()->except([1]);
        $this->roles = Role::all()->except([1]);
    }

    public function getUserRoles($login)
    {
        $roleNames = [];

        $user = User::where('login', '=', $login)->first();

        $roles = User::find($user['id'])->roles()->get();

        foreach ($roles as $role)
        {
            array_push($roleNames, $role['name']);
        }
        return $roleNames ;
    }
}