<?php

namespace App\Modules\ArmaLife\Http\Controllers;

use App\Http\Controllers\Controller;
use Prettus\Repository\Criteria\RequestCriteria;

use App\Modules\ArmaLife\Repositories\GangRepository;
use App\Modules\ArmaLife\Http\Requests\GangUpdateRequest;

class GangController extends Controller
{
    protected $repository;

    public function __construct(GangRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $this->repository->pushCriteria(app(RequestCriteria::class));
        return $this->repository->all();
    }

    public function show(int $id)
    {
        return $this->repository->find($id);
    }

    public function update(GangUpdateRequest $request, int $id)
    {
        return $this->repository->update($request->all(), $id);
    }

    public function destroy(int $id): int
    {
        return $this->repository->delete($id);
    }
}
