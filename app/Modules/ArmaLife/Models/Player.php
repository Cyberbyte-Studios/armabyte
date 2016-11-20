<?php

namespace App\Modules\ArmaLife\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Player extends Model
{
    use Auditable;

    protected $fillable = array(
        'name', 'aliases', 'cash', 'bankacc', 'coplevel', 'mediclevel', 'civ_licenses', 'cop_licenses',
        'med_licenses', 'civ_gear', 'cop_gear', 'med_gear', 'civ_stats', 'cop_stats', 'med_stats',
        'arrested', 'adminlevel', 'blacklist', 'civ_alive', 'civ_position', 'playtime'
    );

    protected $primaryKey = 'uid';
    protected $connection = 'armalife';
    public $timestamps = false;

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'pid', 'playerid');
    }

    public function houses()
    {
        return $this->hasMany(House::class, 'pid', 'playerid');
    }

    public function containers()
    {
        return $this->hasMany(Container::class, 'pid', 'playerid');
    }

    public function gang()
    {
        return $this->hasOne(Gang::class);
    }

    public function wanted()
    {
        return $this->hasOne(Wanted::class, 'wantedID', 'playerid');
    }
}
