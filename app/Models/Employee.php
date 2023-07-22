<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Employee.
 *
 * @package namespace App\Models;
 */
class Employee extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'employees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_id',
        'position_id',
        'name',
        'gender',
        'birthday',
        'phone',
        'email',
        'address',
        'start_date',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
    public function dayoffs()
    {
        return $this->hasOne(Dayoff::class);
    }
    public function timekeepStatuses()
    {
        return $this->hasMany(TimeKeepStatus::class);
    }
    public function getTimeKeepTodayAttribute()
    {
        $status = optional(TimeKeepStatus::where('employee_id', $this->id)->whereDate('created_at', '=', now()->toDateString())->first())->status;
        return $status;
    }
    public function getDayoffRemainThisYearAttribute()
    {
        $thisYear = now()->year;
        $startDate = $thisYear.'-01-01';
        $endDate = $thisYear.'-12-31';
        $dateOffs = count(TimeKeepStatus::where('employee_id', $this->id)->where('status', 4)->whereBetween('created_at', [$startDate, $endDate])->get());
        $halfDateOffs = count(TimeKeepStatus::where('employee_id', $this->id)->where('status', 3)->whereBetween('created_at', [$startDate, $endDate])->get());
        return $dateOffs + (($halfDateOffs != 0) ? $halfDateOffs/2 : 0);
    }
    public function getDayBuRemainThisYearAttribute()
    {
        $thisYear = now()->year;
        $thisMonth = now()->month;

        $dateOffs = count(TimeKeepStatus::where('employee_id', $this->id)->where('status', 6)->whereYear('created_at', $thisYear)->whereMonth('created_at', $thisMonth)->get());
        $halfDateOffs = count(TimeKeepStatus::where('employee_id', $this->id)->where('status', 5)->whereYear('created_at', $thisYear)->whereMonth('created_at', $thisMonth)->get());
        return $dateOffs + (($halfDateOffs != 0) ? $halfDateOffs/2 : 0);
    }
}
