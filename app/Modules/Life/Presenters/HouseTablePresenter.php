<?php

namespace App\Modules\ArmaLife\Presenters;

use App\Modules\ArmaLife\Transformers\HouseTableTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PlayerTablePresenter
 *
 * @package namespace App\Presenters;
 */
class HouseTablePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new HouseTableTransformer();
    }
}
