<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\TimekeepAccountRepository;
use App\Models\TimekeepAccount;
use App\Validators\TimekeepAccountValidator;

/**
 * Class TimekeepAccountRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents;
 */
class TimekeepAccountRepositoryEloquent extends BaseRepository implements TimekeepAccountRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TimekeepAccount::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
