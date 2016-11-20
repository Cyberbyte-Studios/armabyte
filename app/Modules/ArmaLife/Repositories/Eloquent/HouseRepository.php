<?php

namespace App\Modules\ArmaLife\Repositories\Eloquent;

use App\Modules\ArmaLife\Models\House;
use App\Modules\ArmaLife\Presenters\HousePresenter;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Modules\ArmaLife\Repositories\HouseRepository as HouseInterface;

/**
 * Class HouseRepository
 * @package namespace App\Modules\ArmaLife\Repositories;
 */
class HouseRepository extends ArmaLifeRepository implements HouseInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return House::class; 
    }

    public function presenter()
    {
        return HousePresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
