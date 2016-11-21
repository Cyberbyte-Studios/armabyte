<?php

namespace App\Modules\ArmaLife\Http\Controllers;

use App\Traits\RestController;
use App\Modules\ArmaLife\Repositories\PlayerRepository;
use App\Modules\ArmaLife\Http\Requests\PlayerUpdateRequest;

class PlayerController
{
    use RestController;

    public function __construct(PlayerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function update(PlayerUpdateRequest $request, int $id)
    {
        return $this->repository->update($request->all(), $id);
    }

    public function all()
    {
        return $this->repository->allDataTable();
    }
}
