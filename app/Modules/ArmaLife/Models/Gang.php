<?php

namespace App\Modules\ArmaLife\Models;

use Illuminate\Database\Eloquent\Model;

class Gang extends Model
{
    protected $fillable = array('owner', 'name', 'members', 'maxmembers', 'bank', 'active');
    protected $connection = 'armalife';
    public $timestamps = false;

    public function player()
    {
        return $this->belongsTo(Player::class, 'owner', 'playerid');
    }
}
