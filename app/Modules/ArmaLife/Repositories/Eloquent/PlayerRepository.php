<?php

namespace App\Modules\ArmaLife\Repositories\Eloquent;

use App\Modules\ArmaLife\Models\Player;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Modules\ArmaLife\Presenters\PlayerPresenter;
use App\Modules\ArmaLife\Repositories\PlayerRepository as PlayerInterface;

/**
 * Class PlayerRepository
 * @package namespace App\Modules\ArmaLife\Repositories;
 */
class PlayerRepository extends BaseRepository implements PlayerInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Player::class; 
    }
    
    public function presenter()
    {
        return PlayerPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    public function cash()
    {
        return $this->model->sum('cash');
    }
    
    public function bank()
    {
        return $this->model->sum('bankacc');
    }
    
    public function newest()
    {
        $newest = $this->model->orderBy('insert_time', 'desc')->first();
        return ['uid' => $newest->uid, 'name' => $newest->name];
    }
    
    public function cops()
    {
        return $this->model->select('uid', 'name', 'coplevel')->where('coplevel', '>=', 1)->orderBy('coplevel', 'desc')->get();
    }
    
    public function medics()
    {
        return $this->model->select('uid', 'name', 'mediclevel')->where('mediclevel', '>=', 1)->orderBy('mediclevel', 'desc')->get();
    }
    
    public function admins()
    {
        return $this->model->select('uid', 'name', 'adminlevel')->where('adminlevel', '>=', 1)->orderBy('adminlevel', 'desc')->get();
    }
    
    public function donators()
    {
        return $this->model->select('uid', 'name', 'donorlevel')->where('donorlevel', '>=', 1)->orderBy('donorlevel', 'desc')->get();
    }
    
    public function count()
    {
        return $this->model->count();
    }
}
