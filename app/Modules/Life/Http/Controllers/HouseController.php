<?php

namespace App\Modules\ArmaLife\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Controllers\Controller;

use App\Modules\ArmaLife\Http\Requests\HouseUpdateRequest;
use App\Modules\ArmaLife\Repositories\HouseRepository;
use App\Modules\ArmaLife\Presenters\HouseTablePresenter;
use App\Modules\ArmaLife\Criteria\HouseTableCriteria;

class HouseController extends Controller
{

    /**
     * @var HouseRepository
     */
    protected $repository;


    public function __construct(HouseRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        return $this->repository->paginate();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function table($limit = null)
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $this->repository->setPresenter(HouseTablePresenter::class);
        $this->repository->pushCriteria(new HouseTableCriteria());
        return $this->repository->paginate($limit);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(HouseUpdateRequest $request, $id)
    {
        return $this->repository->update($request->all(), $id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->repository->delete($id);
    }
}
