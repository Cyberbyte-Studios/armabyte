<?php

namespace App\Modules\ArmaLife\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modules\ArmaLife\Repositories\Eloquent\PlayerRepository;
use App\Modules\ArmaLife\Repositories\Eloquent\VehicleRepository;
use App\Modules\ArmaLife\Repositories\Eloquent\HouseRepository;


class ArmaLifeController extends Controller
{
    /**
     * @var PlayerRepository
     */
    protected $playerRepository;
    
    /**
     * @var VehicleRepository
     */
    protected $vehicleRepository;

    /**
     * @var HouseRepository
     */
    protected $houseRepository;

    public function __construct(PlayerRepository $playerRepository, VehicleRepository $vehicleRepository, HouseRepository $houseRepository)
    {
        $this->playerRepository = $playerRepository;
        $this->vehicleRepository = $vehicleRepository;
        $this->houseRepository = $houseRepository;        
    }
    
    public function dashboard()
    {
        $cash = (int) $this->playerRepository->cash();
        $bank = (int) $this->playerRepository->bank();
        $total = $cash + $bank;
        
        return [
            'data' => [
                'cash' => $cash,
                'bank' => $bank,
                'total' => $total,
                'vehicles' => $this->vehicleRepository->count(),
                'houses' => $this->houseRepository->count(),
                'players' => $this->playerRepository->count(),
                'newest' => $this->playerRepository->newest(),
                'cops' => $this->playerRepository->cops(),
                'medics' => $this->playerRepository->medics(),
                'admins' => $this->playerRepository->admins(),
                'donators' => $this->playerRepository->donators()
            ]
        ];    
    }
}
