<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class User
 * @package App\Models
 * @mixin Builder
 */

class Comment extends Model
{
    protected $table = 'comments';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}