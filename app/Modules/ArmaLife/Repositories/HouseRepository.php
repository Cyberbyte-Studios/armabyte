<?php

namespace App\Modules\ArmaLife\Repositories;

/**
 * Interface HouseRepository
 * @package namespace App\Modules\ArmaLife\Repositories;
 */
interface HouseRepository extends ArmaLifeRepository
{
    public function count();

    public function allDataTable();
}
