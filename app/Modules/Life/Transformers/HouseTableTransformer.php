<?php

namespace App\Modules\ArmaLife\Transformers;

use League\Fractal\TransformerAbstract;
use App\Modules\ArmaLife\Models\House;
use App\Modules\ArmaLife\Services\ArrayParser;

/**
 * Class HouseTableTransformer
 * @package namespace App\Transformers;
 */
class HouseTableTransformer extends TransformerAbstract
{

    /**
     * Transform the House entity
     * @param House $model
     *
     * @return array
     */
    public function transform(House $model)
    {
        return [
            'id' => (int) $model->id,
            'pid' => $model->pid,
            'pos' => $model->pos
        ];
    }
}
