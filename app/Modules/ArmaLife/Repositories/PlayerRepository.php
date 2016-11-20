<?php

namespace App\Modules\ArmaLife\Repositories;

interface PlayerRepository extends ArmaLifeRepository
{
    public function cash();
    
    public function bank();
    
    public function newest();
    
    public function cops();
    
    public function medics();
    
    public function admins();
    
    public function donators();
}
