<?php

namespace App\Modules\ArmaLife\Transformers;

use League\Fractal\TransformerAbstract;
use App\Modules\ArmaLife\Models\Player;
use App\Modules\ArmaLife\Services\ArrayParser;

/**
 * Class UserTransformer
 * @package namespace App\Transformers;
 */
class PlayerTransformer extends TransformerAbstract
{

    /**
     * Transform the Player entity
     * @param Player $model
     *
     * @return array
     */
    public function transform(Player $model)
    {
        return [
            'uid' => (int) $model->uid,
            'name' => $model->name,
            'aliases' => ArrayParser::aliases($model->aliases),
            'playerid' => $model->playerid,
            'cash' => (int) $model->cash,
            'bankacc' => (int) $model->bankacc,
            'coplevel' => (int) $model->coplevel,
            'mediclevel' => (int) $model->mediclevel,
            'civ_licenses' => ArrayParser::licences($model->civ_licenses),
            'med_licenses' => ArrayParser::licences($model->med_licenses),
            'cop_licenses' => ArrayParser::licences($model->cop_licenses),
            'civ_gear' => ArrayParser::inventory($model->civ_gear),
            'med_gear' => ArrayParser::inventory($model->med_gear),
            'cop_gear' => ArrayParser::inventory($model->cop_gear),
            'civ_stats' => ArrayParser::stats($model->civ_stats),
            'med_stats' => ArrayParser::stats($model->med_stats),
            'cop_stats' => ArrayParser::stats($model->cop_stats),
            'arrested' => $model->arrested,
            'adminlevel' => (int) $model->adminlevel,
            'donorlevel' => (int) $model->donorlevel,
            'blacklist' => (int) $model->blacklist,
            'civ_alive' => (int) $model->civ_alive,
            'civ_position' => ArrayParser::position($model->civ_position),
            'playtime' => ArrayParser::time($model->playtime),
            'insert_time' => $model->insert_time,
            'last_seen' => $model->last_seen
        ];
    }
}
