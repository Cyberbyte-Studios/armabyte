<?php

namespace App\Modules\ArmaLife\Transformers;

use League\Fractal\TransformerAbstract;
use App\Modules\ArmaLife\Models\Player;
use App\Modules\ArmaLife\Services\ArrayParser;

/**
 * Class PlayerTableTransformer
 * @package namespace App\Transformers;
 */
class PlayerTableTransformer extends TransformerAbstract
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
            'playerid' => $model->playerid,
            'cash' => (int) $model->cash,
            'bankacc' => (int) $model->bankacc,
            'coplevel' => (int) $model->coplevel,
            'mediclevel' => (int) $model->mediclevel,
            'adminlevel' => (int) $model->adminlevel,
            'donorlevel' => (int) $model->donorlevel
        ];
    }
}
