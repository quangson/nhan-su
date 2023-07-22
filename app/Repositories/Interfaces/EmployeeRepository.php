<?php

namespace App\Repositories\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface EmployeeRepository.
 *
 * @package namespace App\Repositories\Interfaces;
 */
interface EmployeeRepository extends RepositoryInterface
{
    public function getWithParams($param);
}
