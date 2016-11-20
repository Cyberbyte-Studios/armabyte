<?php

namespace App\Modules\ArmaLife\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface VehicleRepository
 * @package namespace App\Modules\ArmaLife\Repositories;
 */
interface VehicleRepository extends RepositoryInterface
{
    public function count();
}
