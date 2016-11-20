<?php

namespace App\Modules\ArmaLife\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model {
    protected $fillable = array('name', 'aliases', 'cash', 'bankacc', 'coplevel', 'mediclevel', 'civ_licenses', 'cop_licenses', 'med_licenses', 'civ_gear', 'cop_gear', 'med_gear', 'civ_stats', 'cop_stats', 'med_stats', 'arrested', 'adminlevel', 'blacklist', 'civ_alive', 'civ_position', 'playtime');
    protected $primaryKey = 'uid';
    public $timestamps = false;
    
    public function vehicles() {
        return $this->hasMany('App\Modules\ArmaLife\Models\Vehicle','pid','playerid');
    }
    
    public function houses() {
        return $this->hasMany('App\Modules\ArmaLife\Models\House','pid','playerid');
    }

    public function containers() {
        return $this->hasMany('App\Modules\ArmaLife\Models\Container','pid','playerid');
    }
    
    public function gang() {
        return $this->hasOne('App\Modules\ArmaLife\Models\Gang');
    }

    public function wanted() {
        return $this->hasOne('App\Modules\ArmaLife\Models\Wanted', 'wantedID', 'playerid');
    }    
}