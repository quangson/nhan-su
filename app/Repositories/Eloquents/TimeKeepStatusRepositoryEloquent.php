<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\TimeKeepStatusRepository;
use App\Models\TimeKeepStatus;
use App\Validators\TimeKeepStatusValidator;

/**
 * Class TimeKeepStatusRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents;
 */
class TimeKeepStatusRepositoryEloquent extends BaseRepository implements TimeKeepStatusRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TimeKeepStatus::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
