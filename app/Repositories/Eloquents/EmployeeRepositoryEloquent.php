<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\EmployeeRepository;
use App\Models\Employee;
use App\Validators\EmployeeValidator;

/**
 * Class EmployeeRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents;
 */
class EmployeeRepositoryEloquent extends BaseRepository implements EmployeeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Employee::class;
    }

    public function getWithParams($param)
    {
        // TODO: Implement getWithParams() method.
        return Employee::where('name', 'LIKE', '%' . $param . '%')->get();
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
