<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class User
 * @package App\Models
 * @mixin Builder
 */

class Role extends Model
{
    protected $table = 'roles';
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_has_roles', 'role_id');
    }
}