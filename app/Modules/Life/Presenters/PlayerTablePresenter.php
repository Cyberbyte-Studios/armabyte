<?php

namespace App\Modules\ArmaLife\Presenters;

use App\Modules\ArmaLife\Transformers\PlayerTableTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PlayerTablePresenter
 *
 * @package namespace App\Presenters;
 */
class PlayerTablePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PlayerTableTransformer();
    }
}
