<?php

namespace App\Modules\ArmaLife\Repositories\Eloquent;

use App\Modules\ArmaLife\Classes\Helper;
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

    public function allDataTable()
    {
        $vehicles = $this->model->join('players', 'vehicles.pid', '=', 'players.playerid')->select('id', 'players.name', 'pid', 'classname', 'side', 'plate', 'active', 'alive')->get();
        return Helper::buildTable($vehicles);
    }
}
