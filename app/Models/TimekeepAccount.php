<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class TimekeepAccount.
 *
 * @package namespace App\Models;
 */
class TimekeepAccount extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */



    protected $table = 'timekeep_accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_id',
        'account',
        'pass',
    ];


    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
}
