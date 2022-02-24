<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class User
 * @package App\Models
 * @mixin Builder
 */
class User extends Model
{
    protected $table = 'users';
    public $timestamps = false;

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_has_roles', 'user_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
