<?php

namespace App\Modules\ArmaLife\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PlayerRepository
 * @package namespace App\Modules\ArmaLife\Repositories;
 */
interface PlayerRepository extends RepositoryInterface
{
    public function cash();
    
    public function bank();
    
    public function newest();
    
    public function cops();
    
    public function medics();
    
    public function admins();
    
    public function donators();
}
