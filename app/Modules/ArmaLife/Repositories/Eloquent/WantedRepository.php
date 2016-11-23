<?php

namespace App\Modules\ArmaLife\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;
use App\Modules\ArmaLife\Repositories\WantedRepository as WantedInterface;
use App\Modules\ArmaLife\Models\Wanted;
use App\Modules\ArmaLife\Classes\Helper;

/**
 * Class WantedRepository
 * @package namespace App\Modules\ArmaLife\Repositories;
 */
class WantedRepository extends ArmaLifeRepository implements WantedInterface
{
    public function model()
    {
        return Wanted::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function allDataTable()
    {
        $wanted = $this->model->select('wantedID', 'wantedName', 'wantedCrimes', 'wantedBounty', 'pos', 'active', 'owned')->get();
        return Helper::buildTable($wanted);
    }
}
