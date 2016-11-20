<?php

namespace App\Modules\ArmaLife\Http\Controllers;

use App\Traits\RestController;
use App\Modules\ArmaLife\Repositories\GangRepository;

class GangController
{
    use RestController;

    public function __construct(GangRepository $repository)
    {
        $this->repository = $repository;
    }
}
