<?php

namespace App\Modules\ArmaLife\Http\Controllers;

use App\Traits\RestController;
use App\Modules\ArmaLife\Repositories\ContainerRepository;

class ContainerController
{
    use RestController;

    public function __construct(ContainerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->allDataTable();
    }
}
