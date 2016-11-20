<?php

namespace App\Modules\ArmaLife\Http\Controllers;

use App\Traits\RestController;
use App\Modules\ArmaLife\Repositories\WantedRepository;

class WantedController
{
    use RestController;

    public function __construct(WantedRepository $repository)
    {
        $this->repository = $repository;
    }
}
