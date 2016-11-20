<?php

namespace App\Modules\ArmaLife\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Modules\ArmaLife\Repositories\VehicleRepository as VehicleInterface;
use App\Modules\ArmaLife\Models\Vehicle;

/**
 * Class VehicleRepository
 * @package namespace App\Modules\ArmaLife\Repositories;
 */
class VehicleRepository extends BaseRepository implements VehicleInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Vehicle::class; 
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    public function count()
    {
        return $this->model->count();
    }
}
