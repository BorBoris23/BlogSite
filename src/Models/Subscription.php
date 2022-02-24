<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class User
 * @package App\Models
 * @mixin Builder
 */
class Subscription extends Model
{
    protected $table = 'subscriptions';
    public $timestamps = false;

    public function subscriber()
    {
        return $this->belongsTo(User::class, 'subscriberUser_id');
    }
}
