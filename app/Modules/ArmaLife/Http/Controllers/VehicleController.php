<?php

namespace App\Modules\ArmaLife\Http\Controllers;

use App\Traits\RestController;
use App\Http\Controllers\Controller;
use App\Modules\ArmaLife\Repositories\VehicleRepository;

class VehicleController extends Controller
{
    use RestController;

    public function __construct(VehicleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->allDataTable();
    }
}
