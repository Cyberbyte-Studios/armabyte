<?php

namespace App\Modules\ArmaLife\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Modules\ArmaLife\Repositories\WantedRepository as WantedInterface;
use App\Modules\ArmaLife\Models\Wanted;

/**
 * Class WantedRepository
 * @package namespace App\Modules\ArmaLife\Repositories;
 */
class WantedRepository extends BaseRepository implements WantedInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Wanted::class; 
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
