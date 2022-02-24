<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class User
 * @package App\Models
 * @mixin Builder
 */
class UsersHasRoles extends Model
{
    protected $table = 'users_has_roles';
    public $timestamps = false;
}
