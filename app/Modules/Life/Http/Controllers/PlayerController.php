<?php

namespace App\Modules\ArmaLife\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modules\ArmaLife\Criteria\PlayerTable;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Modules\ArmaLife\Criteria\PlayerTableCriteria;
use App\Modules\ArmaLife\Repositories\PlayerRepository;
use App\Modules\ArmaLife\Presenters\PlayerTablePresenter;
use App\Modules\ArmaLife\Http\Requests\PlayerUpdateRequest;

class PlayerController extends Controller
{

    /**
     * @var PlayerRepository
     */
    protected $repository;


    public function __construct(PlayerRepository $repository)
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
        $this->repository->setPresenter(PlayerTablePresenter::class);
        $this->repository->pushCriteria(new PlayerTableCriteria());
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
     * @param  int            $id
     *
     * @return Response
     */
    public function update(PlayerUpdateRequest $request, $id)
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
