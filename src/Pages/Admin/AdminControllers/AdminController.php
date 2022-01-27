<?php
namespace App\Pages\Admin\AdminControllers;

use App\Models\Role;
use App\Models\User;


class AdminController
{
    private $role;
    private $user;

    public function __construct()
    {
        $this->role = Role::where('name', $_POST['roleName'])->firstOrFail();
        $this->user = User::find(intval($_POST['userId']));
    }

    public function changeUserRole()
    {
        if($_POST['checkbox'] === 'on') {
            $this->user->roles()->attach($this->role['id']);
        }
        else {
            $this->user->roles()->detach($this->role['id']);
        }
    }
}
