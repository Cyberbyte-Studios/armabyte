<?php

namespace App\Modules\ArmaLife\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;
use App\Modules\ArmaLife\Repositories\ContainerRepository as ContainerInterface;
use App\Modules\ArmaLife\Models\Container;

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
}
