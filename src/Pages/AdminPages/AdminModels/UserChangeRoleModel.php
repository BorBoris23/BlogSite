<?php
namespace App\Pages\AdminPages\AdminModels;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Capsule\Manager as Capsule;

class UserChangeRoleModel extends AdminModel
{
    public $users;
    public $roles;
    public $rowCount;

    public function __construct($pageSize, $pageNumber)
    {
        parent::__construct($pageSize, $pageNumber);
        $this->rowCount = User::all()->count();
        $this->users = Capsule::table('users')
            ->offset($this->offset)
            ->limit($this->limit)
            ->get();
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