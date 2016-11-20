<?php

namespace App\Modules\ArmaLife\Http\Controllers;

use App\Traits\RestController;
use App\Modules\ArmaLife\Repositories\HouseRepository;

class HouseController
{
    use RestController;

    public function __construct(HouseRepository $repository)
    {
        $this->repository = $repository;
    }
}
