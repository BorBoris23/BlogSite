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
        $this->users = User::all();
        $this->roles = Role::all();
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