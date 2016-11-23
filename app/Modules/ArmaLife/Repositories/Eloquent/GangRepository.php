<?php

namespace App\Modules\ArmaLife\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;
use App\Modules\ArmaLife\Repositories\GangRepository as GangInterface;
use App\Modules\ArmaLife\Models\Gang;
use App\Modules\ArmaLife\Classes\Helper;

/**
 * Class GangRepository
 * @package namespace App\Modules\ArmaLife\Repositories\Eloquent;
 */
class GangRepository extends ArmaLifeRepository implements GangInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Gang::class; 
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
        $gangs = $this->model->join('players', 'gangs.owner', '=', 'players.playerid')->select('id', 'players.name', 'owner', 'gangs.name', 'members', 'bank', 'active')->get();
        return Helper::buildTable($gangs);
    }
}
