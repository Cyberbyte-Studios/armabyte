<?php

namespace App\Modules\ArmaLife\Presenters;

use App\Modules\ArmaLife\Transformers\PlayerTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PlayerPresenter
 *
 * @package namespace App\Presenters;
 */
class PlayerPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PlayerTransformer();
    }
}
