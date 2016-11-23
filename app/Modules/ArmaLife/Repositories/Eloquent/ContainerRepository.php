<?php

namespace App\Modules\ArmaLife\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;
use App\Modules\ArmaLife\Repositories\ContainerRepository as ContainerInterface;
use App\Modules\ArmaLife\Models\Container;
use App\Modules\ArmaLife\Classes\Helper;

/**
 * Class ContainerRepository
 * @package namespace App\Modules\ArmaLife\Repositories\Eloquent;
 */
class ContainerRepository extends ArmaLifeRepository implements ContainerInterface

{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Container::class; 
    }   

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function allDataTable()
    {
        $containers = $this->model->join('players', 'containers.pid', '=', 'players.playerid')->select('id', 'players.name', 'pid', 'classname', 'pos', 'active', 'owned')->get();
        return Helper::buildTable($containers);
    }
}
