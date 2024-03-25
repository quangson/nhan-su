<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class TimeKeepStatus.
 *
 * @package namespace App\Models;
 */
class TimeKeepStatus extends Model implements Transformable
{
    use TransformableTrait;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'status',
        'reason',
        'created_at',
        'updated_at',
    ];

}
