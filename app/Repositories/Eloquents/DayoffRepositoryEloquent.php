<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\DayoffRepository;
use App\Models\Dayoff;
use App\Validators\DayoffValidator;

/**
 * Class DayoffRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents;
 */
class DayoffRepositoryEloquent extends BaseRepository implements DayoffRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Dayoff::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
