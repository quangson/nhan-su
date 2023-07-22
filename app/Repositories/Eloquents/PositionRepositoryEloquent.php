<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\positionRepository;
use App\Models\Position;
use App\Validators\PositionValidator;

/**
 * Class PositionRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents;
 */
class PositionRepositoryEloquent extends BaseRepository implements PositionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Position::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
