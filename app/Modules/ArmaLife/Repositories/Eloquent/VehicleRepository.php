<?php

namespace App\Modules\ArmaLife\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;
use App\Modules\ArmaLife\Repositories\VehicleRepository as VehicleInterface;
use App\Modules\ArmaLife\Models\Vehicle;

/**
 * Class VehicleRepository
 * @package namespace App\Modules\ArmaLife\Repositories;
 */
class VehicleRepository extends ArmaLifeRepository implements VehicleInterface
{
    public function model()
    {
        return Vehicle::class; 
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
