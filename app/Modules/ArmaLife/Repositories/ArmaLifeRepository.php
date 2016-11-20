<?php

namespace App\Modules\ArmaLife\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface GangRepository
 * @package namespace App\Modules\ArmaLife\Repositories;
 */
interface ArmaLifeRepository extends RepositoryInterface
{
    public function audit();

    public function count();
}
