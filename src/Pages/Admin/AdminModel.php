<?php
namespace App\Pages\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Capsule\Manager as Capsule;

class AdminModel
{
    public $users;
    public $roles;
    private $limit;
    private $offset;
    public $rowCount;

    public function __construct($pageSize, $pageNumber)
    {
        $this->limit = $pageSize;
        $this->offset = ($pageNumber - 1) * $pageSize;
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