<?php
namespace App\Pages\Admin;

use App\Models\Role;
use App\Models\User;


class AdminController
{
    private $roles;

    public function __construct()
    {
        $this->roles = Role::all();
    }

    public function changeUserRole()
    {
        foreach ($this->roles as $role) {

            if($this->checkKeys($role['name']) === true) {
                $user = User::find(intval($_POST['loginId']));
                $user->roles()->attach($role['id']);
            } else {
                $user = User::find(intval($_POST['loginId']));
                $user->roles()->detach($role['id']);
            }
        }
    }

    private function checkKeys($kye)
    {
        if (isset($kye)) {
            if (array_key_exists($kye, $_POST)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
