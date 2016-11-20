<?php

namespace App\Modules\ArmaLife\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface HouseRepository
 * @package namespace App\Modules\ArmaLife\Repositories;
 */
interface HouseRepository extends RepositoryInterface
{
    public function count();
}
