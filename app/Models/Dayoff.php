<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Dayoff.
 *
 * @package namespace App\Models;
 */
class Dayoff extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'dayoffs';




    protected $fillable = [
        'employee_id',
        'Annual_Leave',
        'Compensatory_Day',
        'sick_leave',
        'unpaid_leave',
        'school_leave',
        'regime_leave',
        'not_leave',
        'leave'
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}

