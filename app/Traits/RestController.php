<?php

namespace App\Traits;

use App\Http\Requests\RestRequest;
use Prettus\Repository\Criteria\RequestCriteria;

trait RestController
{
    protected $repository;

    public function __construct($repository)
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

    public function update(RestRequest $request, int $id)
    {
        return $this->repository->update($request->all(), $id);
    }

    public function destroy(int $id): int
    {
        return $this->repository->delete($id);
    }
}
